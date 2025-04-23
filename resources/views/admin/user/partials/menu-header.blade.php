<div class="text-start">
    <ul class="nav nav-tabs tab-style-6" id="myTab" role="tablist">

        @permission('user-access')
        <li class="nav-item" role="presentation">
            <a href="{{ route('admin.users.index') }}" class="nav-link d-inline-flex {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                <i class="ri-gift-line me-1 align-middle"></i>Usuarios
            </a>
        </li>
        @endpermission

        @if(auth()->user()->hasRole('superadmin'))
            @permission('rol-access')
            <li class="nav-item" role="presentation">
                <a href="{{ route('admin.roles.index') }}" class="nav-link d-inline-flex {{ request()->routeIs('admin.roles.index') ? 'active' : '' }}">
                    <i class="ri-bill-line me-1 align-middle"></i>Roles
                </a>
            </li>
            @endpermission
            @permission('permission-access')
            <li class="nav-item" role="presentation">
                <a href="{{ route('admin.permissions.index') }}" class="nav-link d-inline-flex {{ request()->routeIs('admin.permissions.index') ? 'active' : '' }}">
                    <i class="ri-money-dollar-box-line me-1 align-middle"></i>Permisos
                </a>
            </li>
            @endpermission
        @endif
    </ul>
</div>
