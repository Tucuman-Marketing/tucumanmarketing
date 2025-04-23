<script src="{{asset('theme-admin/velvet/assets/plugins/ckeditor5/build/ckeditor.js')}}"></script>
<style>
.ck.ck-content,
.ck.ck-content p,
.ck.ck-content div {
    color: black !important; /* Texto negro para asegurarnos que se vea */
}

.ck-editor__editable {
    min-height: 300px;  /* Asegura una altura mínima */
    height: auto;       /* O define una altura específica si lo prefieres */
    transition: none;   /* Opcional: desactiva las transiciones si están causando saltos visuales */
}
</style>

<script>
let model = "Modules\\Blog\\Entities\\Blog"; // Cambiar por el modelo correspondiente
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
    destroyCKEditorInstances(); // Destruye instancias existentes antes de inicializar nuevas

    document.querySelectorAll('.ckeditor').forEach(editorElement => {
        ClassicEditor
        .create(editorElement, {
            extraPlugins: [SimpleUploadAdapter],
            removePlugins: ['HtmlSupport'],
        })
        .then(editor => {
            ckEditors.push(editor); // Almacena la instancia en el arreglo global
            const editorContent = editor.ui.view.editable.element;
            editorContent.style.color = 'black';
            editorContent.style.backgroundColor = 'white';

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

$(document).ready(function () {
    initializeCKEditor();
});
</script>
