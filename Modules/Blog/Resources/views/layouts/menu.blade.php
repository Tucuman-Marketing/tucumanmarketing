@permission('blog-access')
<li class="slide">
    <a href="{{ route('admin.blogs.posts.index') }}" class="side-menu__item">
        <span class=" side-menu__icon">
            <i class='bx bx-layout' ></i>
        </span>
        <span class="side-menu__label">Blogs</span>
    </a>
</li>
@endpermission
