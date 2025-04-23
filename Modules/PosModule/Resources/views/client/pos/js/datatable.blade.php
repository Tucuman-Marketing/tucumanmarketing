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
var baseUrlShow         = "{{ route('client.washeds.show', ['washeds' => 'tempId']) }}";
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
        order: [[ 0, "desc" ]],//ordenamiento por columna 0
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
        ajax: "{{ route('client.washeds.indexDatatable') }}",
        /*============================AJAX============================*/

        /*============================COLUMNS============================*/
        columns: [
            // UUID
            // {
            //     data: 'uuid',
            //     name: 'check',
            //     orderable: false,
            //     searchable: false,
            //     defaultContent: '', // Contenido por defecto (casilla de verificación)
            //     render: function(data, type, row) {
            //         if(canDelete){
            //             return `<input type="checkbox" class="dt-checkboxes" value="${data}">`; // El checkbox con el valor del ID
            //         }
            //     },
            //     title: '<input type="checkbox" name="select_all" value="1" id="datatable-select-all">', // Checkbox en el encabezado para seleccionar/deseleccionar todos
            // },

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
                    var html = '<span>' + moment(data).format('DD/MM/YYYY HH:mm') + '</span>';
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

//en caso de que se quiera redireccionar y no usar modal
// function redirectToEdit(uuid) {
//     var url = baseUrlEdit.replace('tempId', uuid);
//     window.location.href = url;
// }

</script>
