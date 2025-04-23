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