<script>
	
    /*========================FUNCIONES DE BUSQUEDA Y FILTRADO=======================*/
    
    $(document).ready(function(){
        $('#buscar_id').click(function(){
           $("#buscar_cliente").val(null);
           $("#buscar_dni").val(null);
           $("#buscar_glm").val(null);
           $("#buscar_poliza").val(null);
           $("#buscar_realizada_en").val(null);
           $("#buscar_fecha").val(null);
           $("#fecha_inicio").val(null);
           $("#fecha_fin").val(null);
        });
    
        $('#buscar_cliente').click(function(){
           $("#buscar_id").val(null);
           $("#buscar_dni").val(null);
           $("#buscar_glm").val(null);
           $("#buscar_poliza").val(null);
           $("#buscar_realizada_en").val(null);
           $("#buscar_fecha").val(null);
           $("#fecha_inicio").val(null);
           $("#fecha_fin").val(null);
        });
    
        $('#buscar_dni').click(function(){
           $("#buscar_id").val(null);
           $("#buscar_cliente").val(null);
           $("#buscar_glm").val(null);
           $("#buscar_poliza").val(null);
           $("#buscar_realizada_en").val(null);
           $("#buscar_fecha").val(null);
           $("#fecha_inicio").val(null);
           $("#fecha_fin").val(null);
        });
    
        $('#buscar_glm').click(function(){
           $("#buscar_id").val(null);
           $("#buscar_cliente").val(null);
           $("#buscar_dni").val(null);
           $("#buscar_poliza").val(null);
           $("#buscar_realizada_en").val(null);
           $("#buscar_fecha").val(null);
           $("#fecha_inicio").val(null);
           $("#fecha_fin").val(null);
        });
    
        $('#buscar_poliza').click(function(){
           $("#buscar_id").val(null);
           $("#buscar_cliente").val(null);
           $("#buscar_dni").val(null);
           $("#buscar_glm").val(null);
           $("#buscar_realizada_en").val(null);
           $("#buscar_fecha").val(null);
           $("#fecha_inicio").val(null);
           $("#fecha_fin").val(null);
        });
    
        $('#buscar_realizada_en').click(function(){
           $("#buscar_id").val(null);
           $("#buscar_cliente").val(null);
           $("#buscar_dni").val(null);
           $("#buscar_glm").val(null);
           $("#buscar_poliza").val(null);
           $("#buscar_fecha").val(null);
           $("#fecha_inicio").val(null);
           $("#fecha_fin").val(null);
        });
    
    
        $('#buscar_fecha').change(function(){
           $("#buscar_id").val(null);
           $("#buscar_cliente").val(null);
           $("#buscar_dni").val(null);
           $("#buscar_glm").val(null);
           $("#buscar_poliza").val(null);
           $("#buscar_realizada_en").val(null);
           $("#fecha_inicio").val(null);
           $("#fecha_fin").val(null);
        });
    
        $('#fecha_inicio').change(function(){
           $("#buscar_id").val(null);
           $("#buscar_cliente").val(null);
           $("#buscar_dni").val(null);
           $("#buscar_glm").val(null);
           $("#buscar_poliza").val(null);
           $("#buscar_realizada_en").val(null);
           $("#buscar_fecha").val(null);
        });
    
        $('#fecha_fin').change(function(){
           $("#buscar_id").val(null);
           $("#buscar_cliente").val(null);
           $("#buscar_dni").val(null);
           $("#buscar_glm").val(null);
           $("#buscar_poliza").val(null);
           $("#buscar_realizada_en").val(null);
           $("#buscar_fecha").val(null);
        });
    
    
    })
    
    
    
    
    function Filtrar() {
    

         var token        = $("#token").val();
         var fecha_inicio = $("#fecha_inicio").val();
         var fecha_fin    = $("#fecha_fin").val();
         var id           = $("#buscar_id").val();
         var cliente      = $("#buscar_cliente").val();
         var dni         = $("#buscar_dni").val();
         var glm        = $("#buscar_glm").val();
         var poliza       = $("#buscar_poliza").val();
         var fecha        = $("#buscar_fecha").val();
    
       
          if(fecha_inicio == ""){fecha_inicio=false;}
          if(fecha_fin == ""){fecha_fin = false;}
          if(id == ""){id = false;}
          if(cliente == ""){cliente = false;}
          if(dni == ""){dni = false;}
          if(glm == ""){glm = false;}
          if(poliza == ""){poliza = false;}
          if(fecha == ""){fecha = false;}
         console.log(fecha_inicio,fecha_fin,id,cliente,dni,glm,poliza,fecha)
              //con esto no nos muestra el alert al no enviar datos por ajax
              $.fn.dataTable.ext.errMode = 'throw';
                $('#mydatatable').DataTable().destroy();
                  var table = $('#mydatatable').DataTable({
                      // OPTIONS
                      @include('receipts::admin.receipt.js.datatable-options')
                       ajax: 'receipts/search-receipt-list-datatable/'+fecha_inicio+'/'+fecha_fin+'/'+id+'/'+cliente+'/'+dni+'/'+glm+'/'+poliza+'/'+fecha,
                      // COLUMNAS
                      @include('receipts::admin.receipt.js.datatable-columns')
                  }); 
    
    }
    
    
    
    
    
    
    
    function FiltrarRangos() {
    
         var token        = $("#token").val();
         var fecha_inicio = $("#fecha_inicio").val();
         var fecha_fin    = $("#fecha_fin").val();
         var id           = $("#buscar_id").val();
         var cliente      = $("#buscar_cliente").val();
         var dni         = $("#buscar_dni").val();
         var glm        = $("#buscar_glm").val();
         var poliza       = $("#buscar_poliza").val();
         var fecha        = $("#buscar_fecha").val();
    
       
         if(fecha_inicio == ""){
            //swal ( "Oops" ,  "Ingrese una fecha de inicio" ,  "error" );
            Command: toastr["error"]("", "Ingrese una fecha de inicio")
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
           return;
         }
    
         if(fecha_fin == ""){
           //swal ( "Oops" ,  "Ingrese una fecha de fin" ,  "error" );  
           Command: toastr["error"]("", "Ingrese una fecha de fin")
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
          return;
         }
    
           if (fecha_fin < fecha_inicio ) {
            //swal ( "Oops" ,  "La Fecha Fin es inferior a la Fecha Inicio" ,  "error" );
            Command: toastr["error"]("", "La Fecha Fin es inferior a la Fecha Inicio")
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
              return;
          }
    
          if(id == ""){id = false;}
          if(cliente == ""){cliente = false;}
          if(dni == ""){dni = false;}
          if(glm == ""){glm = false;}
          if(poliza == ""){poliza = false;}
          if(fecha == ""){fecha = false;}
    
    
              //con esto no nos muestra el alert al no enviar datos por ajax
              $.fn.dataTable.ext.errMode = 'throw';
                $('#mydatatable').DataTable().destroy();
                  var table = $('#mydatatable').DataTable({
                      // OPTIONS
                      @include('receipts::admin.receipt.js.datatable-options')
                       ajax: 'receipts/search-receipt-list-datatable/'+fecha_inicio+'/'+fecha_fin+'/'+id+'/'+cliente+'/'+dni+'/'+glm+'/'+poliza+'/'+fecha,
                      // COLUMNAS
                      @include('receipts::admin.receipt.js.datatable-columns')
                  }); 
    
    }
    
    
    
    function Filtrarlimpiar() {
      $("#buscar_id").val(null);
      $("#buscar_cliente").val(null);
      $("#buscar_dni").val(null);
      $("#buscar_glm").val(null);
      $("#buscar_fecha").val(null);
      $("#fecha_inicio").val(null);
      $("#fecha_fin").val(null);
    
      //swal ( "exito!!" ,  "Filtros Eliminados" ,  "success" );
      Command: toastr["success"]("", "Limpieza correcta de filtros")
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      $.fn.dataTable.ext.errMode = 'throw';
      $('#mydatatable').DataTable().destroy();
    
      activartabla();
    }
    /*========================FUNCIONES DE BUSQUEDA Y FILTRADO=======================*/
    
    
    </script>