@if(auth()->user()->hasRole('superadmin'))
<li class="slide">
    <a href="{{ route('admin.coreforms.index') }}" class="side-menu__item">
        <span class=" side-menu__icon">
            <i class='bx bx-layout' ></i>
        </span>
        <span class="side-menu__label">Core Form</span>
    </a>
</li>
@endif
