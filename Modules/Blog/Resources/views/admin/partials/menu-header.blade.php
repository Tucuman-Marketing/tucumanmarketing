<div class="text-start">
    <ul class="nav nav-tabs tab-style-6" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a href="{{ route('admin.blogs.posts.index') }}" class="nav-link d-inline-flex {{ request()->routeIs('admin.blogs.posts.index') ? 'active' : '' }}">
                <i class="ri-gift-line me-1 align-middle"></i>Publicaciones
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{ route('admin.blogs.status.index') }}" class="nav-link d-inline-flex {{ request()->routeIs('admin.blogs.status.index') ? 'active' : '' }}">
                <i class="ri-bill-line me-1 align-middle"></i>Estatus
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{ route('admin.blogs.category.index') }}" class="nav-link d-inline-flex {{ request()->routeIs('admin.blogs.category.index') ? 'active' : '' }}">
                <i class="ri-money-dollar-box-line me-1 align-middle"></i>Categorías
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{ route('admin.blogs.tags.index') }}" class="nav-link d-inline-flex {{ request()->routeIs('admin.blogs.tags.index') ? 'active' : '' }}">
                <i class="ri-exchange-box-line me-1 align-middle"></i>Tags
            </a>
        </li>
    </ul>
</div>
