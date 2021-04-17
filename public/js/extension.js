function validarExt(id)
{
    const MAXIMO_TAMANIO_BYTES = 5000000; // 1MB = 1 millón de bytes
    var archivoInput = document.getElementById(id);
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        Swal.fire(
                    'Tipo de archivo no permitido',
                    'Los archivos deben ser en formato PDF',
                    'warning'
                )
        archivoInput.value = '';
        return false;
    }
            // si no hay archivos, regresamos
            if (archivoInput.files.length <= 0) return;

            // Validamos el primer archivo únicamente
            const archivo = archivoInput.files[0];
            if (archivo.size > MAXIMO_TAMANIO_BYTES) {
                const tamanioEnMb = MAXIMO_TAMANIO_BYTES / 1000000;
                Swal.fire(
                    'Excedio el tamaño maximo del archivo!',
                    'El tamaño maximo de los archivos es de 5MB',
                    'warning'
                )
                // Limpiar
                archivoInput.value = "";
            } else {
                // Validación pasada. Envía el formulario o haz lo que tengas que hacer
            }
}