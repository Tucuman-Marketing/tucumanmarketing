{!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-daterangepicker/moment.min.js')!!}
{!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')!!}

{!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
{!!Html::script('theme-admin/volgh/assets/plugins/date-picker/spectrum.js')!!}
{!!Html::script('theme-admin/volgh/assets/plugins/date-picker/jquery-ui.js')!!}
{!!Html::script('theme-admin/volgh/assets/plugins/time-picker/jquery.timepicker.js')!!}
{!!Html::script('theme-admin/volgh/assets/plugins/time-picker/toggles.min.js')!!}
{!!Html::script('theme-admin/volgh/assets/js/form-elements.js')!!}

<script>
    // $('.datetimepicker').bootstrapMaterialDatePicker({ time: false,
    //     clearButton: true ,format : 'DD-MM-YYYY' , lang : 'es' ,weekStart : 0});

    $(document).ready(function() {
        $('.datetimepicker').daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false, // No actualiza automáticamente el input
            locale: {
                format: 'DD-MM-YYYY', // Formato de la fecha
                applyLabel: 'Aplicar',
                cancelLabel: 'Limpiar',
                fromLabel: 'Desde',
                toLabel: 'Hasta',
                customRangeLabel: 'Rango Personalizado',
                weekLabel: 'S',
                daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                firstDay: 1 // El primer día de la semana, Lunes
            }
        });

    // Evento que se dispara cuando se selecciona una fecha
    $('.datetimepicker').on('apply.daterangepicker', function(ev, picker) {
        var selectedDate = picker.startDate.format('DD-MM-YYYY');
        $(this).val(selectedDate); // Actualiza el input con la fecha seleccionada
        // Dispara manualmente el evento onchange
        this.onchange();
    });

    // Inicialización de Inputmask
    $(".datetimepicker").inputmask("datetime", {
        inputFormat: "dd-mm-yyyy",  // Define el formato de la fecha
        placeholder: "DD-MM-YYYY", // Placeholder para la fecha
        leapday: "-02-29",         // Configuración para año bisiesto
        separator: "-",            // Separador para la fecha
        showMaskOnHover: false     // Opcional: desactiva la máscara al pasar el mouse
    });

});
</script>

<script>
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
        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' a ' + picker.endDate.format('DD-MM-YYYY'));
        Filtrar('search_date_range');
    });

    $('#search_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        Filtrar('search_date_range');
    });
});
</script>
