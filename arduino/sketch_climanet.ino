#include <LiquidCrystal.h> //lcd
#include <DHT.h> //sensor
#include <SPI.h> //ethernet
#include <Ethernet.h> //ethernet

//SENSOR DHT11
#define DHTPIN 9  //Digital pin conectado al sensor DHT
#define DHTTYPE DHT11  //Modelo del sensor DHT
DHT dht(DHTPIN, DHTTYPE); //Creacion del objeto del sensor pasando como parametros el pin y el modelo

//PANTALLA LCD
LiquidCrystal lcd(7,6,5,4,3,2);

//ETHERNET SHIELD
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress ipServer(192,168,1,146);
IPAddress ipClient(192,168,1,150);
EthernetClient client;

//VARIABLES PROGRAMA
int led = 8; //led verde
int t = 20; //temperatura
int h = 25; //humedad

void setup() {
  Serial.begin(9600);
  
  dht.begin(); // Inicializa el sensor
  lcd.begin(16,2); //define el número de columnas y filas, respectivamente, de la pantalla lcd
  pinMode(led, OUTPUT); //inicializacion del led como salida

  while(!Serial){
      
  }
}

void loop() {
  delay(2000);

  float t = dht.readTemperature(); //Guardamos el valor de la temperatura en t
  float h = dht.readHumidity(); //Guardamos el valor de la humedad en h

  if(isnan(t) || isnan(h)){ //Si los valores son incorrectos retorna al principio del loop
    Serial.println("Error en la lectura de temperatura y humedad!");
    return;
  }

  t = t - 7;
  h = h + 10; 

  lcd.setCursor(0,0);
  lcd.print("Temp: " + String(t) + (char)223 + "C");  //(char)223 = º
  lcd.setCursor(0,1);
  lcd.print("Hum: " + String(h) + "%");

  //----------------CONEXION ARDUINO-MYSQL----------------

  if(Ethernet.begin(mac) == 0){
    Serial.println("Failed to configure Ethernet using DHCP");
    Ethernet.begin(mac,ipClient);
  }

  delay(20000);
  Serial.println("connecting...");

  if(client.connect(ipServer, 80)){
    Serial.println("connected");
    digitalWrite(led, true);
    delay(1000);
    /*client.print("GET /arduino_mysql/mysql.php?temperature=61&humidity=94");*/
    client.print("GET /climanet/controllers/createRecordController.php?temperature=");  
    client.print(t);
    client.print("&humidity=");
    client.print(h);  
    client.println(" HTTP/1.0");
    client.println("Connection: close");
    client.println();

    client.println();
    digitalWrite(led, false);
  }else{
    Serial.println("connection failed");
    return;
  }
  //---------------------------------------------------------
  if(client.available()){
    char c = client.read();
    Serial.print(c);
  }

  if(!client.connected()){
    Serial.println();
    Serial.println("disconnecting");
    client.stop();

    while(true);
  }
}
