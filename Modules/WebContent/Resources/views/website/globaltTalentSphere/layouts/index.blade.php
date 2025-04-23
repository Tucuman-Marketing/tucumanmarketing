<!DOCTYPE html>
<html lang="en">

    {{-- HEAD --}}
    @section('htmlheader')
        @include('webcontent::website.globaltTalentSphere.layouts.htmlheader')
    @show
    {{-- HEAD --}}

<body>
    <div class="container">
        <div class="menu d-flex align-items-center">
            <a class="logo" href="{{ route('public.index')}}">
                <img src="{{asset('theme-front/globaltalentsphere/img/icons/logo_circular_avatar7.png')}}">
            </a>
            <div class="menu__icon">
                <span></span><span></span><span></span><span></span>
            </div>
            <div class="navbar-nav">
                <ul>
                    <li><a href="{{ route('public.index')}}">Inicio</a></li>
                    <li><a href="{{ route('public.uploadCV')}}">Dejanos tu CV</a></li>
                    <li><a href="{{ route('public.jobs')}}">Oportunidades</a></li>
                    <li><a href="{{ route('public.company') }}">Empresas</a></li>
                    <li><a href="{{ route('public.about')}}">Nosotros</a></li>
                    <li><a href="{{ route('public.posts')}}">Blog</a></li>
                    <li><a href="{{ route('public.contact')}}">Contacto</a></li>
                </ul>
            </div>
        </div>
    </div>




    @yield('content')

    <!--footer start-->
    @include('webcontent::website.globaltTalentSphere.layouts.footer')
    <!--footer end-->

{{-- js para mover la linea de abajo del menu --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Obtener la URL completa actual
    const currentUrl = window.location.href;

    // Seleccionar todos los enlaces del menú
    const menuLinks = document.querySelectorAll('.navbar-nav ul li a');

    // Recorrer cada enlace para compararlo con la URL actual
    menuLinks.forEach(link => {
        // Comprobar si el href del enlace coincide con la URL actual
        if (link.href === currentUrl) {
            // Quitar la clase 'active' de todos los elementos del menú
            menuLinks.forEach(link => link.parentElement.classList.remove('active'));

            // Añadir la clase 'active' al elemento padre <li> del enlace actual
            link.parentElement.classList.add('active');
        }
    });
});
</script>

    <!--scripts-->
    @section('scripts')
        @include('webcontent::website.globaltTalentSphere.layouts.scripts')
    @show
    <!--scripts-->


</body>
</html>
