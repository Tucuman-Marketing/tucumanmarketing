<div class="text-start">
    <ul class="nav nav-tabs tab-style-6" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="{{ route('admin.recruitment.jobs.index') }}" class="nav-link d-inline-flex {{ request()->routeIs('admin.recruitment.jobs.index') ? 'active' : '' }}">
                <i class="ri-gift-line me-1 align-middle"></i>Trabajos
            </a>
        </li>

        <li class="nav-item" role="presentation">
            <a href="{{ route('admin.recruitment.candidatesStatus.index') }}" class="nav-link d-inline-flex {{ request()->routeIs('admin.recruitment.status.index') ? 'active' : '' }}">
                <i class="ri-bill-line me-1 align-middle"></i>Estatus
            </a>
        </li>
    </ul>
</div>
