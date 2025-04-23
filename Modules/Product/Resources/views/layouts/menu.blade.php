


{{-- @permission('product-access')
<li>
    <a class="side-menu__item" href="{{ route('admin.product.index') }}">
    <i class="fas fa-box side-menu__icon ti-panel"></i>
    <span class="side-menu__label">Productos</span></a>
</li>
@endpermission --}}



{{-- @permission('product-access')
<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="#">
        <i class="fas fa-cog side-menu__icon ti-panel"></i>
        <span class="side-menu__label">Configuracion de Productos</span>
        <i class="angle fa fa-angle-right"></i>
    </a>
    <ul class="slide-menu">


        @permission('product-category-access')
        <li><a href="{!! route('admin.cashflow.categories.index') !!}" class="slide-item"> Centro de Gastos</a></li>
        @endpermission

        @permission('product-sector-access')
        <li><a href="{!! route('admin.cashflow.sectors.index') !!}" class="slide-item"> Sectores</a></li>
        @endpermission

        @permission('product-unit-access')
        <li><a href="{!! route('admin.cashflow.units.index') !!}" class="slide-item"> Items</a></li>
        @endpermission

        @permission('product-unit-category-access')
        <li><a href="{!! route('admin.cashflow.units.categories.index') !!}" class="slide-item"> Categoria de Items </a></li>
        @endpermission

        @permission('employee-access')
        <li><a href="{!! route('admin.employee.index') !!}" class="slide-item"> Empleados </a></li>
        @endpermission

    </ul>
</li>

@endpermission --}}
