{{-- Extiende la plantilla base --}}
@extends('layouts.theme-admin.volgh.index')

@section('title-module')
    <div>
        <h1 class="page-title">Productos</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{!! URL::to('/cashflow') !!}">Productos</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @include('flash::message')
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Editar Producto</h4>
                </div>
                <div class="card-body">
                    {{-- Asegúrate de usar la instancia correcta de cashFlow y el método de actualización adecuado --}}
                    <form action="{{ route('admin.cashflow.update', $cashFlow->uuid) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Asegúrate de rellenar el formulario con los datos del cashFlow --}}
                        {{-- Ejemplo: --}}
                        <div class="row">
                            {{-- Tipo --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <select class="form-control select2" id="type" name="type">
                                        <option value="">Seleccione un Tipo</option>
                                        <option value="income" {{ $cashFlow->type == 'income' ? 'selected' : '' }}>Ingreso</option>
                                        <option value="expense" {{ $cashFlow->type == 'expense' ? 'selected' : '' }}>Egreso</option>
                                    </select>
                                </div>
                            </div>
                            {{-- Monto --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="amount">Monto</label>
                                    <input type="text" class="form-control" id="amount" name="amount" value="{{ $cashFlow->amount }}" required>
                                </div>
                            </div>
                            {{-- Monto USD --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="amount_usd">Monto(USD)</label>
                                    <input type="text" class="form-control" id="amount_usd" name="amount_usd"  value="{{ $cashFlow->amount_usd }}" required>
                                </div>
                            </div>
                            {{-- Fecha --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date">Fecha</label>
                                    <input type="text" class="form-control datetimepicker" id="date" name="date" value="{{ $cashFlow->date }}" required>
                                </div>
                            </div>
                            {{-- N° Remito --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="remittance">N° de Remito / N° de Orden de Trabajo</label>
                                    <input type="text" class="form-control" id="remittance_number" name="remittance_number" value="{{ $cashFlow->remittance_number }}" required>
                                </div>
                            </div>
                            {{-- N° Factura --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="remito">N° Factura</label>
                                    <input type="text" class="form-control" id="invoice_number" name="invoice_number" value="{{ $cashFlow->invoice_number }}" required>
                                </div>
                            </div>



                            {{-- Categorías --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Categoría</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-align-justify"></i> {{-- Ícono de FontAwesome --}}
                                            </span>
                                        </div>


                                        <select class="form-control select2" id="category" name="category_id" required>
                                            <option value="">Seleccione una Categoría</option>
                                            {{-- Asegúrate de seleccionar la categoría actual --}}
                                            @foreach ($cashFlowCategories as $category)
                                                <option value="{{ $category->uuid }}" {{ $category->id == $cashFlow->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Subcategorías --}}
                            <div class="col-md-6">
                                <div class="form-group" id="subcategoriesContainer" style="display: none;">
                                    <label for="subcategory">Subcategoría</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-align-justify"></i> {{-- Ícono de FontAwesome --}}
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="subcategory" name="subcategory_id">
                                            {{-- Debes llenar las opciones de subcategoría con las subcategorías actuales correspondientes --}}
                                            {{-- Este proceso puede requerir AJAX si las subcategorías dependen de la categoría seleccionada --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Sectores --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sector">Sector</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-align-justify"></i> {{-- Ícono de FontAwesome --}}
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="sector" name="sector_id" required>
                                            <option value="">Seleccione un Sector</option>
                                            {{-- Asegúrate de seleccionar el sector actual --}}
                                            @foreach ($cashFlowSectors as $sector)
                                                <option value="{{ $sector->uuid }}" {{ $sector->id == $cashFlow->sector_id ? 'selected' : '' }}>
                                                    {{ $sector->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Subsectores --}}
                            <div class="col-md-6">
                                <div class="form-group" id="subsectorsContainer" style="display: none;">
                                    <label for="subsector">Subsector</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-align-justify"></i> {{-- Ícono de FontAwesome --}}
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="subsector" name="subsector_id">
                                            {{-- Similar a las subcategorías, deberás cargar las opciones según el sector seleccionado --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Categorías de Unidad --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unitCategory">Categoría</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-align-justify"></i> {{-- Ícono de FontAwesome --}}
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="unitCategory" name="unit_category_id" required>
                                            <option value="">Seleccione una Opcion</option>
                                            {{-- Asegúrate de seleccionar la categoría de unidad actual --}}
                                            @foreach ($cashFlowUnitCategories as $unitCategory)
                                                <option value="{{ $unitCategory->uuid }}" {{ $unitCategory->id == $cashFlow->unit_category_id ? 'selected' : '' }}>
                                                    {{ $unitCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Subcategorías de Unidad --}}
                            <div class="col-md-6">
                                <div class="form-group" id="unitsSubcategoriesContainer" style="display: none;">
                                    <label for="UnitsSubcategory">Subcategoría</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                        </div>
                                        <select class="form-control select2" id="UnitsSubcategory" name="units_subcategory_id">
                                            {{-- Las opciones se llenarán dinámicamente con JavaScript --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- item --}}
                            <div class="col-md-12">
                                <div class="form-group" id="unitsContainer" style="display: none;">
                                    <label for="unit">Item</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-align-justify"></i> {{-- Ícono de FontAwesome --}}
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="unit" name="unit_id">
                                            {{-- Las opciones se llenarán dinámicamente con JavaScript --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Select de Operarios --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="employee">Operario</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i> {{-- Ícono de FontAwesome --}}
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="employee" name="employee_id">
                                            <option value="">Seleccione una opcion</option>
                                            {{-- Recorre la lista de empleados y muestra cada opción --}}
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->uuid }}" {{ $employee->id == $cashFlow->employee_id ? 'selected' : '' }}>
                                                    {{ $employee->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Select de Ayudante uno --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="employee">Ayudante uno</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i> {{-- Ícono de FontAwesome --}}
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="employee_sec1" name="employee_sec1_id">
                                            <option value="">Seleccione una opcion</option>
                                            {{-- Recorre la lista de empleados y muestra cada opción --}}
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->uuid }}" {{ $employee->id == $cashFlow->employee_sec1_id ? 'selected' : '' }}>
                                                    {{ $employee->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Select de Ayudante dos --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="employee">Ayudante dos</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i> {{-- Ícono de FontAwesome --}}
                                            </span>
                                        </div>
                                        <select class="form-control select2" id="employee_sec2" name="employee_sec2_id">
                                            <option value="">Seleccione una opcion</option>
                                            {{-- Recorre la lista de empleados y muestra cada opción --}}
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->uuid }}" {{ $employee->id == $cashFlow->employee_sec2_id ? 'selected' : '' }}>
                                                    {{ $employee->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- detalle --}}
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="details">Detalles</label>
                                                    <textarea class="form-control" id="details" name="details">{{ $cashFlow->detail }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('admin.cashflow.index') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('other-css')
    {{-- Tus estilos CSS específicos para esta vista --}}
@endsection



@section('mis-scripts')
@parent


{{-- include datetimepicker --}}
@include('cashflow::admin.cashflow.js.datepicker')
{{-- include inputmask --}}
@include('cashflow::admin.cashflow.js.inputmask')


    <script>
        $(document).ready(function() {
            // Inicializar Select2 para todos los select
            $('.select2').select2();

            // Funciones para cargar los datos
            function loadSubcategories(categoryId, selectedSubcategoryId = null) {

                var url = "{{ route('admin.cashflow.categories.getSubCategories', ['cashFlowCategory' => ':id']) }}".replace(':id', categoryId);
                $('#subcategory').empty();

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(subcategories) {

                        if (subcategories.length > 0) {
                            $('#subcategoriesContainer').show();
                            var subcategorySelect = $('#subcategory').empty();
                            subcategorySelect.append('<option value="">Seleccione una Subcategoría</option>');
                            subcategories.forEach(function(subcategory) {
                                var isSelected = subcategory.id == selectedSubcategoryId;
                                subcategorySelect.append(new Option(subcategory.name, subcategory.uuid, false, isSelected));
                            });
                            //cargamos el select2
                            subcategorySelect.select2();

                            // Asegurarte de que Select2 se actualice después de modificar las opciones
                            subcategorySelect.trigger('change');
                        } else {
                            $('#subcategoriesContainer').hide();
                        }
                    }
                });
            }

            function loadSubsectors(sectorId, selectedSubsectorId = null) {
                var url = "{{ route('admin.cashflow.sectors.getSubSectors', ['cashFlowSector' => ':id']) }}".replace(':id', sectorId);
                $('#subsector').empty();
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(subsectors) {
                        if (subsectors.length > 0) {
                            $('#subsectorsContainer').show();
                            var subsectorSelect = $('#subsector').empty();
                            subsectorSelect.append('<option value="">Seleccione un Subsector</option>');
                            subsectors.forEach(function(subsector) {
                                var isSelected = subsector.id == selectedSubsectorId;
                                subsectorSelect.append(new Option(subsector.name, subsector.uuid, false, isSelected));
                            });
                            //cargamos el select2
                            subsectorSelect.select2();
                        } else {
                            $('#subsectorsContainer').hide();
                        }
                    }
                });
            }

            function loadUnitSubcategories(unitCategoryId, selectedUnitSubcategoryId = null) {
                var url = "{{ route('admin.cashflow.units.categories.getSubCategories', ['cashFlowUnitCategory' => ':id']) }}".replace(':id', unitCategoryId);
                $('#UnitsSubcategory').empty();
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(unitSubcategories) {
                        if (unitSubcategories.length > 0) {
                            $('#unitsSubcategoriesContainer').show();
                            var unitSubcategorySelect = $('#UnitsSubcategory').empty();
                            unitSubcategorySelect.append('<option value="">Seleccione una Subcategoría de Unidad</option>');
                            unitSubcategories.forEach(function(unitSubcategory) {
                                var isSelected = unitSubcategory.id == selectedUnitSubcategoryId;
                                unitSubcategorySelect.append(new Option(unitSubcategory.name, unitSubcategory.uuid, false, isSelected));
                            });
                            unitSubcategorySelect.select2();
                        } else {
                            $('#unitsSubcategoriesContainer').hide();
                        }
                    }
                });
            }

            function loadUnits(unitCategoryId, selectedUnitId = null) {
                var url = "{{ route('admin.cashflow.units.categories.getUnits', ['cashFlowUnitCategory' => ':id']) }}".replace(':id', unitCategoryId);
                $('#unit').empty();
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(units) {
                        if (units.length > 0) {
                            $('#unitsContainer').show();
                            var unitSelect = $('#unit').empty();
                            unitSelect.append('<option value="">Seleccione una Unidad</option>');
                            units.forEach(function(unit) {
                                var isSelected = unit.id == selectedUnitId;
                                unitSelect.append(new Option(unit.name, unit.uuid, false, isSelected));
                            });
                            unitSelect.select2();
                        } else {
                            $('#unitsContainer').hide();
                        }
                    }
                });
            }

            // Cargar subcategorías si hay una categoría seleccionada
            var selectedCategoryId = $('#category').val();
            if(selectedCategoryId) {
                loadSubcategories(selectedCategoryId, '{{ $cashFlow->subcategory_id ?? null }}');
            }

            // Cargar subsectores si hay un sector seleccionado
            var selectedSectorId = $('#sector').val();
            if(selectedSectorId) {
                loadSubsectors(selectedSectorId, '{{ $cashFlow->subsector_id ?? null }}');
            }

            // Cargar subcategorías y unidades de la categoría de unidad seleccionada
            var selectedUnitCategoryId = $('#unitCategory').val();
            if(selectedUnitCategoryId) {
                loadUnitSubcategories(selectedUnitCategoryId, '{{ $cashFlow->unit_subcategory_id ?? null }}');
                loadUnits(selectedUnitCategoryId, '{{ $cashFlow->unit_id ?? null }}');
            }

            // Cargar unidades si hay una categoría de unidad seleccionada
            // Similar a los ejemplos anteriores...

            // Evento change para el select de categorías
            $('#category').on('change', function() {
                var categoryId = $(this).val();
                loadSubcategories(categoryId);
            });

            // Evento change para el select de sectores
            $('#sector').on('change', function() {
                var sectorId = $(this).val();
                loadSubsectors(sectorId);
            });

            // Evento change para el select de categorías de unidad
            $('#unitCategory').on('change', function() {
                var unitCategoryId = $(this).val();
                loadUnitSubcategories(unitCategoryId);
                loadUnits(unitCategoryId);
            });

        });
    </script>
@endsection
