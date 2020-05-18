function ValidatePasswordFormat(){
    var tPW= document.getElementById("txtPassword").value;
    var button = document.getElementById("btnSignup");

    if (tPW.length<8){
        console.log('Password inferior a 8 caracteres');
        button.disabled = true;
        return false;
    }else {
      button.disabled = true;
      var mayus = false;
      var minus = false;
      var num = false;

      for (var i = 0; i < tPW.length; i++) {
        if (tPW.charCodeAt(i) >= 65 && tPW.charCodeAt(i) <= 90) {
          mayus = true;
        }else if (tPW.charCodeAt(i) >= 97 && tPW.charCodeAt(i) <= 122) {
          minus = true;
        }else if (tPW.charCodeAt(i) >= 48 && tPW.charCodeAt(i) <= 57) {
          num = true;
        }
      }

      if (mayus==true && minus==true && num==true) {
        button.disabled = false;
      }
    }
}
