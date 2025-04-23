{{-- if(auth()->user()->hasRole('superadmin'))
endif

permission('permission-view')
endpermission --}}


<aside class="app-sidebar" id="sidebar">
    <div class="main-sidebar-header d-flex justify-content-center">
        <a href="{{ route('public.index')}}" class="header-logo d-flex justify-content-center">
            <img src="{{asset('theme-front/globaltalentsphere/img/icons/global_logo2.png')}}" class="img-fluid" id="logoImage" style="width: 40%;">
        </a>
    </div>

    <div class="main-sidebar" id="sidebar-scroll">
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>
            <ul class="main-menu">


                <li class="slide__category"><span class="category-name">Panel Admin</span></li>


                {{-- Usuarios --}}
                @if(auth()->user()->hasRole('superadmin'))
                    <li class="slide has-sub open">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <span class=" side-menu__icon">
                                <i class="bx bx-table"></i>
                            </span>
                            <span class="side-menu__label">Usuarios</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1" data-popper-placement="bottom" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate3d(12.3671px, 973.707px, 0px); display: block; box-sizing: border-box;">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)"></a>
                            </li>
                            @permission('user-access')
                            <li class="slide">
                                <a href="{{ route('admin.users.index') }}" class="side-menu__item">Usuarios</a>
                            </li>
                            @endpermission
                            @permission('rol-access')
                            <li class="slide">
                                <a href="{{ route('admin.roles.index') }}" class="side-menu__item">Roles</a>
                            </li>
                            @endpermission
                            @permission('permission-access')
                            <li class="slide">
                                <a href="{{ route('admin.permissions.index') }}" class="side-menu__item">Permisos</a>
                            </li>
                            @endpermission
                        </ul>
                    </li>
                @else
                    @permission('user-access')
                    <li class="slide has-sub open">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <span class=" side-menu__icon">
                                <i class="bx bx-table"></i>
                            </span>
                            <span class="side-menu__label">Panel de Usuario</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1" data-popper-placement="bottom" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate3d(12.3671px, 973.707px, 0px); display: block; box-sizing: border-box;">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)"></a>
                            </li>
                            @permission('user-access')
                            <li class="slide">
                                <a href="{{ route('admin.users.index') }}" class="side-menu__item">Usuarios</a>
                            </li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                @endif

                {{-- CoreForm --}}
                @include('coreform::layouts.menu')

                {{-- Blog --}}
                @include('blog::layouts.menu')

                {{-- recruitment --}}
                @include('recruitment::layouts.menu')

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
    </div>
</aside>
