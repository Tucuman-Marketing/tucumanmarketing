<!-- JavaScript Files -->
<script src="{{asset('theme-front/globaltalentsphere/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('theme-front/globaltalentsphere/js/bootstrap.js')}}"></script>
<script src="{{asset('theme-front/globaltalentsphere/js/libs.min.js')}}"></script>
<script src="{{asset('theme-front/globaltalentsphere/js/index.js')}}"></script>
<script src="{{asset('theme-front/globaltalentsphere/js/wizardform.js')}}"></script>


{{-- select2 --}}
{!!Html::script('theme-admin/velvet/assets/plugins/select2/select2.full.min.js')!!}
{{-- Config Select2 --}}
@include('layouts.theme-admin.velvet.js.select2')

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


<script>
    var app = {
        init: function () {
            this.cacheDom();
            this.setupAria();
            this.trigger();
        },
        cacheDom: function () {
            this.$target = $(".share-widget");
            this.$channels = this.$target.find(".channels");
            this.$trigger = this.$target.find("a").eq(0);
        },
        setupAria: function () {
            this.$target.each(function (idx, item) {
                var $trigger = $(this).find("a").eq(0),
                    $channels = $(this).find(".channels"),
                    channelId = $channels.attr("id");
                $trigger.attr({
                    "aria-controls": channelId
                });
            });
            this.$channels.attr({
                "aria-hidden": true
            });
        },
        trigger: function () {
            this.$target.each(function (idx, item) {
                var $this = $(item),
                    $trigger = $this.find("a").eq(0);
                $trigger.on("click", function (e) {
                    e.preventDefault();
                    var $channels = $(this).next();
                    $channels.toggleClass("show");
                    $channels.attr("aria-hidden", !$channels.hasClass("show"));
                });
            });
        }
    };

    app.init();
</script>

<script>
    //desabilita todos los botones submit al enviar cualquier formulario
    $(document).ready(function() {
        $('form').on('submit', function() {
            $(this).find('button[type=submit]').prop('disabled', true);
            $(this).find('button[type=submit]').html('<i class="fa fa-spinner fa-spin"></i>');
        });
    });
</script>

<!-- Counter Scripts -->
<script>
// Selecciona todos los elementos con la clase "counter-value-custom"
const counters = document.querySelectorAll(".counter-value-custom");

// Configura el observer para detectar cuando los contadores están en vista
const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const counter = entry.target;
      counter.innerText = "0";

      const updateCounter = () => {
        const target = +counter.getAttribute("data-target");
        const c = +counter.innerText;

        // Ajusta el incremento para hacerlo más lento
        const increment = target / 1000; // Puedes ajustar este valor para cambiar la velocidad

        if (c < target) {
          counter.innerText = `${Math.ceil(c + increment)}`;
          setTimeout(updateCounter, 20); // Ajusta el tiempo para hacer el incremento más lento
        } else {
          counter.innerText = target;
        }
      };

      updateCounter();

      // Deja de observar el contador después de que se haya ejecutado
      observer.unobserve(counter);
    }
  });
}, {
  threshold: 0.5 // Ejecuta cuando al menos el 50% de la sección es visible
});

// Observa cada contador
counters.forEach(counter => {
  observer.observe(counter);
});

</script>


{{-- Tap-top js --}}
<script>
// Show the button when the user scrolls down 100px from the top of the document
window.addEventListener("scroll", function() {
    const tapTop = document.querySelector(".tap-top");
    if (window.pageYOffset > 100) {
        tapTop.classList.add("show");
    } else {
        tapTop.classList.remove("show");
    }
});

// Scroll to the top when the user clicks on the button
document.querySelector(".tap-top").addEventListener("click", function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});
</script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Función para cargar el contenido del SVG
        function loadSVG(path, containerId) {
            fetch(path)
            .then(response => response.text())
            .then(svgContent => {
                const parser = new DOMParser();
                const svgDoc = parser.parseFromString(svgContent, 'image/svg+xml');
                const svgElement = svgDoc.documentElement;
                document.getElementById(containerId).appendChild(svgElement);
            })
            .catch(error => {
                console.error('Error al cargar el SVG:', error);
            });
        }

        // Cargar el primer SVG
        loadSVG('path_to_svg1.svg', 'importedSVG1');
        // Cargar el segundo SVG
        loadSVG('path_to_svg2.svg', 'importedSVG2');
        // Cargar el tercer SVG
        loadSVG('path_to_svg3.svg', 'importedSVG3');


            // Función para cargar el SVG
            function loadSVG() {
                fetch('{{ asset("theme-front/globaltalentsphere/img/cub_seven.svg") }}')
                .then(response => {
                    // Si es un SVG real con extensión PNG
                    if (response.headers.get('Content-Type').includes('image/svg+xml')) {
                        return response.text();
                    } else {
                        // Si es un PNG, usamos la imagen como fondo y creamos un path personalizado
                        createCustomPath();
                        return null;
                    }
                })
                .then(svgContent => {
                    if (svgContent) {
                        // Insertar el contenido SVG
                        const parser = new DOMParser();
                        const svgDoc = parser.parseFromString(svgContent, 'image/svg+xml');
                        const svgElement = svgDoc.documentElement;

                        // Extraer los paths del SVG
                        const paths = svgElement.querySelectorAll('path');

                        // Añadir los paths al SVG principal
                        paths.forEach(path => {
                            const newPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
                            newPath.setAttribute('d', path.getAttribute('d'));
                            newPath.setAttribute('stroke', '#FF3EB5');
                            newPath.setAttribute('stroke-width', '2');
                            newPath.setAttribute('fill', 'none');
                            newPath.setAttribute('id', 'animationPath');
                            importedSVG.appendChild(newPath);
                        });

                        // Iniciar la animación
                        startAnimation();
                    }
                })
                .catch(error => {
                    console.error('Error al cargar el SVG:', error);
                    // Si hay error, crear un path personalizado
                    createCustomPath();
                });
            }

            // Función para crear un path personalizado basado en la imagen
            function createCustomPath() {
                // Crear un path que simule la forma angular de la imagen
                const newPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
                // Este path debe ajustarse según la forma exacta de tu imagen
                newPath.setAttribute('d', 'M0,700 L300,400 L700,0');
                newPath.setAttribute('stroke', '#FF3EB5');
                newPath.setAttribute('stroke-width', '2');
                newPath.setAttribute('fill', 'none');
                newPath.setAttribute('id', 'animationPath');
                importedSVG.appendChild(newPath);

                // Añadir la imagen como fondo
                const image = document.createElementNS("http://www.w3.org/2000/svg", "image");
                image.setAttribute('href', '{{ asset("theme-front/globaltalentsphere/img/cub_seven.png") }}');

                image.setAttribute('width', '100%');
                image.setAttribute('height', '100%');
                image.setAttribute('preserveAspectRatio', 'none');
                importedSVG.insertBefore(image, importedSVG.firstChild);

                // Iniciar la animación
                startAnimation();
            }

            // Función para iniciar la animación
            function startAnimation() {
                const path = document.getElementById('animationPath');
                const lightEffect = document.getElementById('lightEffect');

                // Crear la animación
                const animateMotion = document.createElementNS("http://www.w3.org/2000/svg", "animateMotion");
                animateMotion.setAttribute('dur', '6s');
                animateMotion.setAttribute('repeatCount', 'indefinite');
                animateMotion.setAttribute('rotate', 'auto');

                const mpath = document.createElementNS("http://www.w3.org/2000/svg", "mpath");
                mpath.setAttributeNS("http://www.w3.org/1999/xlink", "href", "#animationPath");

                animateMotion.appendChild(mpath);
                lightEffect.appendChild(animateMotion);

                // Crear luces adicionales con diferentes retrasos
                for (let i = 1; i <= 2; i++) {
                    const newLight = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                    newLight.setAttribute('r', '15');
                    newLight.setAttribute('fill', 'url(#lightGradient)');
                    newLight.setAttribute('filter', 'url(#glow)');
                    newLight.setAttribute('opacity', '0.7');

                    const newAnimation = document.createElementNS("http://www.w3.org/2000/svg", "animateMotion");
                    newAnimation.setAttribute('dur', '6s');
                    newAnimation.setAttribute('repeatCount', 'indefinite');
                    newAnimation.setAttribute('rotate', 'auto');
                    newAnimation.setAttribute('begin', `${i * 2}s`); // Retraso escalonado

                    const newMpath = document.createElementNS("http://www.w3.org/2000/svg", "mpath");
                    newMpath.setAttributeNS("http://www.w3.org/1999/xlink", "href", "#animationPath");

                    newAnimation.appendChild(newMpath);
                    newLight.appendChild(newAnimation);
                    document.querySelector('svg').appendChild(newLight);
                }
            }

            // Iniciar el proceso
            loadSVG();
        });
</script> --}}



@if(config('app.recaptcha'))
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha_site_key') }}"></script>
    <script>
        function executeRecaptcha(action, elementId) {
            grecaptcha.execute('{{ config('app.recaptcha_site_key') }}', {action: action}).then(function(token) {
                var element = document.getElementById(elementId);
                if (element && token) {
                    element.value = token;
                }
            });
        }

        function refreshRecaptcha() {
            executeRecaptcha('contact', 'g-recaptcha-response');
            executeRecaptcha('modal', 'modal-g-recaptcha-response');
        }

        grecaptcha.ready(function() {
            refreshRecaptcha();
            setInterval(refreshRecaptcha, 120000);
        });
    </script>
@endif



@yield('other-scripts')
