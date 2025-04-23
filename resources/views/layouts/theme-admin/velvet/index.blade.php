<!DOCTYPE html>
<html
lang="en"
dir="ltr"
data-nav-layout="vertical"
data-theme-mode="dark"
data-header-styles="gradient"
data-menu-styles="dark"
style=""
data-page-style="regular"
data-width="fullwidth"
data-menu-position="scrollable"
data-header-position="scrollable"
loader="disable">

@section('htmlheader')
	@include('layouts.theme-admin.velvet.htmlheader')
@show



<body>


        <!-- SWITCHER -->
        @include('layouts.theme-admin.velvet.theme-switcher')
        <!-- END SWITCHER -->

        <!-- LOADER -->
		<div id="loader">
            <img src="{{asset('theme-admin/velvet/assets/images/loading.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- END LOADER -->


        <!-- PAGE -->
		<div class="page">

                <!-- HEADER -->
                <header class="app-header">


                    <div class="main-header-container container-fluid">
                        <!-- Start::header-content-left -->
                        <div class="header-content-left">

                            <!-- Start::header-element -->
                            <div class="header-element">
                                <div class="horizontal-logo">
                                    <a href="index.html" class="header-logo">
                                        <img src="assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                                        <img src="assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                                        <img src="assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                                        <img src="assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                                    </a>
                                </div>
                            </div>
                            <!-- End::header-element -->

                            <!-- Start::SEARCH -->
                            <div class="header-element">
                                <a aria-label="anchor" href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                                    <span class="open-toggle me-2">
                                        <i class="bx bx-menu header-link-icon"></i>
                                    </span>
                                </a>
                             {{--    <div class="main-header-center  d-none d-lg-block  header-link">
                                    <input type="text" class="form-control form-control-lg" id="typehead" placeholder="Search for results..."
                                        autocomplete="off">
                                    <button type="button"  aria-label="button" class="btn pe-1"><i class="fe fe-search" aria-hidden="true"></i></button>
                                    <div id="headersearch" class="header-search">
                                        <div class="p-3">
                                            <div class="">
                                                <p class="fw-semibold text-muted mb-2 fs-13">Recent Searches</p>
                                                <div class="ps-2">
                                                    <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>People<span></span></a>
                                                    <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Pages<span></span></a>
                                                    <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Articles<span></span></a>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <p class="fw-semibold text-muted mb-2 fs-13">Apps and pages</p>
                                                <ul class="ps-2">
                                                    <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                                        <a href="full-calendar.html"><span><i class="bx bx-calendar me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i>Calendar</span></a>
                                                    </li>
                                                    <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                                        <a href="mail.html"><span><i class="bx bx-envelope me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i>Mail</span></a>
                                                    </li>
                                                    <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                                        <a href="buttons.html"><span><i class="bx bx-dice-1 me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i>Buttons</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="mt-3">
                                            <p class="fw-semibold text-muted mb-2 fs-13">Links</p>
                                            <ul class="ps-2">
                                                    <li class="p-1 align-items-center text-muted mb-1 search-app">
                                                            <a href="javascript:void(0)" class="text-primary"><u>http://spruko/spruko.com</u></a>
                                                    </li>
                                                    <li class="p-1 align-items-center text-muted mb-1 search-app">
                                                            <a href="javascript:void(0)" class="text-primary"><u>http://spruko/spruko.com</u></a>
                                                    </li>
                                                </ul>
                                        </div>
                                        </div>
                                        <div class="py-3 border-top px-0">
                                            <div class="text-center">
                                                <a href="javascript:void(0)" class="text-primary text-decoration-underline fs-15">View all</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                            <!-- End::SEARCH -->

                            <!-- Start::SEARCH-MODAL -->
                            <div class="header-element header-search d-lg-none d-block ">
                                <a aria-label="anchor" href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#searchModal">
                                    <i class="bx bx-search-alt-2 header-link-icon"></i>
                                </a>
                            </div>
                            <!-- End::SEARCH-MODAL -->

                        </div>
                        <!-- End::header-content-left -->
                        <!-- Start::MENU TOP -->
                        <div class="header-content-right">
                           @include('layouts.theme-admin.velvet.menu-top')
                        </div>
                        <!-- End::MENU TOP -->
                    </div>

                </header>
                <!-- END HEADER -->

            <!-- START MENU -->
                @include('layouts.theme-admin.velvet.menu')
            <!-- END  MENU -->

            <!-- MAIN-CONTENT -->

                    <!-- Page Header -->
                    @yield('title-module')
                    <!-- Page Header Close -->

                    <!-- Start::CONTENT -->
                    <div class="main-content app-content">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>
                    <!-- End::CONTENT -->
            <!-- END MAIN-CONTENT -->

            <!-- SEARCH-MODAL -->
            @include('layouts.theme-admin.velvet.modal.search')
            <!-- END SEARCH-MODAL -->

            <!-- RIGHT-SIDEBAR -->
            @include('layouts.theme-admin.velvet.modal.right-sidebar')
            <!-- END RIGHT-SIDEBAR -->

            <!-- FOOTER -->
            @include('layouts.theme-admin.velvet.footer')
            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->



        <!-- SCROLL-TO-TOP -->
        <div class="scrollToTop">
            <span class="arrow"><i class="ri-arrow-up-circle-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>


        {{-- Modales --}}
        @include('layouts.theme-admin.velvet.modal.delete')
        @include('layouts.theme-admin.velvet.modal.massDelete')

		@section('scripts')
            @include('layouts.theme-admin.velvet.scripts')
        @show

</body>
</html>
