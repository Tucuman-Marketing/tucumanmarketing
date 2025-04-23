{{--
-- se inicializa  initializeFilePond();
-- se tiene que importar @include('layouts.theme-admin.velvet.js.file-upload')
--}}

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
// layouts/theme-admin/velvet/js/file-upload.js

$(document).ready(function () {
    // Registrar los plugins necesarios de FilePond
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize
    );

    // Función para inicializar FilePond
    window.initializeFilePond = function (customOptions = {}) {
        const uploadUrl = '{{ route('filepond.upload') }}';
        const deleteUrl = '{{ route('filepond.delete.component') }}';
        let processingCount = 0;
        let uploadedFiles = {};

        function toggleSubmitButton(disable) {
            $('button[type="submit"]').prop('disabled', disable);
        }

        function updateHiddenInput($inputElement, responseData, isMultiple) {
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

        function createFilePondInstance(inputElement, isMultiple, acceptedTypes, maxFileSize) {
            return FilePond.create(inputElement, {
                multiple: isMultiple,
                acceptedFileTypes: acceptedTypes,
                maxFileSize: maxFileSize,
                fileValidateTypeLabelExpectedTypes: customOptions.fileValidateTypeLabelExpectedTypes.replace('{maxFileSize}', formatSize(maxFileSize)),
                labelIdle: customOptions.labelIdle,
                server: {
                    process: {
                        url: uploadUrl,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        ondata: (formData) => {
                            const fieldName = $(inputElement).attr('name');
                            if (fieldName) {
                                formData.append('field', fieldName);
                            } else {
                                console.error('El campo "name" del input no está definido.');
                            }

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
                        onerror: () => {
                            toastr.error('Ups!', customOptions.uploadErrorMessage);
                        }
                    },
                    revert: (uniqueFileId, load) => {
                        const fieldName = $(inputElement).attr('name');
                        const fileId = uploadedFiles[fieldName].shift();
                        $.ajax({
                            url: deleteUrl,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: JSON.stringify({ filename: fileId }),
                            contentType: 'application/json; charset=utf-8',
                            success: () => {
                                toastr.success(customOptions.deleteSuccessMessage);
                                load();
                                updateHiddenInputOnDelete($(inputElement), { media_temp_id: fileId });
                            },
                            error: () => {
                                toastr.error(customOptions.deleteErrorMessage);
                            }
                        });
                    }
                },
                onaddfile: () => {
                    processingCount++;
                    toggleSubmitButton(true);
                },
                onprocessfile: () => {
                    processingCount--;
                    if (processingCount === 0) {
                        toggleSubmitButton(false);
                    }
                },
                onprocessfileabort: () => {
                    processingCount--;
                    if (processingCount === 0) {
                        toggleSubmitButton(false);
                    }
                },
                onprocessfileerror: () => {
                    processingCount--;
                    if (processingCount === 0) {
                        toggleSubmitButton(false);
                    }
                }
            });
        }

        document.querySelectorAll('.filepond_single').forEach(inputElement => {
            createFilePondInstance(inputElement, false, customOptions.acceptedImageTypes, customOptions.maxImageSize);
        });

        document.querySelectorAll('.filepond_multiple').forEach(inputElement => {
            createFilePondInstance(inputElement, true, customOptions.acceptedImageTypes, customOptions.maxImageSize);
        });

        document.querySelectorAll('.filepond_file_single').forEach(inputElement => {
            createFilePondInstance(inputElement, false, customOptions.acceptedFileTypes, customOptions.maxFileSize);
        });

        document.querySelectorAll('.filepond_file_multiple').forEach(inputElement => {
            createFilePondInstance(inputElement, true, customOptions.acceptedFileTypes, customOptions.maxFileSize);
        });
    }

    // Función para convertir tamaños de archivo
    function parseSize(size) {
        if (typeof size === 'string' && size.endsWith('MB')) {
            return parseInt(size) * 1024 * 1024;
        }
        return size;
    }

    // Función para formatear tamaño de archivo
    function formatSize(sizeInBytes) {
        return (sizeInBytes / (1024 * 1024)).toFixed(2) + 'MB';
    }
});



    function deleteMedia(imageId, element) {
        var deleteUrlBase = "{{ route('filepond.delete') }}";
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

