<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="dark" data-header-styles="light" data-menu-styles="light" data-toggled="close">
    <head>

        @section('htmlheader')
	        @include('layouts.theme-admin.velvet.htmlheader')
        @show

    </head>



    <body >

        <div class="page error-bg" id="particles-js">
            <!-- Start::error-page -->
            <form class="validate-form" method="POST" action="{{ route('register.store') }}">
                {{ csrf_field() }}

            <div class="error-page  ">
                <div class="container-lg">
                    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                            <div class="my-5 d-flex justify-content-center">
                                <a href="index.html">
                                    <img src="assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                                    <img src="assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                                </a>
                            </div>
                            <div class="card custom-card  rectangle2">
                                <div class="card-body p-sm-5 p-3  rectangle3">
                                    <p class="h4 fw-semibold mb-2 text-center">Registro</p>
                                    <p class="mb-4 text-muted op-7 fw-normal text-center">
                                        @include('alerts.flash')
                                    </p>
                                    <div class="row gy-3">


                                        <div class="col-xl-12">
                                            <label for="signup-firstname" class="form-label text-default">Nombre</label>
                                            <input type="text" class="form-control form-control-lg"  name="name" placeholder="Ingrese el Nombre" required>
                                        </div>


                                        <div class="col-xl-12">
                                            <label for="signup-firstname" class="form-label text-default">Apellido</label>
                                            <input type="text" class="form-control form-control-lg"  name="lastname" placeholder="Ingrese el Apellido" required>
                                        </div>

                                        <div class="col-xl-12">
                                            <label for="signup-firstname" class="form-label text-default">Email</label>
                                            <input type="email" class="form-control form-control-lg"  name="email" placeholder="Ingrese el Email" required>
                                        </div>

                                        <div class="col-xl-12">
                                            <label for="signup-firstname" class="form-label text-default">Contraseña</label>
                                            <input type="password" class="form-control form-control-lg"  name="password" placeholder="Ingrese la Contraseña" required>
                                        </div>

                                        <div class="col-xl-12">
                                            <label for="signup-firstname" class="form-label text-default">Repetir Contraseña</label>
                                            <input type="password" class="form-control form-control-lg"  name="password_confirmation" placeholder="Reingrese la Contraseña" required>
                                        </div>


                                        <div class="col-xl-12 d-grid mt-2">
                                            <button type="submit" class="btn btn-lg btn-primary mt-4">Registrarse</button>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <p class="fs-12 text-muted mt-3">Ya estás registrado? <a href="{{ route('login') }}" class="text-primary" >Iniciar sesión</a></p>
                                    </div>
                                    <div class="text-center my-3 authentication-barrier">
                                        <span>O</span>
                                    </div>
                                    <div class="btn-list text-center">
                                        <button aria-label="button" type="button" class="btn btn-icon btn-light btn-wave waves-effect waves-light">
                                            <i class="ri-facebook-line fw-bold "></i>
                                        </button>
                                        <button aria-label="button" type="button" class="btn btn-icon btn-light btn-wave waves-effect waves-light">
                                            <i class="ri-google-line fw-bold "></i>
                                        </button>
                                        <button aria-label="button" type="button" class="btn btn-icon btn-light btn-wave waves-effect waves-light">
                                            <i class="ri-twitter-line fw-bold "></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </form>
            <!-- End::error-page -->
        </div>

        @section('scripts')
            {!!Html::script('theme-admin/velvet/assets/plugins/jquery/jquery.min.js')!!}
            <script src="{{asset('theme-admin/velvet/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

            <script src="{{asset('theme-admin/velvet/assets/js/show-password.js')}}"></script>
        @show


    </body>
</html>
