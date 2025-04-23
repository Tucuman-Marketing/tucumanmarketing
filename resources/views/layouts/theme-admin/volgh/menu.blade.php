<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1 mx-auto" href="index.html">
                @if(isset($setting->logo_imagen))
                    <img src="{{asset($setting->logo_imagen)}}"  class="desktop-logo "  width="40%" height="auto" alt="logo">
                @else
                <img src="{{asset('theme-front/globaltalentsphere/img/global_logo3.png')}}" alt="Auto & Detailing template" class="img-fluid" id="logoImage" style="width: 40%">
                @endif
            </a>
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
        </div>

<ul class="side-menu">

<br>
<br>
<br>


    @if(auth()->user()->hasRole('superadmin'))

        @permission('permission-view')
        <li><h3 class="mt-9">Panel de Administrador</h3></li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-user side-menu__icon ti-panel"></i><span class="side-menu__label">Usuarios</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{ route('admin.users.index') }}" class="slide-item"> Usuarios</a></li>
                @permission('rol-view')
                <li><a href="{!! URL::to('user-roles/') !!}" class="slide-item"> Roles</a></li>
                @endpermission
                @permission('permission-view')
                <li><a href="{!! URL::to('user-permissions/') !!}" class="slide-item"> Permisos</a></li>
                @endpermission
            </ul>
        </li>
        @endpermission
    @else
        @permission('user-view')
        <li><h3 class="mt-9">Panel de Administrador</h3></li>
        <li>
            <a class="side-menu__item" href="{{ route('admin.users.index') }}">
                <i class="fas fa-user side-menu__icon ti-panel"></i>
            <span class="side-menu__label">Usuarios</span></a>
        </li>
        @endpermission
    @endif


    @permission('setting-company-view')
    <li>
        <a class="side-menu__item" href="{{ route('setting.company.index') }}"><i class="fas fa-cog side-menu__icon ti-panel"></i><span class="side-menu__label">Configuracion</span></a>
    </li>
    @endpermission

  {{-- MENU CLIENTE --}}
            @unless(auth()->user()->hasRole('admin')) {{-- Si el usuario no tiene el rol 'admin' --}}
            {{-- <h3 class="mt-8">Panel de Usuario</h3>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('client.washeds.index') }}">
                <i class="fas fa-soap side-menu__icon ti-panel"></i>
                <span class="side-menu__label">Mis Lavados</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('client.vehicles.index') }}">
                <i class="fas fa-truck-pickup side-menu__icon ti-panel"></i>
                <span class="side-menu__label">Mis Vehiculos</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('client.subscriptions.index') }}">
                <i class="fas fa-credit-card side-menu__icon ti-panel"></i>
                <span class="side-menu__label">Mis Suscripciones</span></a>
            </li> --}}
            @endunless

</ul>
</aside>



<!-- Mobile Header -->
<div class="mobile-header">
    <div class="container-fluid">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
            <a class="header-brand" href="index.html">
                @if(isset($setting->logo_imagen))
                    <img src="{{asset($setting->logo_imagen)}}" class="header-brand-img desktop-logo" style="width: 45px !important; height: auto !important;" alt="logo">
                @else
                    <img src="{{asset('theme-admin/volgh/assets/images/icon/pied-piper-grey.svg')}}" class="header-brand-img desktop-logo mobile-light" style="width: 45px !important; height: auto !important;" alt="logo">
                @endif
            </a>
            <div class="d-flex order-lg-2 ml-auto header-right-icons">
                {{-- <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
                </button> --}}
                <div class="dropdown profile-1">
                    <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                        <span>
                            @if (Auth::check() && Auth::user()->image)
                                <img src="{{asset(Auth::user()->image)}}" alt="profile-user" class="avatar profile-user brround cover-image" style="width: 45px !important; height: 45px !important; border-radius: 50% !important; object-fit: cover !important;">
                            @else
                                <img src="{{asset('theme-admin/volgh/assets/images/icon/user.svg')}}" alt="profile-user" class="avatar profile-user brround cover-image" style="width: 45px !important; height: 45px !important; border-radius: 50% !important; object-fit: cover !important;">
                            @endif
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="drop-heading">
                            <div class="text-center">
                                @if (Auth::check())
                                    <h5 class="text-dark mb-0">{{Auth::user()->name }} {{Auth::user()->lastname }}</h5>
                                    @foreach (Auth::user()->roles as $rol)
                                        <small class="text-muted">{{ $rol->name }}</small>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item" href="{{ route('admin.user.setting.index') }}">
                            <i class="dropdown-icon mdi mdi-account-outline"></i> Perfil
                        </a>

                        @permission('setting-company-view')
                        <a class="dropdown-item" href="{{ route('setting.company.index') }}">
                            <i class="dropdown-icon  mdi mdi-settings"></i> Configuración
                        </a>
                        @endpermission
                        <div class="dropdown-divider mt-0"></div>

                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="dropdown-icon mdi  mdi-logout-variant"></i> Salir
                            </button>
                        </form>
                    </div>
                </div>
                {{-- <div class="dropdown d-md-flex header-settings">
                    <a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="fe fe-align-right"></i>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</div>


