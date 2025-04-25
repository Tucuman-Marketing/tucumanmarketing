<!DOCTYPE html>
<html lang="es">

    {{-- HEAD --}}
    @section('htmlheader')
        @include('webcontent::website.globaltTalentSphere.layouts.htmlheader')
    @show
    {{-- HEAD --}}

<body>

<!-- Start Preloader Area -->
<div class="preloader">
    <div class="loader">
        <div class="shadow"></div>
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader Area -->

<!-- Start Top Header Area -->
{{-- <div class="top-header-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="top-header-information">
                    <li>
                        <i class='bx bx-envelope'></i>
                        <a href="mailto:info@tucumanmarketing.com">info@tucumanmarketing.com</a>
                    </li>

                    <li>
                        <i class='bx bxs-phone'></i>
                        <a href="tel:+543814567890">+54 381 456-7890</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6">
                <ul class="top-header-others">
                    <li>
                        <i class='bx bxs-map'></i>
                        <a href="#">Ubicaciones</a>
                    </li>

                    <li class="languages-list">
                        <select>
                            <option value="1">Español</option>
                            <option value="2">English</option>
                        </select>
                    </li>

                    <li>
                        <i class='bx bx-user'></i>
                        <a href="#">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Top Header Area -->

<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="{{ route('public.index') }}">
                        <img src="{{ asset('theme-front/tucumanmarketing/img/logo-1.png') }}" class="black-logo" alt="Tucumán Marketing">
                        <img src="{{ asset('theme-front/tucumanmarketing/img/white-logo.png') }}" class="white-logo" alt="Tucumán Marketing">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('public.index') }}">
                    <img src="{{ asset('theme-front/tucumanmarketing/img/logo-1.png') }}" class="black-logo" alt="Tucumán Marketing">
                    <img src="{{ asset('theme-front/tucumanmarketing/img/white-logo.png') }}" class="white-logo" alt="Tucumán Marketing">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('public.index') }}" class="nav-link active">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#quienes-somos" class="nav-link">Quiénes somos</a>
                        </li>
                        <li class="nav-item">
                            <a href="#porque-elegirnos" class="nav-link">¿Por qué elegirnos?</a>
                        </li>
                        <li class="nav-item">
                            <a href="#servicios" class="nav-link">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('public.contact') }}" class="nav-link">Contacto</a>
                        </li>
                    </ul>

                    {{-- <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <form class="search-box" action="#" method="GET">
                                <input type="text" class="form-control" name="q" placeholder="Buscar...">
                                <button type="submit"><i class="flaticon-loupe"></i></button>
                            </form>
                        </div>

                        <div class="option-item">
                            <a href="#" class="default-btn">Contactar</a>
                        </div>
                    </div> --}}
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

@yield('content')

<!--footer start-->
@include('webcontent::website.globaltTalentSphere.layouts.footer')
<!--footer end-->

<!--scripts-->
@section('scripts')
    @include('webcontent::website.globaltTalentSphere.layouts.scripts')
@show
<!--scripts-->

</body>
</html>
