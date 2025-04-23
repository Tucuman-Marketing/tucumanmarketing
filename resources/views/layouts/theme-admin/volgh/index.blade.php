<!DOCTYPE html>
<html lang="en" dir="ltr">



@section('htmlheader')
	@include('layouts.theme-admin.volgh.htmlheader')
@show



    <body class="app sidebar-mini">

		<!-- Start Switcher -->
        @include('layouts.theme-admin.volgh.switcher')
		<!-- End Switcher -->

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">

            <img src="{{asset('theme-admin/volgh/assets/images/loading.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                 <!--APP-SIDEBAR / MENU-->
                 @include('layouts.theme-admin.volgh.menu')
                <!-- APP-SIDEBAR / MENU-->


                <!--APP-SIDEBAR TOP/ MENU TOP MOBILE-->
                @include('layouts.theme-admin.volgh.mobile-menutop')
                <!-- APP-SIDEBAR TOP/ MENU TOP MOBILE-->



                <div class="app-content">
                    <div class="side-app">
                        <div class="page-header">

                                <!--APP-SIDEBAR TOP/ MENU TOP-->
                                    @include('layouts.theme-admin.volgh.menutop')
                                    <!-- APP-SIDEBAR TOP/ MENU TOP-->
                        </div>

                        <!-- CONTENIDO -->
                        @yield('content')

                    </div>
                </div>
                <!-- CONTAINER END -->
            </div>




            <!-- menu-notificaciones -->
            {{-- @include('layouts.theme-admin.volgh.menu-notificaciones') --}}
            <!-- menu-notificaciones CLOSED -->



            <!-- FOOTER -->
            @include('layouts.theme-admin.volgh.footer')
            <!-- FOOTER END -->
        </div>

        <!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>



		@section('scripts')
            @include('layouts.theme-admin.volgh.scripts')
        @show

    </body>
</html>
