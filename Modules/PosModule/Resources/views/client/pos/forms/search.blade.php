<!--buscador-->
<div class="row col-12 justify-content-center">
    {{-- columna rango de fechas --}}
    <div class="col-xs-12 col-sm-12 col-12 col-md-4 d-flex justify-content-center flex-column align-items-center">
        <h5>Filtrar por rango de fechas</h5>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-calendar color-white"></i>
                </span>
            </div>
            <input type="text" name="fecha_rango" class="form-control" placeholder="DD-MM-YYYY a DD-MM-YYYY" id="search_date_range" onchange="Filtrar();" autocomplete="off">
        </div>
    </div>
</div>
<!--endbuscador-->
