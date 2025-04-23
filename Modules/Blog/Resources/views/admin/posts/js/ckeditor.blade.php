<script src="{{asset('theme-admin/velvet/assets/plugins/ckeditor5/build/ckeditor.js')}}"></script>
<style>
.ck.ck-content,
.ck.ck-content p,
.ck.ck-content div {
    color: black !important;
}

.ck-editor__editable {
    min-height: 300px;
    height: auto;
    transition: none;
}

/* Estilos específicos para el panel de enlaces en Bootstrap 5 */
.ck.ck-balloon-panel {
    z-index: 1056 !important; /* Mayor que el z-index del modal de Bootstrap 5 */
    position: absolute !important;
}

.ck.ck-link-form {
    position: static !important;
    min-width: 300px;
}

.ck.ck-link-form input.ck-input-text {
    min-height: 36px;
    z-index: 1056 !important;
}

/* Asegurar que el modal no interfiera */


.modal {
    z-index: 1055 !important;
}
</style>

<script>
let model = "Modules\\Blog\\Entities\\Blog";
let ckEditors = [];


function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
        return {
            upload: function() {
                return loader.file.then(function(file) {
                    return new Promise(function(resolve, reject) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '{{ route('admin.file.storeCKEditorImages') }}', true);
                        xhr.setRequestHeader('X-CSRF-Token', '{{ csrf_token() }}');
                        xhr.setRequestHeader('Accept', 'application/json');
                        xhr.responseType = 'json';

                        xhr.addEventListener('error', function() { reject(`Error during upload: ${xhr.status}.`); });
                        xhr.addEventListener('abort', function() { reject('Upload aborted.'); });
                        xhr.addEventListener('load', function() {
                            var response = xhr.response;
                            if (!response || xhr.status !== 201) {
                                reject(`Error: ${xhr.status} ${response.message}`);
                            } else {
                                resolve({
                                    default: response.url
                                });
                                // Añadir el ID del medio temporal al campo oculto
                                let ckMediaInput = document.getElementById('ckeditor_' + editor.sourceElement.getAttribute('data-mode'));
                                let currentIds = ckMediaInput.value ? ckMediaInput.value.split(',') : [];
                                currentIds.push(response.media_id); // Cambié `response.media_temp_id` por `response.media_id`
                                ckMediaInput.value = currentIds.join(',');
                            }
                        });

                        if (xhr.upload) {
                            xhr.upload.onprogress = function(e) {
                                if (e.lengthComputable) {
                                    loader.uploadTotal = e.total;
                                    loader.uploaded = e.loaded;
                                }
                            };
                        }

                        var data = new FormData();
                        data.append('upload_ckeditor', file);
                        data.append('model', model);
                        xhr.send(data);
                    });
                });
            }
        };
    }
}

function initializeCKEditor() {
    destroyCKEditorInstances();

    document.querySelectorAll('.ckeditor').forEach(editorElement => {
        ClassicEditor
        .create(editorElement, {

        })
        .then(editor => {
            ckEditors.push(editor);
            const editorContent = editor.ui.view.editable.element;
            editorContent.style.color = 'black';
            editorContent.style.backgroundColor = 'white';

            // Configurar el manejo del foco para el modal de Bootstrap 5
            const modal = editor.sourceElement.closest('.modal');
            if (modal) {
                const bsModal = bootstrap.Modal.getInstance(modal);
                if (bsModal) {
                    bsModal._config.focus = false;
                }
            }

            // Manejar el panel de enlaces
            editor.ui.on('update', () => {
                const linkForm = document.querySelector('.ck-link-form');
                if (linkForm) {
                    const input = linkForm.querySelector('input');
                    if (input) {
                        // Forzar el foco y prevenir que Bootstrap lo tome
                        setTimeout(() => {
                            input.focus({preventScroll: true});
                            const currentScroll = window.scrollY;
                            window.scrollTo(0, currentScroll);
                        }, 50);
                    }
                }
            });

            // Prevenir que Bootstrap maneje el foco
            editor.ui.focusTracker.on('change:isFocused', () => {
                $(document).off('focusin.modal');
            });

            console.log('Editor was initialized successfully');
        })
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });
    });
}

function destroyCKEditorInstances() {
    ckEditors.forEach(editor => {
        editor.destroy()
            .then(() => console.log('Editor destroyed'))
            .catch(error => console.error('Error destroying editor:', error));
    });
    ckEditors = [];
}

// Manejar modales de Bootstrap 5
$(document).on('show.bs.modal', '.modal', function() {
    const modal = bootstrap.Modal.getInstance(this);
    if (modal) {
        modal._config.focus = false;
    }
    $(document).off('focusin.modal');
});

$(document).on('shown.bs.modal', '.modal', function() {
    $(document).off('focusin.modal');
    $(this).off('focusin.modal');
});

// Prevenir el comportamiento por defecto del foco en los modales
$(document).on('focusin', '.ck-link-form input', function(e) {
    e.stopPropagation();
});

$(document).ready(function () {
    initializeCKEditor();
});
</script>
