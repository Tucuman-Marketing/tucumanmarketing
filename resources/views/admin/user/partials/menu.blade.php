<li class="nav-item"> <a class="nav-link {{ (\Request::route()->uri() == 'usuario') ? 'active' : '' }}"  href="{{ url('usuario') }}" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"><img src="{{ url('admin/adminpro/images/icon/user.svg') }}" alt="" width="50" height="50" class="responsive"> Usuarios</span></a> </li>
          
  @if(Auth::user()->isRole('administrador'))
    <li class="nav-item"> <a class="nav-link {{ (\Request::route()->uri() == 'usuario-roles') ? 'active' : '' }}"  href="{{ url('usuario-roles') }}" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down"><img src="{{ url('admin/adminpro/images/icon/roles.svg') }}" alt="" width="50" height="50" class="responsive"> Roles</span></a> </li>
   @endif


  @if(Auth::user()->isRole('administrador'))
    <li class="nav-item"> <a class="nav-link {{ (\Request::route()->uri() == 'usuario-permisos') ? 'active' : '' }}"  href="{{ url('usuario-permisos') }}" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down"><img src="{{ url('admin/adminpro/images/icon/permisos.svg') }}" alt="" width="50" height="50" class="responsive"> Permisos</span></a> </li>
   @endif


