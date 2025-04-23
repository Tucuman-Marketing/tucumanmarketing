  <!--buscador-->

<div class="row">

  <div class="form-group col-xs-12 col-sm-12 col-md-5"> </div>
  <div class="form-group col-xs-12 col-sm-12 col-md-2">
          <div class="input-group">
            <button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> <i class="fa  fa-search"></i> Buscar</button>
          </div>
      </div>
  <div class="form-group col-xs-12 col-sm-12 col-md-5"> </div>




<div class="collapse" id="collapseExample">
<div class="row">
      

<div class="form-group col-xs-12 col-sm-12 col-md-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa  fa-search"></i></span>
              <input type="text" name="buscar_id" id="buscar_id" class="form-control" placeholder="Buscar por ID" onkeyup="Filtrar();"  >
          </div>
      </div>

<div class="form-group col-xs-12 col-sm-12 col-md-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa  fa-search"></i></span>
              <input type="text" name="buscar_cliente" id="buscar_cliente" class="form-control" placeholder="Buscar por Cliente" onkeyup="Filtrar();"  >
          </div>
      </div>

    <div class="form-group col-xs-12 col-sm-12 col-md-3">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa  fa-search"></i></span>
          <input type="text" name="buscar_dni" id="buscar_dni" class="form-control" placeholder="Buscar por dni" onkeyup="Filtrar();"  >
      </div>
  </div>


  <div class="form-group col-xs-12 col-sm-12 col-md-3">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa  fa-search"></i></span>
        <input type="text" name="buscar_glm" id="buscar_glm" class="form-control" placeholder="Buscar por glm N°" onkeyup="Filtrar();"  >
    </div>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-3">
  <div class="input-group">
    <span class="input-group-addon"><i class="fa  fa-search"></i></span>
      <input type="text" name="buscar_poliza" id="buscar_poliza" class="form-control" placeholder="Buscar por poliza N°" onkeyup="Filtrar();"  >
  </div>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-3">
  <div class="input-group">
    <span class="input-group-addon"><i class="fa  fa-calendar"></i></span>
      <input type="text" name="buscar_fecha" id="buscar_fecha" class="form-control datetimepicker" placeholder="MM/DD/YYYY" onchange="Filtrar();"  >
  </div>
</div>



{{-- 
<div class="form-group col-xs-12 col-sm-12 col-md-3">
            <div class="input-group input-icon right ">
                <span class="input-group-addon"><i class="fab fa-paypal font-blue"> </i></span>
                <select name="buscar_pago" id="buscar_pago" class="form-control" onchange="Filtrar()">
                        <option value="">Buscar por tipo de pago</option>
                       <option value="Efectivo">Efectivo</option>
                       <option value="Cheque">Cheque</option>
                       <option value="Tarjeta de Debito">Tarjeta de Debito</option>
                       <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                       <option value="MercadoPago">MercadoPago</option>
                       <option value="Pagos Multiples">Pagos Multiples</option>
                </select>
            </div>
        </div>





<div class="form-group col-xs-12 col-sm-12 col-md-3">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa  fa-search"></i></span>
              <input type="text" name="buscar_monto" id="buscar_monto" class="form-control" placeholder="Buscar por Monto" onkeyup="Filtrar();">
          </div>
      </div>

    
<div class="form-group col-xs-12 col-sm-12 col-md-4">
            <div class="input-group input-icon right ">
                <span class="input-group-addon"><i class="fab fa-paypal font-blue"> </i></span>
                <select name="buscar_status" id="buscar_status" class="form-control" onchange="Filtrar()">
                        <option value="">Buscar por Status</option>
                       <option value="pagado">Pagado</option>
                       <option value="pendiente">Pendiente</option>
                       <option value="cancelado">Cancelado</option>
                </select>
            </div>
        </div>

<div class="form-group col-xs-12 col-sm-12 col-md-4">
            <div class="input-group input-icon right ">
                <span class="input-group-addon"><i class="fab fa-paypal font-blue"> </i></span>
                <select name="buscar_realizada_en" id="buscar_realizada_en" class="form-control" onchange="Filtrar()">
                        <option value="">Buscar por Tienda</option>
                       <option value="local">Local</option>
                       <option value="web">Web</option>
                </select>
            </div>
        </div> --}}



{{-- <div class="form-group col-xs-12 col-sm-12 col-md-4">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa  fa-search"></i></span>
              <input type="text" name="buscar_fecha" id="buscar_fecha" class="form-control datetimepicker" placeholder="Buscar por fecha" onchange="Filtrar();">
          </div>
      </div> --}}




<div class="form-group col-xs-12 col-sm-12 col-md-10">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon3"><i class="fa fa-calendar"></i></span>
              <input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control datetimepicker"  aria-describedby="basic-addon3" placeholder="Fecha de Inicio"><span class="input-group-addon bg-info b-0 text-white">to</span><input type="text" name="fecha_fin" id="fecha_fin" class="form-control datetimepicker"  aria-describedby="basic-addon3" placeholder="Fecha de Fin">
          </div>
      </div>




  <div class="form-group col-xs-12 col-sm-12 col-md-2">
     <span data-placement="top" data-toggle="tooltip" title="BUSCAR">
    <button type="submit" class=" btn btn-success " id="buscar-rangos" onclick="FiltrarRangos();">  <i class="fa  fa-search"></i></button>
     </span>

    <span data-placement="top" data-toggle="tooltip" title="LIMPIAR">
    <button type="submit" class=" btn btn-danger " id="limpiar-busqueda" onclick="Filtrarlimpiar();">  <i class="fa fa-times-circle"></i></button>
   </span>

  </div>

   

    </div>
  </div>
</div>


 <!--endbuscador-->