function desabilitar() {
    var relacion = document.getElementById("Tcontrato");
    var campo = document.getElementById("fecha_nombramiento");
    var contrato = document.getElementById("contrato");
    if (relacion.value === 'base' || relacion.value === 'nombremientoConfianza' || relacion.value === 'mandosMedios') {
      campo.disabled = false;
      contrato.disabled = true;
    }else{
      campo.value= "";
      campo.disabled = true;
      contrato.disabled = false;
   }
}