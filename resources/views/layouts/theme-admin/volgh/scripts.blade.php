    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



    <!-- JQUERY JS -->
    {!!Html::script('theme-admin/volgh/assets/plugins/jquery/jquery.min.js')!!}

    <!-- BOOTSTRAP JS -->
    {!!Html::script('theme-admin/volgh/assets/plugins/bootstrap/js/popper.min.js')!!}
    {!!Html::script('theme-admin/volgh/assets/plugins/bootstrap/js/bootstrap.min.js')!!}

    <!-- SPARKLINE JS-->
    {!!Html::script('theme-admin/volgh/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')!!}

    <!-- CHART-CIRCLE JS -->
    {!!Html::script('theme-admin/volgh/assets/plugins/circle-progress/circle-progress.min.js')!!}

    <!-- C3.JS CHART JS -->
    {!!Html::script('theme-admin/volgh/assets/plugins/charts-c3/d3.v5.min.js')!!}
    {!!Html::script('theme-admin/volgh/assets/plugins/charts-c3/c3-chart.js')!!}

    <!-- INPUT MASK JS-->
    {!!Html::script('theme-admin/volgh/assets/plugins/input-mask/jquery.mask.min.js')!!}

    <!-- SIDE-MENU JS-->
    {!!Html::script('theme-admin/volgh/assets/plugins/sidemenu/sidemenu.js')!!}

    <!-- SIDEBAR JS -->
    {!!Html::script('theme-admin/volgh/assets/plugins/sidebar/sidebar.js')!!}

    <!-- Perfect SCROLLBAR JS-->
    {!!Html::script('theme-admin/volgh/assets/plugins/p-scroll/perfect-scrollbar.js')!!}
    {!!Html::script('theme-admin/volgh/assets/plugins/p-scroll/pscroll.js')!!}

    {{-- imagen upload --}}
    {!!Html::script('theme-admin/volgh/assets/plugins/fileuploads/js/fileupload.js')!!}
    {{-- {!!Html::script('theme-admin/volgh/assets/plugins/fileuploads/js/file-upload.js')!!} --}}

    <!--CUSTOM JS -->
    {!!Html::script('theme-admin/volgh/assets/js/custom.js')!!}

    <!-- Color Change JS -->
    {!!Html::script('theme-admin/volgh/assets/js/color-change.js')!!}

    <!-- SWITCHER JS -->
    {{-- {!!Html::script('theme-admin/volgh/assets/switcher/js/switcher.js')!!} --}}

     <!-- TOASTR -->
     {!!Html::script('theme-admin/volgh/assets/plugins/toastr/js/toastr.js')!!}
     {!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-daterangepicker/moment.min.js')!!}
     {!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')!!}
     {!!Html::script('theme-admin/volgh/assets/plugins/date-picker/spectrum.js')!!}
     {!!Html::script('theme-admin/volgh/assets/plugins/date-picker/jquery-ui.js')!!}
     {!!Html::script('theme-admin/volgh/assets/plugins/time-picker/jquery.timepicker.js')!!}
     {!!Html::script('theme-admin/volgh/assets/plugins/time-picker/toggles.min.js')!!}
     {!!Html::script('theme-admin/volgh/assets/js/form-elements.js')!!}


     {{-- colorpicker --}}
     {{-- {!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-colorpicker/js/bundle.js')!!} --}}
     {!!Html::script('theme-admin/volgh/assets/plugins/bootstrap-colorpicker/js/colorpicker.js')!!}

     {{-- multiple select --}}
     {!!Html::script('theme-admin/volgh/assets/plugins/multipleselect/multiple-select.js')!!}
     {!!Html::script('theme-admin/volgh/assets/plugins/multipleselect/multi-select.js')!!}

     {{-- select2 --}}
     {{-- {!!Html::script('theme-admin/volgh/assets/plugins/select2/select2.full.min.js')!!} --}}
     {!!Html::script('theme-admin/volgh/assets/plugins/select2/bootstrap/js/select2.full.min.js')!!}


     {{-- fontawesoem --}}
     {!!Html::script('theme-admin/volgh/assets/plugins/fontawesome/fontawesome-free-6.2.1/js/all.min.js')!!}

    {{-- moment --}}
    {!!Html::script('theme-admin/volgh/assets/plugins/moment/moment.js')!!}


   <!-- sweetalert -->
   @include('sweetalert::alert')




    @yield('mis-scripts')


<script>
    //desabilita todos los botones submit al enviar cualquier formulario
    $(document).ready(function() {
        $('form').on('submit', function() {
            $(this).find('button[type=submit]').prop('disabled', true);
            $(this).find('button[type=submit]').html('<i class="fa fa-spinner fa-spin"></i>');
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtener el valor de la variable en Local Storage
        var isDarkMode = localStorage.getItem('dark-mode');
        // Verificar si la variable es true y agregar la clase dark-mode al body
        if (isDarkMode === 'true') {
            document.body.classList.add('dark-mode');
        }
    });
</script>
