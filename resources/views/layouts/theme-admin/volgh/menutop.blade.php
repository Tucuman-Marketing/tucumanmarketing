<!-- PAGE-HEADER -->
        @yield('title-module')
        <!-- PAGE-HEADER END -->
            <!-- /SwitchMode -->

            {{-- Switch Mode --}}

            <div class="d-flex ml-auto header-right-icons header-search-icon">
                <div class="d-sm-flex">
                    <label class="nav-link icon">
                        <div class="switch-toggle d-flex">
                            <i class="fa-regular fa-moon"></i>
                            <span class="mr-auto"></span>
                                <div class="onoffswitch2">
                                    <input type="checkbox" id="myonoffswitch16" class="onoffswitch2-checkbox" checked>
                                    <label for="myonoffswitch16" class="onoffswitch2-label"></label>

                            </div>
                        </div>
                    </label>
                </div>



                <!-- FULL-SCREEN -->

                <div class="dropdown d-md-flex">
                    <a class="nav-link icon full-screen-link nav-link-bg">
                        <i class="fe fe-maximize fullscreen-button"></i>
                    </a>
                </div>



                <div class="dropdown profile-1">
                    <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                        <span>
                            @if(isset($user))
                                @if($user->media->first() == null)
                                <img src="{{asset('theme-admin/volgh/assets/images/icon/user.svg')}}"  alt="profile-user" class="avatar  profile-user brround cover-image">
                                @else
                                <img src="{{asset($user->media->first()->url)}}"  alt="profile-user" class="avatar  profile-user brround cover-image">
                                @endif
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
            </div>








