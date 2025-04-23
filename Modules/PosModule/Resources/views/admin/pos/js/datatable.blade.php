<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>

<style>
    .table.dataTable.fixedHeader-floating, table.dataTable.fixedHeader-locked {
        background-color: #8f8c8c;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    .div.dataTables_processing {
        position: absolute;
        top: 1%;
        left: 50%;
        width: 200px;
        margin-left: -100px;
        margin-top: -26px;
        text-align: center;
        padding: 2px;
    }

    div.dataTables_wrapper div.dataTables_processing {
    top: 0%;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0 !important;
    }


</style>

<script>

var table;
var baseUrl             = "{{ asset('') }}";
var baseUrlShow         = "{{ route('admin.washeds.show', ['washeds' => 'tempId']) }}";
var baseUrlEdit         = "{{ route('admin.washeds.edit', ['washeds' => 'tempId']) }}";
var baseUrlDelete       = "{{ route('admin.washeds.destroy', ['washeds' => 'tempId']) }}";
var getSubSectorsUrl    = null;
var csrfToken           = '{{ csrf_token() }}';
/*============================PERMISSIONS============================*/
var canDelete  = @permission('washeds-delete') true @else false @endcan;
var canEdit     = @permission('washeds-edit') true @else false @endcan;
var canShow     = @permission('washeds-view') true @else false @endcan;
var canAccess     = @permission('washeds-access') true @else false @endcan;
/*============================PERMISSIONS============================*/

function activartabla() {

    /*============================BUTTONS============================*/
    var enableCopy = true;
    var enableCsv = true;
    var enableExcel = true;
    var enablePdf = true;
    var enablePrint = true;
    var enableDelete = true;
    var buttons = [];
    if (enableCopy) {
        buttons.push({
            extend: 'copy',
            text: '<i class="fa fa-copy"></i>',
            titleAttr: 'Copy to clipboard',
            className: 'btn  btn-primary'
        });
    }
    if (enableCsv) {
        buttons.push({
            extend: 'csv',
            text: '<i class="fa fa-file-csv"></i>',
            titleAttr: 'Download as CSV',
            className: 'btn  btn-primary'
        });
    }
    if (enableExcel) {
        buttons.push({
            extend: 'excel',
            text: '<i class="fa fa-file-excel"></i>',
            titleAttr: 'Download as Excel',
            className: 'btn  btn-primary'
        });
    }
    if (enablePdf) {
        buttons.push({
            extend: 'pdf',
            text: '<i class="fa fa-file-pdf"></i>',
            titleAttr: 'Download as PDF',
            className: 'btn  btn-primary'
        });
    }
    if (enablePrint) {
        buttons.push({
            extend: 'print',
            text: '<i class="fa fa-print"></i>',
            titleAttr: 'Print table',
            className: 'btn  btn-primary'
        });
    }
    // if (enableDelete) {
    //     buttons.push({
    //         text: '<i class="fa fa-trash"></i>',
    //         titleAttr: 'Eliminar seleccionados',
    //         className: 'btn  btn-danger',
    //         action: function ( e, dt, node, config ) {
    //             if (canDelete) {
    //                 ModalMassDelete();
    //             } else {
    //                 alert('No tienes permiso para eliminar registros.');
    //             }
    //         }
    //     });
    // }
    /*============================BUTTONS============================*/

    //con esto no nos muestra el alert al no enviar datos por ajax
    $.fn.dataTable.ext.errMode = 'throw';
    $('#datatable').DataTable().destroy();
    table = $('#datatable').DataTable({

    /*============================OPTIONS============================*/
        serverSide: true,
        processing: true,
        pagingType: "full_numbers",
        dom: "<'row'<'col-sm-12 col-md-6'lB><'col-sm-12 col-md-6'fp>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
        buttons: buttons,
        lengthMenu: [10, 25, 50, 100,200,500],
        pageLength: 50,
        order: [[ 7, "desc" ]],//ordenamiento por columna 0
        searching: false,
        fixedHeader: true,
        deferRender: true,
        responsive: false,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            //"loadingRecords": "Cargando...",
            "processing": "Cargando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        /*============================OPTIONS============================*/

        /*============================AJAX============================*/
        ajax: "{{ route('admin.washeds.indexDatatable') }}",
        /*============================AJAX============================*/

        /*============================COLUMNS============================*/
        columns: [
            // UUID
            {
                data: 'uuid',
                name: 'check',
                orderable: false,
                searchable: false,
                defaultContent: '', // Contenido por defecto (casilla de verificación)
                render: function(data, type, row) {
                    if(canDelete){
                        return `<input type="checkbox" class="dt-checkboxes" value="${data}">`; // El checkbox con el valor del ID
                    }
                },
                title: '<input type="checkbox" name="select_all" value="1" id="datatable-select-all">', // Checkbox en el encabezado para seleccionar/deseleccionar todos
            },
            //action
            // {
            //     data: 'uuid',
            //     name: 'action',
            //     orderable: false,
            //     searchable: false,
            //     render: function(data, type, row) {
            //         var showUrl = baseUrlShow.replace('tempId', data);
            //         var editUrl = baseUrlEdit.replace('tempId', data);
            //         var deleteUrl = baseUrlDelete.replace('tempId', data);
            //         var buttons = '';

            //         if(canShow){
            //             buttons += `
            //             <span data-placement="top" data-toggle="tooltip" title="Ver">
            //                 <button type="button" class="btn btn-primary" onclick="ModalShow('${data}')">
            //                     <i class="fas fa-eye"></i>
            //                 </button>
            //             </span> `;
            //         }

            //         if(canEdit){
            //             buttons += `
            //             <span data-placement="top" data-toggle="tooltip" title="Editar">
            //                 <button type="button" class="btn btn-info" onclick="ModalEdit('${data}')">
            //                     <i class="fas fa-edit"></i>
            //                 </button>
            //             </span> `;
            //         }

            //         if(canDelete){
            //             buttons += `
            //             <span data-placement="top" data-toggle="tooltip" title="Eliminar">
            //                 <button type="button" class="btn btn-danger" onclick="ModalDelete('${data}')">
            //                     <i class="fas fa-trash"></i>
            //                 </button>
            //             </span>`;
            //         }

            //         return buttons;
            //     }
            // },
            //Cliente
            {
                data: 'user_name',
                name: 'user_name',
                visible: true,
                searchable: false,
                orderable: true,
                render: function(data, type, row) {
                    var imageUrl = row.user_image ? baseUrl + row.user_image : baseUrl + 'theme-admin/volgh/assets/images/icon/user.svg';
                    var userName = row.user_name ? row.user_name : 'No name';
                    var html = '<div style="display: flex; align-items: center; overflow: hidden;"><img src="' + imageUrl + '" class="img-thumbnail" style="width: 50px; height: 50px; margin-right: 10px;">' + '<span style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">' + userName + '</span></div>';
                    return html;
                }
            },
            //vehicle_image
            {
                data: 'vehicle_image',
                name: 'vehicle_image',
                visible: true,
                searchable: false,
                orderable: false,
                render: function(data, type, row) {
                    var imageUrl = row.vehicle_image ? baseUrl + row.vehicle_image : baseUrl + 'theme-admin/volgh/assets/images/icon/car.svg';
                    var html = '<img src="' + imageUrl + '" class="img-thumbnail" style="width: 50px; height: 50px;">';
                    return html;
                }
            },
            //TIPO de vehiculo (auto, camioneta, suv, moto)
            {
                data: 'vehicle_type',
                name: 'vehicle_type',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = '<span>' + data + '</span>';
                    return html;
                }
            },
            //patente
            {
                data: 'vehicle_plate',
                name: 'vehicle_plate',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = '<span>' + data + '</span>';
                    return html;
                }
            },
            //marca
            {
                data: 'vehicle_brand',
                name: 'vehicle_brand',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = '<span>' + data + '</span>';
                    return html;
                }
            },
            //modelo
            {
                data: 'vehicle_model',
                name: 'vehicle_model',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = '<span>' + data + '</span>';
                    return html;
                }
            },
            //FECHA DE ALTA
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

        ],
        /*============================COLUMNS============================*/
        initComplete: function() {
            // Elimina la clase 'dt-button' de todos los botones en el contenedor de DataTables
            $('.dt-buttons .btn').removeClass('dt-button');
        }

    });


}
activartabla();

//scroll to top function
function scrollToTop() {
    (function smoothscroll() {
        var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
        if (currentScroll > 0) {
            window.requestAnimationFrame(smoothscroll);
            window.scrollTo(0, currentScroll - (currentScroll / 5));
        }
    })();
}

function initEventHandlers() {
    // Inicializa los manejadores de eventos para el checkbox "Seleccionar todos"
    $('#datatable-select-all').on('click', toggleSelectAll);

    // Inicializa los manejadores de eventos para los checkboxes individuales de cada fila
    $('#datatable tbody').on('change', 'input[type="checkbox"]', handleRowCheckboxChange);
}

function toggleSelectAll() {
    var checked = this.checked;
    seleccionarTodosLosCheckbox(checked);
    actualizarSelectAllCheckboxState();
}

function handleRowCheckboxChange() {
    actualizarSelectAllCheckboxState();
}

function seleccionarTodosLosCheckbox(checked) {
    var rows = table.rows({ 'search': 'applied' }).nodes();
    $('input[type="checkbox"]', rows).prop('checked', checked);
}

function actualizarSelectAllCheckboxState() {
    var allChecked = table.rows({ 'search': 'applied' }).nodes().length === $('input[type="checkbox"]:checked', table.rows({ 'search': 'applied' }).nodes()).length;
    var selectAllCheckbox = $('#datatable-select-all').get(0);
    selectAllCheckbox.checked = allChecked;
    selectAllCheckbox.indeterminate = !allChecked && $('input[type="checkbox"]:checked', table.rows({ 'search': 'applied' }).nodes()).length > 0;
}

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#datatable').on( 'page.dt',   function () { scrollToTop();
        } ).dataTable();

    // Inicializa la tabla y los manejadores de eventos
    initEventHandlers();
});

/*========================================MODALES==========================================*/
function ModalEdit(uuid) {
    var url = baseUrlEdit.replace('tempId', uuid);
    $.get(url, function(response) {
        $('#content-edit').html(response);
        $('#edit').modal('show');
        $('#content-edit .select2').select2();
    });
}

function ModalShow(uuid) {
    var url = baseUrlShow.replace('tempId', uuid);
    $.get(url, function(response) {
        $('#content-show').html(response);
        $('#show').modal('show');
        $('#content-show .select2').select2();
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

//obtiene los datos de marca y modelo del vehiculo seleccionado y completa los input
function getVehicleData() {
        var selectedOption = $('#vehicle_id option:selected');
        var brand = selectedOption.data('brand');
        var model = selectedOption.data('model');
        var user = selectedOption.data('user');
        var subscriptionStatus = selectedOption.data('subscription');

        console.log(subscriptionStatus);

        $('#user_name').val(user);
        $('#vehicle_brand').val(brand);
        $('#vehicle_model').val(model);

        // Muestra la caja correspondiente al estado de la suscripción y oculta las demás
        if (subscriptionStatus === 'Pendiente') {
            $('#subscription-pendiente').show();
            $('#subscription-pagado, #subscription-none').hide();
        } else if (subscriptionStatus === 'Pagado') {
            $('#subscription-pagado').show();
            $('#subscription-pendiente, #subscription-none').hide();
        } else {
            $('#subscription-none').show();
            $('#subscription-pagado, #subscription-pendiente').hide();
        }

    }

    $(document).ready(function() {
        // Cuando se muestra el modal, llama a la función getVehicleDataEdit()
        $('#edit').on('shown.bs.modal', function () {
            getVehicleDataEdit();
        });
    });

    function getVehicleDataEdit() {

        // Obtiene el elemento select
        var selectElement = document.getElementById('vehicle_id_edit');

        // Obtiene el option seleccionado
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        var brand = selectedOption.getAttribute('data-brand');
        var model = selectedOption.getAttribute('data-model');
        var user = selectedOption.getAttribute('data-user');
        console.log(user, model, brand);

        document.getElementById('name_edit').value = user;
        document.getElementById('brand_edit').value = brand;
        document.getElementById('model_edit').value = model;
    }

//en caso de que se quiera redireccionar y no usar modal
// function redirectToEdit(uuid) {
//     var url = baseUrlEdit.replace('tempId', uuid);
//     window.location.href = url;
// }
/*========================================MODALES==========================================*/

</script>
