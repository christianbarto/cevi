function validaRFC(){
  let pattern = /^[a-zA-Z]{3,4}(\d{6})((\D|\d){2,3})?$/;
  let rfc = document.getElementById("RFC").value;
  if(pattern.test(rfc)!=true){
   document.getElementById("estatus").innerHTML = 'Invalido';
   document.getElementById("estatus").style.color = "red";
  }
  else{
   document.getElementById("estatus").innerHTML = 'Valido';
   document.getElementById("estatus").style.color = "green";
  }
}