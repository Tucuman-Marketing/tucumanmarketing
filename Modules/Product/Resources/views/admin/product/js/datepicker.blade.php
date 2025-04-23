{!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-daterangepicker/moment.min.js')!!}
{{-- {!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
{!!Html::script('theme-admin/volgh/assets/plugins/date-picker/spectrum.js')!!}
{!!Html::script('theme-admin/volgh/assets/plugins/date-picker/jquery-ui.js')!!}


{!!Html::script('theme-admin/volgh/assets/plugins/time-picker/jquery.timepicker.js')!!}
{!!Html::script('theme-admin/volgh/assets/plugins/time-picker/toggles.min.js')!!}
{!!Html::script('theme-admin/volgh/assets/js/form-elements.js')!!} --}}



{!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')!!}



<script>
    $('.datetimepicker').bootstrapMaterialDatePicker({ time: false,
        clearButton: true ,format : 'DD-MM-YYYY' , lang : 'es' ,weekStart : 0});
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
        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        Filtrar('search_date_range');
    });

    $('#search_date_range').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        Filtrar('search_date_range');
    });
});
</script>
