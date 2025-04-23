<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="dark" data-header-styles="light" data-menu-styles="light" data-toggled="close">
    <head>
        @section('htmlheader')
	        @include('layouts.theme-admin.velvet.htmlheader')
        @show
    </head>

    <body>


        <div class="page error-bg" id="particles-js">
            <!-- Start::error-page -->
            <div class="error-page  ">
                <div class="container">
                    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                            <div class="my-5 d-flex justify-content-center">
                                <a href="index.html">
                                    <img src="assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                                    <img src="assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                                </a>
                            </div>

                        <form class="login100-form validate-form" method="POST" action="{{ route('password.reset.link') }}">
                            @csrf

                            <div class="card custom-card  rectangle2">
                                <div class="card-body p-sm-5 p-3  rectangle3">
                                    <p class="h5 fw-semibold mb-2 text-center">Recuperar Contraseña</p>
                                    <p class="mb-4 text-muted op-7 fw-normal text-center">
                                        @include('alerts.flash')
                                    </p>
                                    <div class="row gy-3">
                                        <div class="col-xl-12">
                                            <label for="reset-password" class="form-label text-default">Ingrese su Email</label>
                                            <div class="input-group">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Ingrese el Email">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 mb-2">
                                            <div class="col-xl-12 d-grid mt-4">
                                                <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End::error-page -->
        </div>


        @section('scripts')
            {!!Html::script('theme-admin/velvet/assets/plugins/jquery/jquery.min.js')!!}
            <script src="{{asset('theme-admin/velvet/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

            <script src="{{asset('theme-admin/velvet/assets/js/show-password.js')}}"></script>
        @show

    </body>
</html>
