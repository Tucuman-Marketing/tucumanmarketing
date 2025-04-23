@include('layouts.theme-admin.velvet.js.file-upload')



<script>

        // Opciones personalizadas para este módulo
        var customOptions = {
            acceptedImageTypes: ['image/jpeg', 'image/png'],  // Solo imágenes JPEG y PNG permitidas
            acceptedFileTypes: ['application/pdf', 'application/msword'],  // Archivos PDF y Word permitidos
            maxImageSize: '2MB',  // Tamaño máximo de imagen permitido: 2MB
            maxFileSize: '10MB',   // Tamaño máximo de archivo permitido: 10MB
            fileValidateTypeLabelExpectedTypes: 'Expected: {allButLastType} or {lastType}. Max size: {maxFileSize}',  // Etiqueta personalizada
            labelIdle: 'Arrastra tu CV aquí o <span class="filepond--label-action">Explora</span>',  // Texto del área de carga
            uploadErrorMessage: 'Error al subir el archivo',  // Mensaje de error personalizado para la carga
            deleteSuccessMessage: 'Archivo eliminado correctamente',  // Mensaje de éxito al eliminar
            deleteErrorMessage: 'Error al eliminar el archivo'  // Mensaje de error al eliminar
        };


    $(document).ready(function() {
        initializeFilePond(customOptions);
    });
</script>
