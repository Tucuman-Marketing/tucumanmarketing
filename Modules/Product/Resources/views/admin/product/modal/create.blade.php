<div class="modal fade" id="create" role="dialog" aria-labelledby="confirmDelete">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">




                        {{-- Tarjeta para Tipo, Monto y Detalles --}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        {{-- codigo --}}
                                        {{-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="code">Codigo</label>
                                                <input type="text" class="form-control" id="code" name="code" placeholder="" required>
                                            </div>
                                        </div> --}}
                                        {{-- descripcion --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Nombre</label>
                                                <input type="text" class="form-control" id="description" name="description" placeholder="" required>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cost_price_pesos_ex_tax">P/ de costo sin iva</label>
                                                <input type="number" class="form-control" id="cost_price_pesos_ex_tax" name="cost_price_pesos_ex_tax" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="profitability">Rentabilidad</label>
                                                <input type="number" class="form-control" id="profitability" name="profitability" placeholder="" required>
                                            </div>
                                        </div> --}}



                                        {{-- select de brands --}}
                                        {{-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="brand_id">Marca</label>
                                                <select class="form-control" id="brand_id" name="brand_id" required>
                                                    <option value="">Seleccionar Marca</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="supplier_id">Proveedores</label>
                                                <select class="form-control" id="supplier_id" name="supplier_id" required>
                                                    <option value="">Seleccionar Proveedor</option>
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->business_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="category_id">Categoria</label>
                                                <select class="form-control" id="category_id" name="category_id" required>
                                                    <option value="">Seleccionar Categoria</option>
                                                    @foreach($categories as $categorie)
                                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}




                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">STOCK</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="base_unit_stock">Unidad Base</label>
                                                <select class="form-control" id="base_unit_stock" name="base_unit_stock">
                                                    @foreach(Modules\Productos\Entities\Product::SELECT_BASE_UNIT as $key => $value)
                                                        <option value="{{ $key }}" {{ $key == 1 ? 'selected' : '' }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="stock">Cantidad</label>
                                                <input type="number" class="form-control" id="stock" name="stock" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="unit_of_measure_id">Unidad de medida</label>
                                                <select class="form-control" id="unit_of_measure_id" name="unit_of_measure_id" disabled>
                                                    @foreach($unitsOfMeasure as $unit)
                                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="stock_per_base_unit">Cantidad</label>
                                                <input type="number" class="form-control" id="stock_per_base_unit" name="stock_per_base_unit" disabled>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div> --}}


                        {{-- Tarjeta Detalles --}}
                        {{-- <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="short_description">Detalles</label>
                                                <textarea class="form-control" id="short_description" name="short_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Crear</button>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@section('mis-scripts')
@parent


<script>
    var getSubCategoriesUrl = "{{ route('admin.cashflow.categories.getSubCategories', ['cashFlowCategory' => ':id']) }}";
    var getSubSectorsUrl = "{{ route('admin.cashflow.sectors.getSubSectors', ['cashFlowSector' => ':id']) }}";

    var getUnitsSubCategoriesUrl = "{{ route('admin.cashflow.units.categories.getSubCategories', ['cashFlowUnitCategory' => ':id']) }}";
    var getUnitsUrl = "{{ route('admin.cashflow.units.categories.getUnits', ['cashFlowUnitCategory' => ':id']) }}";

    $(document).ready(function() {

    // Lógica para SubCategories
    $('#category').on('change', function() {
        var categoryId = $(this).val();
        $('#subcategory').empty();
        if (categoryId) {
            var url = getSubCategoriesUrl.replace(':id', categoryId);
            // Realizar solicitud AJAX para obtener subcategorías
            $.ajax({
                url: url,
                type: 'GET',
                success: function(subcategories) {
                    // si existen subcategorias , mostramos el select subcategoriesContainer
                    if (subcategories.length > 0) {
                        $('#subcategoriesContainer').show();
                        $('#subcategory').append('<option value="">Seleccione una Subcategoría</option>');
                        $.each(subcategories, function(index, subcategory) {
                            $('#subcategory').append('<option value="' + subcategory.uuid + '">' + subcategory.name + '</option>');
                        });

                    } else {
                        $('#subcategoriesContainer').hide();
                    }
                }
            });
        } else {
            $('#subcategoriesContainer').hide();
        }
    });

    // Lógica para Subsectores
    $('#sector').on('change', function() {
        var sectorId = $(this).val();
        $('#subsector').empty();
        if (sectorId) {
            var url = getSubSectorsUrl.replace(':id', sectorId);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(subsectors) {
                    // si existen subsectores , mostramos el select subsectorsContainer
                    if (subsectors.length > 0) {
                        $('#subsectorsContainer').show();
                        $('#subsector').append('<option value="">Seleccione un Subsector</option>');
                        $.each(subsectors, function(index, subsector) {
                            $('#subsector').append('<option value="' + subsector.uuid + '">' + subsector.name + '</option>');
                        });
                    } else {
                        $('#subsectorsContainer').hide();
                    }
                }
            });


        } else {
            $('#subsectorsContainer').hide();
        }
    });



    });
</script>


<script>
    document.getElementById('base_unit_stock').addEventListener('change', function() {
    var measurementUnitInput = document.getElementById('unit_of_measure_id');
    var quantityInput = document.getElementById('stock_per_base_unit');

    if (this.value != 1) { // Si la opción seleccionada no es "Unidad"
        measurementUnitInput.disabled = false;
        quantityInput.disabled = false;
    } else {
        measurementUnitInput.disabled = true;
        quantityInput.disabled = true;
    }
});
</script>
@stop
