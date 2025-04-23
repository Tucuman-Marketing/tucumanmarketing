<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>


<style>

.highlight-row.selected-row {
        background-color: #7460e8 !important
    }

/* Estilos para el modo oscuro */
[data-theme-mode="dark"] .dataTables_info {
    color: white !important; /* Texto en blanco para el modo oscuro */
    background-color: #262c3c !important; /* Fondo negro para el modo oscuro */
    padding: 10px !important;
    border-radius: 5px !important;
}

/* Estilos para el modo claro */
[data-theme-mode="light"] .dataTables_info {
    color: #000000 !important; /* Texto rojo para el modo claro */
    background-color: #ffffff !important; /* Fondo rojo claro para el modo claro */
}

/* Estilos para el modo oscuro */
[data-theme-mode="dark"] label {
    color: #ffffff; /* Texto en blanco para el modo oscuro */
}

/* Estilos para el modo claro */
[data-theme-mode="light"] label {
    color: #000000; /* Texto en negro para el modo claro */
}

    .dataTables_processing{
        margin: 0 !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        vertical-align: middle !important;
        text-align: center !important;
        padding-top: 50px !important;
        background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(69, 77, 85)), color-stop(25%, rgba(69, 77, 85)), color-stop(75%, rgba(69, 77, 85)), color-stop(100%, rgba(69, 77, 85))) !important;
        background: -webkit-linear-gradient(left, rgba(69, 77, 85) 0%, rgba(69, 77, 85) 25%, rgba(69, 77, 85) 75%, rgba(69, 77, 85) 100%) !important;
        background: -moz-linear-gradient(left, rgba(69, 77, 85) 0%, rgba(69, 77, 85) 25%, rgba(69, 77, 85) 75%, rgba(69, 77, 85) 100%) !important;
        background: -ms-linear-gradient(left, rgba(69, 77, 85) 0%, rgba(69, 77, 85) 25%, rgba(69, 77, 85) 75%, rgba(69, 77, 85) 100%) !important;
        background: -o-linear-gradient(left, rgba(69, 77, 85) 0%, rgba(69, 77, 85) 25%, rgba(69, 77, 85) 75%, rgba(69, 77, 85) 100%) !important;
        background: linear-gradient(to right, rgba(69, 77, 85) 0%, rgba(69, 77, 85) 25%, rgba(69, 77, 85) 75%, rgba(69, 77, 85) 100%) !important;
    }

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

    /* Estilos para indicar columnas activas/inactivas */
    .dt-button-collection .dt-button.active,
    .dt-button-collection .dt-button.active:hover,
    .dt-button-collection .dt-button.active:focus {
        background-color: #4CAF50 !important; /* Color para columnas activas */
        color: white !important;
    }

    .dt-button-collection .dt-button:not(.active),
    .dt-button-collection .dt-button:not(.active):hover,
    .dt-button-collection .dt-button:not(.active):focus {
        background-color: #f44336 !important; /* Color para columnas inactivas */
        color: white !important;
    }

</style>



<script>

var table;
var csrfToken = '{{ csrf_token() }}';
var dynamicUrl; // Variable global para la URL dinámica


function activartabla(tableName,url,ajaxMethod, columns,order, permissions) {

    dynamicUrl = url;

    var canDelete   = permissions.canDelete;
    var canEdit     = permissions.canEdit;
    var canShow     = permissions.canShow;
    var ajaxMethod  = ajaxMethod;

    /*============================BUTTONS============================*/
    var enableCopy = true;
    var enableCsv = true;
    var enableExcel = true;
    var enablePdf = true;
    var enablePrint = true;
    var enableDelete = true;
    var enableColVis = true; // Añadir esta variable
    var buttons = [];
    if (enableCopy) {
        buttons.push({
            extend: 'copy',
            text: '<i class="fa fa-copy"></i>',
            titleAttr: 'Copy to clipboard',
            className: 'btn  btn-primary',
            exportOptions: {
                columns: ':visible' // Exportar solo columnas visibles
            }
        });
    }
    if (enableCsv) {
        buttons.push({
            extend: 'csv',
            text: '<i class="fa fa-file-csv"></i>',
            titleAttr: 'Download as CSV',
            className: 'btn  btn-primary',
            exportOptions: {
                columns: ':visible' // Exportar solo columnas visibles
            }
        });
    }
    if (enableExcel) {
        buttons.push({
            extend: 'excel',
            text: '<i class="fa fa-file-excel"></i>',
            titleAttr: 'Download as Excel',
            className: 'btn  btn-primary',
            exportOptions: {
                columns: ':visible' // Exportar solo columnas visibles
            }
        });
    }
    if (enablePdf) {
        buttons.push({
            extend: 'pdf',
            text: '<i class="fa fa-file-pdf"></i>',
            titleAttr: 'Download as PDF',
            className: 'btn  btn-primary',
            exportOptions: {
                columns: ':visible' // Exportar solo columnas visibles
            }
        });
    }
    if (enablePrint) {
        buttons.push({
            extend: 'print',
            text: '<i class="fa fa-print"></i>',
            titleAttr: 'Print table',
            className: 'btn  btn-primary',
            exportOptions: {
                columns: ':visible' // Exportar solo columnas visibles
            }
        });
    }
    if (enableDelete) {
        if (canDelete) {
            buttons.push({
                text: '<i class="fa fa-trash"></i>',
                titleAttr: 'Eliminar seleccionados',
                className: 'btn  btn-danger',
                action: function ( e, dt, node, config ) {
                        ModalMassDelete();
                }
            });
        }
    }
    var colVisColumns = columns.map((col, index) => col.headerTitle !== false ? index : -1).filter(index => index !== -1);
    if (enableColVis) {
        buttons.push({
            extend: 'colvis',
            text: '<i class="fa fa-columns"></i>',
            titleAttr: 'Column visibility',
            className: 'btn btn-primary',
            columns: colVisColumns

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
        order: order,
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
        stateSave: true,
        stateSaveCallback: function (settings, data) {
            localStorage.setItem('DataTables_' + tableName, JSON.stringify(data));
        },
        stateLoadCallback: function (settings) {
            return JSON.parse(localStorage.getItem('DataTables_' + tableName));
        },
        /*============================OPTIONS============================*/

        /*============================AJAX============================*/
        ajax: {
            url: url,
            type: ajaxMethod,
            headers: {
                    'X-CSRF-TOKEN': csrfToken
            }
        },
        /*============================AJAX============================*/

        /*============================COLUMNS============================*/
        columns: columns,
        /*============================COLUMNS============================*/
        initComplete: function() {
            // Elimina la clase 'dt-button' de todos los botones en el contenedor de DataTables
            $('.dt-buttons .btn').removeClass('dt-button');
        }

    });


}

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
    $('#datatable-select-all').on('click', toggleSelectAll);
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

function eliminarSeleccionados() {
    var ids = $('input.dt-checkboxes:checkbox:checked').map(function() {
        return this.value;
    }).get();

    if (ids.length > 0) {
        $('#ids_customer_delete').val(ids.join(',')); // Asegúrate de que el servidor pueda manejar los IDs separados por comas
        if (confirm("Los registros seleccionados serán eliminados. ¿Estás seguro?")) {
            $('#deleteFormMass').submit();
        }
    } else {
        alert("No hay registros seleccionados.");
    }
}

function marcarFilaSeleccionada(uuid) {
    $('#datatable tbody tr').each(function() {
        $(this).removeClass('highlight-row selected-row').css('cssText', '');
    });
    table.rows().every(function() {
        var d = this.data();
        if (d.uuid === uuid) {
            var row = this.node();
            $(row).addClass('highlight-row selected-row');
        }
    });
}

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#datatable').on( 'page.dt',   function () { scrollToTop();
        } ).dataTable();

    // Inicializa la tabla y los manejadores de eventos
    initEventHandlers();
});


</script>

<script>
    /*========================FUNCIONES DE BUSQUEDA Y FILTRADO=======================*/
function Filtrar(campoFecha) {
    // Limpia el otro campo de fecha basado en el campo que disparó el evento
    if (campoFecha === 'search_date') {
        $("#search_date_range").val(null);
    } else if (campoFecha === 'search_date_range') {
        $("#search_date").val(null);
    }

    var parametrosBusqueda = {};

    // Recoge todos los inputs cuyo id comience con 'search_'
    $("[id^='search_']").each(function() {
        var id = $(this).attr('id');
        var valor = $(this).val() || null;
        parametrosBusqueda[id] = valor;
    });

    // Si ya tienes la instancia de DataTables almacenada en una variable global `table`
    // entonces puedes llamar directamente a `.ajax.url()` y pasar la nueva URL con los parámetros.
    table.ajax.url(dynamicUrl + '?' + $.param(parametrosBusqueda)).load();
}

function Filtrarlimpiar() {
    $("[id^='search_']").each(function() {
        $(this).val(null);
    });
    Filtrar();
}

function toggleSearchForm() {
    var searchForm = $('#searchForm');
    searchForm.slideToggle();
    $('.select-2').select2();
    $('#search_general').val('');
    $('#search_general').prop('disabled', function(i, v) { return !v; });
    Filtrarlimpiar();
}

$('.datetime').datetimepicker({
    format: 'DD-MM-YYYY'
}).on('dp.change', function() {
    Filtrar($(this).attr('id'));
});

$(function() {
        $('#search_date_range').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'DD-MM-YYYY',
                applyLabel: 'Aplicar',
                cancelLabel: 'Cancelar',
                fromLabel: 'Desde',
                toLabel: 'Hasta',
                customRangeLabel: 'Personalizado',
                daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                firstDay: 1
            }
        });

        $('#search_date_range').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
            Filtrar('search_date_range');
        });

        $('#search_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            Filtrar('search_date_range');
        });
});
/*========================FUNCIONES DE BUSQUEDA Y FILTRADO=======================*/


/*========================MODALES DELETE=======================*/
function ModalDelete(data) {
    $('#delete').modal('show');
    $('#deleteForm').attr('action', urls.baseUrlDelete);
    $('#uuid_delete').val(data);
    marcarFilaSeleccionada(data);
}


function ModalMassDelete() {
    var uuids = $('input.dt-checkboxes:checkbox:checked').map(function() {
        return this.value;
    }).get();

    if (uuids.length > 0) {
        // Actualiza el valor del campo oculto con los IDs
        $('#uuids_delete').val(uuids.join(','));
        $('#deleteFormMass').attr('action', urls.baseUrlMassDelete);
        $('#massDelete').modal('show');
    } else {
        alert("No hay registros seleccionados.");
    }
}
/*========================MODALES DELETE=======================*/


</script>
