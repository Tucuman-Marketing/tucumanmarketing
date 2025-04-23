<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

<style>
.filepond-multiple .filepond--item {
    width: calc(20% - 0.5em);
}
</style>

<script>
    $(document).ready(function() {
        // Hacer la función initializeFilePond global para que pueda ser llamada desde cualquier lugar
        window.initializeFilePond = initializeFilePond;

        // Registrar los plugins necesarios de FilePond
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize
        );

        // Función para inicializar FilePond
        function initializeFilePond() {
            const uploadUrl = '{{ route('admin.filepond.upload') }}';
            const deleteUrl = '{{ route('admin.filepond.delete.component') }}';
            let processingCount = 0;
            let uploadedFiles = {}; // Objeto para almacenar los IDs de archivos subidos

            function toggleSubmitButton(disable) {
                $('button[type="submit"]').prop('disabled', disable);
            }

            function createFilePondInstance(inputElement, isMultiple, acceptedTypes, maxFileSize) {
                return FilePond.create(inputElement, {
                    multiple: isMultiple,
                    acceptedFileTypes: acceptedTypes,
                    maxFileSize: maxFileSize,
                    fileValidateTypeLabelExpectedTypes: `Espera: {allButLastType} o {lastType}. Tamaño máximo: ${maxFileSize}`,
                    labelIdle: `Dejanos tu Curriculum aquí <span class="filepond--label-action">Explore</span>`,
                    server: {
                        process: {
                            url: uploadUrl,
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            ondata: (formData) => {
                                formData.append('field', $(inputElement).attr('name'));
                                formData.append('is_multiple', isMultiple);
                                return formData;
                            },
                            onload: (response) => {
                                const res = JSON.parse(response);
                                const fieldName = $(inputElement).attr('name');
                                if (!uploadedFiles[fieldName]) {
                                    uploadedFiles[fieldName] = [];
                                }
                                uploadedFiles[fieldName].push(res.media_temp_id);
                                updateHiddenInput($(inputElement), res, isMultiple);
                            },
                            onerror: (response) => {
                                toastr.error('Ups!', 'Error al Subir la Imagen');
                            }
                        },
                        revert: (uniqueFileId, load, error) => {
                            const fieldName = $(inputElement).attr('name');
                            const fileId = uploadedFiles[fieldName].shift(); // Obtener y eliminar el primer ID del campo correspondiente
                            // Llamada AJAX para eliminar el archivo
                            $.ajax({
                                url: deleteUrl,
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: JSON.stringify({ filename: fileId }),
                                contentType: 'application/json; charset=utf-8',
                                success: function(response) {
                                    toastr.success('Exito!', 'Imagen Eliminada Correctamente');
                                    load(); // Llamar a load() para completar la operación
                                    updateHiddenInputOnDelete($(inputElement), { media_temp_id: fileId });
                                },
                                error: function(response) {
                                    toastr.error('Ups!', 'Error al Eliminar la Imagen');
                                }
                            });
                        }
                    },
                    onaddfile: () => {
                        processingCount++;
                        toggleSubmitButton(true); // Deshabilitar el botón de envío cuando se añade un archivo
                    },
                    onprocessfile: () => {
                        processingCount--;
                        if (processingCount === 0) {
                            toggleSubmitButton(false); // Habilitar el botón de envío cuando no hay archivos en proceso
                        }
                    },
                    onprocessfileabort: () => {
                        processingCount--;
                        if (processingCount === 0) {
                            toggleSubmitButton(false); // Habilitar el botón de envío cuando no hay archivos en proceso
                        }
                    },
                    onprocessfileerror: () => {
                        processingCount--;
                        if (processingCount === 0) {
                            toggleSubmitButton(false); // Habilitar el botón de envío cuando no hay archivos en proceso
                        }
                    }
                });
            }

            function updateHiddenInput($inputElement, responseData, isMultiple) {
                // Identificar el formulario de edición o creación usando data-form-type
                const formType = $inputElement.data('form-type');
                const hiddenContainer = formType === 'edit' ? $('#input_hidden_edit') : $('#input_hidden');
                const hiddenInputName = responseData.field + '_ids';
                let hiddenInput = hiddenContainer.find('input[name="' + hiddenInputName + '"]');

                if (hiddenInput.length === 0) {
                    hiddenInput = $('<input>').attr({
                        type: 'hidden',
                        name: hiddenInputName,
                        value: ''
                    });
                    hiddenContainer.append(hiddenInput);
                }

                if (isMultiple) {
                    const existingIds = hiddenInput.val().split(',').filter(Boolean);
                    existingIds.push(responseData.media_temp_id);
                    hiddenInput.val(existingIds.join(','));
                } else {
                    hiddenInput.val(responseData.media_temp_id);
                }
            }

            function updateHiddenInputOnDelete($inputElement, responseData) {
                // Identificar el formulario de edición o creación usando data-form-type
                const formType = $inputElement.data('form-type');
                const hiddenContainer = formType === 'edit' ? $('#input_hidden_edit') : $('#input_hidden');
                const hiddenInputName = responseData.field + '_ids';
                const hiddenInput = hiddenContainer.find('input[name="' + hiddenInputName + '"]');

                if (hiddenInput.length > 0) {
                    const existingIds = hiddenInput.val().split(',').filter(Boolean);
                    const updatedIds = existingIds.filter(id => id != responseData.media_temp_id);
                    hiddenInput.val(updatedIds.join(','));
                }
            }

            document.querySelectorAll('.filepond_single').forEach(inputElement => {
                createFilePondInstance(inputElement, false, ['image/jpeg', 'image/png', 'image/gif'], '3MB');
            });

            document.querySelectorAll('.filepond_multiple').forEach(inputElement => {
                createFilePondInstance(inputElement, true, ['image/jpeg', 'image/png', 'image/gif'], '3MB');
            });

            document.querySelectorAll('.filepond_file_single').forEach(inputElement => {
                createFilePondInstance(inputElement, false, ['application/pdf'], '5MB');
            });

            document.querySelectorAll('.filepond_file_multiple').forEach(inputElement => {
                createFilePondInstance(inputElement, true, ['application/pdf'], '5MB');
            });
        }

        // Inicializar FilePond al cargar el documento
        initializeFilePond();
    });


    function deleteMedia(imageId, element) {
        var deleteUrlBase = "{{ route('admin.filepond.delete') }}";
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $.ajax({
            url: deleteUrlBase,
            method: 'DELETE',
            data: { media_id: imageId, _token: csrfToken },  // Agrega el token CSRF
            success: function(response) {
                $(element).closest('.image-container').remove();
                toastr.success('Exito!', 'Imagen Eliminada Correctamente')
            },
            error: function(err) {
                toastr.error('Ups!', 'Error al Eliminar la Imagen')
            }
        });
    }
</script>

