<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>

<style>
.table.dataTable.fixedHeader-floating, table.dataTable.fixedHeader-locked {
    background-color: #000000;
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
</style>

<script>

$(document).ready(function() {
  $('#mydatatable')
    //   .on( 'order.dt',  function () { console.log('Order' ); } )
    //   .on( 'search.dt', function () {console.log('Search' ); } )
      .on( 'page.dt',   function () { 
        scrollToTop();
     } )
      .dataTable();
} );


function activartabla() {
    //con esto no nos muestra el alert al no enviar datos por ajax
    $.fn.dataTable.ext.errMode = 'throw';
    $('#mydatatable').DataTable().destroy();
    var table = $('#mydatatable').DataTable({
        
        // OPTIONS
        @include('receipts::admin.receipt.js.datatable-options')
        ajax: 'receipts/receipt-list-datatable',
        // COLUMNS
        @include('receipts::admin.receipt.js.datatable-columns')

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


</script>
