<script>

   /*========================FUNCIONES DE BUSQUEDA Y FILTRADO=======================*/
   
   function Filtrar(campoFecha) {
       // Limpia el otro campo de fecha basado en el campo que disparó el evento
       if (campoFecha === 'search_date') {
           $("#search_date_range").val(null);
       } else if (campoFecha === 'search_date_range') {
           $("#search_date").val(null);
       }
   
       var parametrosBusqueda = {
           // Aquí recolectas todos los valores de tus filtros.
           // Usa `false` o `null` como valor predeterminado si el campo está vacío.
           search_date_range: $("#search_date_range").val() || null,
           // Asegúrate de que todos los posibles campos de filtro estén incluidos aquí
       };
   console.log(parametrosBusqueda);
       // Si ya tienes la instancia de DataTables almacenada en una variable global `table`
       // entonces puedes llamar directamente a `.ajax.url()` y pasar la nueva URL con los parámetros.
       // Debes cambiar 'ruta/a/tu/controlador/searchDatatable' por la ruta real que maneja la búsqueda.
       table.ajax.url('{{ route("client.washeds.searchDatatable") }}?' + $.param(parametrosBusqueda)).load();
   }
   
   
   
   
   function Filtrarlimpiar() {
       //Limpiar todos los campos de búsqueda
       $("#search_date_range").val(null);
   
        // Reconfigurar DataTable si es necesario
       $.fn.dataTable.ext.errMode = 'throw';
       $('#datatable').DataTable().destroy();
       activartabla();
   
       // Mostrar notificación de éxito
       toastr["success"]("", "Limpieza correcta de filtros");
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
       };
   
   
   }
   
   
   /*========================FUNCIONES DE BUSQUEDA Y FILTRADO=======================*/
   
   
   </script>
   
   
   