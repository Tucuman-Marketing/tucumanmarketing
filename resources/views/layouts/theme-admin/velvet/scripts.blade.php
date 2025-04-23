
<!-- JQUERY JS -->
{!!Html::script('theme-admin/velvet/assets/plugins/jquery/jquery.min.js')!!}
<!-- MAIN JS -->
<script src="{{asset('theme-admin/velvet/assets/js/main.js')}}"></script>
<!-- CHOICES JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<!-- POPPER JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/%40popperjs/core/umd/popper.min.js')}}"></script>
<!-- BOOTSTRAP JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DATE & TIME PICKER JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('theme-admin/velvet/assets/js/date%26time_pickers.js')}}"></script>
<!-- NODE WAVES JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/node-waves/waves.min.js')}}"></script>
<!-- SIMPLEBAR JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('theme-admin/velvet/assets/js/simplebar.js')}}"></script>
<!-- COLOR PICKER JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/%40simonwep/pickr/pickr.es5.min.js')}}"></script>
<!-- DEFAULTMENU JS -->
<script src="{{asset('theme-admin/velvet/assets/js/defaultmenu.js')}}"></script>
<!-- JSVECTOR MAPS JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('theme-admin/velvet/assets/libs/jsvectormap/maps/world-merc.js')}}"></script>
<!-- CHARTJS CHART JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/chart.js/chart.min.js')}}"></script>
<!-- APEX CHARTS JS -->
<script src="{{asset('theme-admin/velvet/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<!-- CRM-DASHBOARD JS -->
<script src="{{asset('theme-admin/velvet/assets/js/sales-dashboard.js')}}"></script>
<!-- FORM VALIDATION JS-->
<script src="{{asset('theme-admin/velvet/assets/js/validation.js')}}"></script>
<!-- STICKY JS -->
<script src="{{asset('theme-admin/velvet/assets/js/sticky.js')}}"></script>
<!-- CUSTOM JS -->
<script src="{{asset('theme-admin/velvet/assets/js/custom.js')}}"></script>
<!-- CUSTOM-SWITCHER JS -->
<script src="{{asset('theme-admin/velvet/assets/js/custom-switcher.js')}}"></script>
{{-- select2 --}}
{!!Html::script('theme-admin/velvet/assets/plugins/select2/select2.full.min.js')!!}

{{-- TOAST --}}
<script src="{{asset('theme-admin/velvet/assets/plugins/toastr/js/toastr.js')}}"></script>
<script>
    toastr.options = {
                    "closeButton": false,
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
</script>


<!-- sweetalert -->
@include('sweetalert::alert')


{{-- Validación de formularios --}}
<script>
    // Deshabilita todos los botones submit al enviar cualquier formulario si el formulario es válido
    $(document).ready(function() {
        $('form').on('submit', function(event) {
            if (this.checkValidity()) {
                $(this).find('button[type=submit]').prop('disabled', true);
                $(this).find('button[type=submit]').html('<i class="fa fa-spinner fa-spin"></i>');
            } else {
                event.preventDefault();
                event.stopPropagation();

                // Encontrar el primer campo con error y desplazarse hacia él
                const firstInvalidElement = $(this).find(':invalid').first();
                $('html, body').animate({
                    scrollTop: firstInvalidElement.offset().top - 20 // Ajusta el desplazamiento según sea necesario
                }, 500);
            }
            $(this).addClass('was-validated');
        });
    });
</script>


{{-- FullScreem --}}
<script>
$(document).ready(function() {
    var elem = document.documentElement;
    window.openFullscreen = function() {
        let open = $('.full-screen-open');
        let close = $('.full-screen-close');

        console.log("Fullscreen toggle initiated");

        if (!document.fullscreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
            console.log("Entering fullscreen mode");
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
                console.log("Requesting fullscreen using requestFullscreen");
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
                console.log("Requesting fullscreen using webkitRequestFullscreen");
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
                console.log("Requesting fullscreen using msRequestFullscreen");
            }
            close.removeClass('d-none').addClass('d-block');
            open.addClass('d-none');
            console.log("Fullscreen mode entered");
        } else {
            console.log("Exiting fullscreen mode");
            if (document.exitFullscreen) {
                document.exitFullscreen();
                console.log("Exiting fullscreen using exitFullscreen");
            } else if (document.webkitExitFullscreen) { /* Safari */
                document.webkitExitFullscreen();
                console.log("Exiting fullscreen using webkitExitFullscreen");
            } else if (document.msExitFullscreen) { /* IE11 */
                document.msExitFullscreen();
                console.log("Exiting fullscreen using msExitFullscreen");
            }
            close.removeClass('d-block').addClass('d-none');
            open.removeClass('d-none');
            console.log("Fullscreen mode exited");
        }
    };
});
</script>





{{-- Config Datatable --}}
@include('layouts.theme-admin.velvet.js.datatable')
{{-- Config Select2 --}}
@include('layouts.theme-admin.velvet.js.select2')
{{-- Config Datepicker --}}
@include('layouts.theme-admin.velvet.js.datetimepicker')


@yield('other-scripts')
