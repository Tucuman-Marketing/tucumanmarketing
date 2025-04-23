<script>
    var tableName = 'rol_table';
    var ajaxMethod = 'GET';
    //Permisos
    var permissions = {
        canDelete: @permission('rol-delete') true @else false @endcan,
        canEdit: @permission('rol-edit') true @else false @endcan,
        canShow: @permission('rol-view') true @else false @endcan,
    };
    //Urls
    var urls = {
        baseUrl: "{{ asset('') }}",
        baseUrlShow: "{{ route('admin.roles.show', ['object' => 'tempId']) }}",
        baseUrlEdit: "{{ route('admin.roles.edit', ['object' => 'tempId']) }}",
        baseUrlDelete: "{{ route('admin.roles.destroy', ['object' => 'tempId']) }}",
        baseUrlMassDelete: "{{ route('admin.roles.massDestroy') }}",
        indexUrl: "{{ route('admin.roles.indexDatatable') }}"
    };
    //Ordenamiento
    var order = [
        [3, 'desc']
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
            headerTitle: false,
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
            headerTitle: false,
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
        // [2] nombre
        {
            data: 'name',
            name: 'name',
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
        // [3] Slug
        {
            data: 'slug',
            name: 'slug',
            visible: true,
            searchable: true,
            orderable: true,
            render: function(data, type, row) {
                var html = '<span>' + data + '</span>';
                return html;
            }
        },
        // [4] description
        {
            data: 'description',
            name: 'description',
            visible: true,
            searchable: true,
            orderable: true,
            render: function(data, type, row) {
                var html = '<span>' + data + '</span>';
                return html;
            }
        },
        // [5]level
        {
            data: 'level',
            name: 'level',
            visible: true,
            searchable: true,
            orderable: true,
            render: function(data, type, row) {
                if (data) {
                    return data;
                } else {
                    return '';
                }
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
        $('#modal-edit').modal('show');

        // initializeSelect2();
        // initializePublishDatePicker();
        // initializePublishTimePicker();
        // initializeCKEditor();
        // initializeFilePond(customOptions);
    });

    marcarFilaSeleccionada(uuid);
}


function ModalShow(uuid) {
    var url = urls.baseUrlShow.replace('tempId', uuid);
    $.get(url, function(response) {
        $('#content-show').html(response);
        $('#modal-show').modal('show');
        $('#content-show .select2').select2();
    });
    marcarFilaSeleccionada(uuid);
}



//en caso de que se quiera redireccionar y no usar modal
// function redirectToEdit(uuid) {
//     var url = baseUrlEdit.replace('tempId', uuid);
//     window.location.href = url;
// }
/*========================================MODALES==========================================*/


</script>
