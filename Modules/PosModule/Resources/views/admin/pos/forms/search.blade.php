<!--buscador-->
<div class="row">

    <div class="form-group col-xs-12 col-sm-12 col-md-5"> </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-2">
        <div class="input-group">
            <button class="btn btn-default-light collapsed" type="button" data-toggle="collapse"
                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i
                    class="fas fa-filter"></i> Filtrar</button>
        </div>
    </div>

    <div class="collapse col-md-12" id="collapseExample">
        <div class="row">

            <div class="form-group col-xs-12 col-sm-12 col-md-4">
                <div class="input-group">
                    <input type="text" name="buscar_id" id="search_client" class="form-control"
                        placeholder="Buscar por cliente">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light" type="button" id="button-addon2"
                            onclick="Filtrar();"><span class="input-group-addon"><i
                                    class="fa  fa-search"></i></span></button>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-4">
                <div class="input-group">
                    <input type="text" name="buscar_cliente" id="search_dni" class="form-control"
                        placeholder="Buscar por dni">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light" type="button" id="button-addon2"
                            onclick="Filtrar();"><span class="input-group-addon"><i
                                    class="fa  fa-search"></i></span></button>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3">
                <div class="input-group">
                    <input type="text" name="buscar_dni" id="search_plate" class="form-control"
                        placeholder="Buscar por patente">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light" type="button" id="button-addon2"
                            onclick="Filtrar();"><span class="input-group-addon"><i
                                    class="fa  fa-search"></i></span></button>
                    </div>
                </div>
            </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-1 d-flex justify-content-center">
            <span data-placement="top" data-toggle="tooltip" title="LIMPIAR">
                <button type="submit" class="btn btn-danger" id="limpiar-busqueda" onclick="Filtrarlimpiar();">
                    <i class="fa fa-times-circle"></i>
                </button>
            </span>
        </div>

        </div>
    </div>
</div>
<!--endbuscador-->