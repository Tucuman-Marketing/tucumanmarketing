processing: true,
serverSide: true,
pageLength: 10,
pagingType: "full_numbers",
{{-- dom: 'Bfrtip',
buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
], --}}
order: [[ 0, "desc" ]],
searching: false,
fixedHeader: true,
deferRender: true,
responsive: true,
{{-- processing: false, --}}
language: {
    "decimal": "",
    "emptyTable": "No hay información",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ Entradas",
    "loadingRecords": "Cargando...",
    {{-- "processing": "Cargando... <img src='{{asset('theme-admin/volgh/assets/images/loader2.svg')}}' >", --}}
    "processing": "Cargando...",
    "search": "Buscar:",
    "zeroRecords": "Sin resultados encontrados",
    "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
    }
},