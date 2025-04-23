<ul class="nav panel-tabs">
    {{-- <li><a href="#tab1" data-toggle="tab">Tab 1</a></li>
    <li><a href="#tab2" data-toggle="tab">Tab 2</a></li>
    <li><a href="#tab3" data-toggle="tab">Tab 3</a></li>
    <li><a href="#tab4" data-toggle="tab">Tab 4</a></li> --}}

    @if(Route::has('setting.company.index'))
        <li class="nav-item">
            <a class="nav-link {{ (\Request::route()->uri() == 'setting-company') ? 'active' : '' }}" href="{{ route('setting.company.index') }}" role="tab" aria-expanded="false"><img src="{{ asset('theme-admin/volgh/assets/images/iconos/setting-company.svg') }}" alt="" width="50" height="50" class="responsive"> Empresa</a>
        </li>
    @endif

    @if(Route::has('setting.email.index'))
        <li class="nav-item">
            {{-- <a class="nav-link {{ (\Request::route()->uri() == 'setting-email') ? 'active' : '' }}" href="{{ route('setting.email.index') }}" role="tab" aria-expanded="false"><img src="{{ asset('theme-admin/volgh/assets/images/iconos/setting-email.svg') }}" alt="" width="50" height="50" class="responsive"> Email</a> --}}
        </li>
    @endif

    @if(Route::has('setting.paymet.index'))
        <li class="nav-item">
            {{-- <a class="nav-link {{ (\Request::route()->uri() == 'setting-paymet') ? 'active' : '' }}" href="{{ route('setting.paymet.index') }}" role="tab" aria-expanded="false"><img src="{{ asset('theme-admin/volgh/assets/images/iconos/setting-paymet.svg') }}" alt="" width="50" height="50" class="responsive"> Paymet</a> --}}
        </li>
    @endif

</ul>

