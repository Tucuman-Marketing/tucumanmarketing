  <!--buscador-->

<div class="row justify-content-center mb-3">
    <button class="btn btn-success" type="button" onclick="toggleSearchForm()">
        <i class="fa fa-search"></i> Buscar
    </button>
</div>


<div id="searchForm" style="display: none;">
    <div class="row">

        <!-- Columna Montos -->
        <div class="col-xs-12 col-sm-12 col-12 col-md-3">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-search"></i>
                </span>
            </div>
            <input type="number" class="form-control" placeholder="Buscar por monto ($)" id="search_amount" onkeyup="Filtrar();" >
            </div>
        </div>

        <!-- Columna Montos -->
        <div class="col-xs-12 col-sm-12 col-12 col-md-3">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-search"></i>
                </span>
            </div>
            <input type="number" class="form-control" placeholder="Buscar por monto (USD)" id="search_amount_usd" onkeyup="Filtrar();" >
            </div>
        </div>

        <!-- Columna Descripcion -->
        <div class="col-xs-12 col-sm-12 col-12 col-md-3">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-search"></i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Buscar por Descripcion" id="search_description" onkeyup="Filtrar();" >
            </div>
        </div>

        {{-- columna fecha --}}
        <div class="col-xs-12 col-sm-12 col-12 col-md-3">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-search"></i>
                </span>
            </div>
            <input type="text" name="buscar_fecha" class="form-control datetimepicker" placeholder="DD-MM-YYYY" id="search_date" onchange="Filtrar('search_date', this.value);">
            </div>
        </div>


        {{-- buscar por remito --}}
        <div class="col-xs-12 col-sm-12 col-12 col-md-4">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-search"></i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Buscar N° de Remito" id="search_remittance_number" onkeyup="Filtrar();" >
            </div>
        </div>

         {{-- buscar por factura --}}
         <div class="col-xs-12 col-sm-12 col-12 col-md-4">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-search"></i>
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Buscar N° de Factura" id="search_invoice_number" onkeyup="Filtrar();" >
            </div>
        </div>


        {{-- columna rango de fechas --}}
        <div class="col-xs-12 col-sm-12 col-12 col-md-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
                <input type="text" name="fecha_rango" class="form-control" placeholder="DD-MM-YYYY - DD-MM-YYYY" id="search_date_range" onchange="Filtrar();">
            </div>
        </div>


        <!-- Columna Centro de Gastos -->
        <div class="col-xs-12 col-sm-12 col-12 col-md-4">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-search"></i>
                </span>
            </div>
            <select class="form-control select2" onchange="Filtrar();" id="search_category" >
                    <option value="">Seleccione un Centro de Gasto</option>
                    @foreach ($cashFlowCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

            <!-- Columna Empleados -->
            <div class="col-xs-12 col-sm-12 col-12 col-md-4">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
                    <select class="form-control select2" onchange="Filtrar();" id="search_employee">
                        <option value="">Seleccione un Empleado</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Columna Sector -->
            <div class="col-xs-12 col-sm-12 col-12 col-md-4">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
                    <select class="form-control select2" onchange="Filtrar();" id="search_sector">
                        <option value="">Seleccione un Sector</option>
                        @foreach ($cashFlowSectors as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <!-- Columna Item -->
            <div class="col-xs-12 col-sm-12 col-12 col-md-4">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
                    <select class="form-control select2" onchange="Filtrar();" id="search_unit">
                        <option value="">Seleccione un Item</option>
                        @foreach ($cashFlowUnits as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>





            <div class="form-group col-xs-12 col-sm-12 col-md-2 d-flex justify-content-center">
                <span data-placement="top" data-toggle="tooltip" title="BUSCAR">
                    <button type="submit" class="btn btn-success" id="buscar-rangos" onclick="FiltrarRangos();">
                        <i class="fa fa-search"></i>
                    </button>
                </span>

                <span data-placement="top" data-toggle="tooltip" title="LIMPIAR">
                    <button type="submit" class="btn btn-danger" id="limpiar-busqueda" onclick="Filtrarlimpiar();">
                        <i class="fa fa-times-circle"></i>
                    </button>
                </span>
            </div>


    </div>
</div>













