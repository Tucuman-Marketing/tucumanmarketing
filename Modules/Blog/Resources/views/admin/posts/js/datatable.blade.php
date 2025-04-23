<script>
    var tableName = 'blog_table';
    var ajaxMethod = 'GET';
    //Permisos
    var permissions = {
        canDelete: @permission('blog-delete') true @else false @endcan,
        canEdit: @permission('blog-edit') true @else false @endcan,
        canShow: @permission('blog-view') true @else false @endcan,
    };
    //Urls
    var urls = {
        baseUrl: "{{ asset('') }}",
        baseUrlShow: "{{ route('admin.blogs.posts.show', ['posts' => 'tempId']) }}",
        baseUrlEdit: "{{ route('admin.blogs.posts.edit', ['posts' => 'tempId']) }}",
        baseUrlDelete: "{{ route('admin.blogs.posts.destroy', ['posts' => 'tempId']) }}",
        baseUrlMassDelete: "{{ route('admin.blogs.posts.massDestroy') }}",
        indexUrl: "{{ route('admin.blogs.posts.indexDatatable') }}"
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
        // [3] Titulo
        {
            data: 'title',
            name: 'title',
            visible: true,
            searchable: true,
            orderable: true,
            render: function(data, type, row) {
                var html = '<span>' + data + '</span>';
                return html;
            }
        },
        // [4] Contenido
        {
            data: 'content',
            name: 'content',
            visible: true,
            searchable: true,
            orderable: true,
            render: function(data, type, row) {
                var html = '<span>' + data + '</span>';
                return html;
            }
        },
        // [5]status
        {
            data: 'status',
            name: 'status',
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
        // [6] Author
        {
            data: 'author',
            name: 'author',
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
        // [7] Categoria
        {
            data: 'category',
            name: 'category',
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
        // [8] Fecha de Creacion
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

        initializeSelect2();
        initializePublishDatePicker();
        initializePublishTimePicker();
        initializeCKEditor();
        initializeFilePond(customOptions);

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
