function prueba() {
 alert('prueba fallida');
    var relacion = document.getElementById("Tcontrato");
    var campo = document.getElementById("fecha_nombramiento");
    if (relacion.value === 'base' || relacion.value === 'nombremientoConfianza' 
        || relacion.value === 'mandosMedios') {
        campo.disabled = false;
    }

}