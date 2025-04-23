<script>
    var tableName = 'recruitment_candidates_status_table';
    var ajaxMethod = 'GET';
    //Permisos
    var permissions = {
        canDelete: @permission('recruitment-candidates-status-delete') true @else false @endcan,
        canEdit: @permission('recruitment-candidates-status-edit') true @else false @endcan,
        canShow: @permission('recruitment-candidates-status-view') true @else false @endcan,
    };
    //Urls
    var urls = {
        baseUrl: "{{ asset('') }}",
        baseUrlShow: "{{ route('admin.recruitment.candidatesStatus.show', ['object' => 'tempId']) }}",
        baseUrlEdit: "{{ route('admin.recruitment.candidatesStatus.edit', ['object' => 'tempId']) }}",
        baseUrlDelete: "{{ route('admin.recruitment.candidatesStatus.destroy', ['object' => 'tempId']) }}",
        baseUrlMassDelete: "{{ route('admin.recruitment.candidatesStatus.massDestroy') }}",
        indexUrl: "{{ route('admin.recruitment.candidatesStatus.indexDatatable') }}"
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
        // [2] Icono
        {
            data: 'icon',
            name: 'icon',
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
        // [3] Nombre
        {
            data: 'name',
            name: 'name',
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
        // [4] color
        {
            data: 'color',
            name: 'color',
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
        // [5]order
        {
            data: 'sort_order',
            name: 'sort_order',
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
        // [6] Fecha de Creación
        {
            data: 'created_at',
            name: 'created_at',
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

    });

    marcarFilaSeleccionada(uuid);
}

function ModalShow(uuid) {
    var url = urls.baseUrlShow.replace('tempId', uuid);
    $.get(url, function(response) {
        $('#content-show').html(response);
        $('#modal-show').modal('show');
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
