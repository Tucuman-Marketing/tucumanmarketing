




<div class="row"> 
  <div class="col-md-12">
    <div class="expanel expanel-primary">
      <div class="expanel-heading">
        <h3 class="expanel-title">Pagos</h3>
      </div>
      <div class="expanel-body">
        <div class="row">

        
          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fa fa-terminal  color-white"></i></span>
              <select class="form-control" name="driver" >
                <option value="" selected="">Seleccione un Tipo de Pago</option>
               <option value="mercadopago" >mercadopago</option>
               <option value="paypal" >paypal</option>
             </select>
            </div>
          </div>

  

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fa fa-terminal color-white"></i></span>
              <input type="text" name="private_key" class="form-control" placeholder="Private_key (CLIENT_SECRET)" required="">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fa fa-terminal color-white"></i></span>
              <input type="text" name="public_key" class="form-control" placeholder="Public_key (CLIENT_ID)" required="">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-percent color-white"></i></span>
              <input type="text" name="password" class="form-control" placeholder="Ingrese el Porcentaje % de Recargo">
            </div>
          </div>




        
        </div>
      </div>
    </div>
  </div>

</div>




  
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      {!!Form::submit('Guardar',['class'=>'btn btn-primary pull-right'])!!}
     
      </div>
  </div>
  

