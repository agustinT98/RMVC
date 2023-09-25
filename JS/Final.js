
function validaP(){
    var clave, i, may=0, min=0, num=0;
    clave = document.getElementById("clave").value;
     
    for (i=0 ; i<clave.length ; i++) {
		if (clave.charAt(i) >= 'a' && clave.charAt(i) <= 'z') min++;
		if (clave.charAt(i) >= 'A' && clave.charAt(i) <= 'Z') may++;
		if (clave.charAt(i) >= '0' && clave.charAt(i) <= '9') num++;
           }
    if (min>0 && may>0 && num>0) {
        return true;
    }

  else {
        alert ("La clave debe contener al menos UNA mayuscula UNA minuscula y UN numero");
    }
    return false;
}
