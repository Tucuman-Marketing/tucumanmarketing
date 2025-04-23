@permission('recruitment-jobs-access')
<li class="slide">
    <a href="{{ route('admin.recruitment.jobs.index') }}" class="side-menu__item">
        <span class="side-menu__icon">
            <i class='fas fa-briefcase'></i>
        </span>
        <span class="side-menu__label">Trabajos</span>
    </a>
</li>
@endpermission


@permission('recruitment-candidates-access')
<li class="slide">
    <a href="{{ route('admin.recruitment.candidates.index') }}" class="side-menu__item">
        <span class="side-menu__icon">
            <i class='fas fa-briefcase'></i>
        </span>
        <span class="side-menu__label">Candidatos</span>
    </a>
</li>
@endpermission
