<script>
    var tableName = 'coreform_table';
    var ajaxMethod = 'GET';
    //Permisos
    var permissions = {
        canDelete: @permission('coreform-delete') true @else false @endcan,
        canEdit: @permission('coreform-edit') true @else false @endcan,
        canShow: @permission('coreform-view') true @else false @endcan,
    };
    //Urls
    var urls = {
        baseUrl: "{{ asset('') }}",
        baseUrlShow: "{{ route('admin.coreforms.show', ['coreform' => 'tempId']) }}",
        baseUrlEdit: "{{ route('admin.coreforms.edit', ['coreform' => 'tempId']) }}",
        baseUrlDelete: "{{ route('admin.coreforms.destroy', ['coreform' => 'tempId']) }}",
        indexUrl: "{{ route('admin.coreforms.indexDatatable') }}"
    };
    //Ordenamiento
    var order = [
        [0, 'desc']
    ];
    //Columnas
    var columns = [
        // [0] UUID
        {
            data: 'uuid',
            name: 'check',
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function(data, type, row) {
                if(permissions.canDelete){
                    return `<input type="checkbox" class="dt-checkboxes" value="${data}">`;
                }
            },
            title: '<input type="checkbox" name="select_all" value="1" id="datatable-select-all">',
        },
        // [1] Operaciones
        {
            data: 'uuid',
            name: 'action',
            orderable: false,
            searchable: false,
            render: function(data, type, row) {
                var showUrl = urls.baseUrlShow.replace('tempId', data);
                var editUrl = urls.baseUrlEdit.replace('tempId', data);
                var deleteUrl = urls.baseUrlDelete.replace('tempId', data);
                var buttons = '';

                if(permissions.canShow){
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Ver">
                        <button type="button" class="btn btn-primary" onclick="ModalShow('${data}')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </span> `;
                }

                if(permissions.canEdit){
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Editar">
                        <button type="button" class="btn btn-info" onclick="ModalEdit('${data}')">
                            <i class="fas fa-edit"></i>
                        </button>
                    </span> `;
                }

                if(permissions.canDelete){
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Eliminar">
                        <button type="button" class="btn btn-danger" onclick="ModalDelete('${data}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </span>`;
                }

                return buttons;
            }
        },
        // [2] Imagen
        {
            data: 'image',
            name: 'image',
            orderable: false,
            searchable: false,
            render: function(data, type, row) {
                if (data) {
                    return data;
                } else {
                    return '';
                }
            }
        },
        // [3] Name
        {
            data: 'name',
            name: 'name',
            visible: true,
            searchable: true,
            orderable: true,
            render: function(data, type, row) {
                var html = '<span>' + data + '</span>';
                return html;
            }
        },

        // [4] Crear
        {
            data: 'create',
            name: 'create',
            visible: true,
            searchable: true,
            orderable: true,
            render: function(data, type, row) {
                var html = '<span id="data-' + row.id + '" style="display:none;">' + data + '</span>';
                html += ' <button data-target="data-' + row.id + '" onclick="copyToClipboardText(document.getElementById(\'data-' + row.id + '\').innerText)">Copy</button>';
                return html;
            }
        },
        // Edit
        {
            data: 'edit',
            name: 'edit',
            visible: true,
            searchable: true,
            orderable: true,
            render: function(data, type, row) {
                var html = '<span id="data-' + row.id + '" style="display:none;">' + data + '</span>';
                html += ' <button data-target="data-' + row.id + '" onclick="copyToClipboardText(document.getElementById(\'data-' + row.id + '\').innerText)">Copy</button>';
                return html;
            }
        },
        // [4] Fecha de Creacion
        {
            data: 'created_at',
            name: 'created_at',
            visible: true,
            searchable: true,
            orderable: true,
            render: function(data, type, row) {
                var date = new Date(row.created_at);
                var formattedDate = date.toLocaleDateString('es-ES', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                var html = '<span>' + formattedDate + '</span>';
                return html;
            }
        },
    ];
    //Activar tabla
    activartabla(tableName,urls.indexUrl,ajaxMethod, columns,order, permissions);
</script>

<script>
/*========================================MODALES==========================================*/
function ModalEdit(uuid) {
    var url = urls.baseUrlEdit.replace('tempId', uuid);
    $.get(url, function(response) {
        $('#content-edit').html(response);
        $('#edit').modal('show');

        initializeCKEditor();
        initializeFilePond(customOptions);
    });
}


function ModalShow(uuid) {
    var url = urls.baseUrlShow.replace('tempId', uuid);
    $.get(url, function(response) {
        $('#content-show').html(response);
        $('#show').modal('show');
        $('#content-show .select2').select2();
        $('.dropify').dropify();


    });
}

function ModalDelete(data) {
    $('#delete').modal('show');
    $('#uuid_delete').val(data);
}


function ModalMassDelete() {
    var uuids = $('input.dt-checkboxes:checkbox:checked').map(function() {
        return this.value;
    }).get();

    if (uuids.length > 0) {
        // Actualiza el valor del campo oculto con los IDs
        $('#uuids_delete').val(uuids.join(','));
        // Muestra el modal de confirmación
        $('#massDelete').modal('show');
    } else {
        alert("No hay registros seleccionados.");
    }
}

//en caso de que se quiera redireccionar y no usar modal
// function redirectToEdit(uuid) {
//     var url = baseUrlEdit.replace('tempId', uuid);
//     window.location.href = url;
// }
/*========================================MODALES==========================================*/


function copyToClipboard(event) {
    const button = event.target;
    const targetId = $(button).data('target');
    const targetElement = $('#' + targetId)[0];

    if (!targetElement) {
        console.error('Elemento objetivo no encontrado:', targetId);
        return;
    }

    // Verifica si el elemento es un textarea o input para seleccionar su contenido correctamente
    if (targetElement.tagName === 'TEXTAREA' || targetElement.tagName === 'INPUT') {
        targetElement.select();
        document.execCommand("copy");
        toastr.success('Exito!', 'Contenido copiado al portapapeles.');
    } else {
        console.error('El elemento debe ser un textarea o input para copiar su contenido.');
        toastr.error('Error!', 'ups! algo salio mal.');
    }


}

function copyToClipboardText(text) {
    var textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    toastr.success('Exito!', 'Contenido copiado al portapapeles.');
}
</script>
