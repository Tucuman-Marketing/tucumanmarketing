




<div class="row"> 
  <div class="col-md-12">
    <div class="expanel expanel-primary">
      <div class="expanel-heading">
        <h3 class="expanel-title">Email</h3>
      </div>
      <div class="expanel-body">
        <div class="row">

        
          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fa fa-terminal  color-white"></i></span>
              <select class="form-control" name="driver" >
                <option value="" selected="">Seleccione un Driver</option>
               <option value="smtp" >SMTP</option>
               <option value="imap" >imap</option>
               <option value="pop3" >pop3</option>
             </select>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-ethernet  color-white"></i></span>
              <select class="form-control" name="port" >
                <option value="" selected="">Seleccione un Port</option>
                <option value="465">465</option>
                <option value="587">587</option>
                <option value="25">25</option>
                <option value="993">993</option>
                <option value="995">995</option>
                <option value="2525">2525</option>
             </select>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-code  color-white"></i></span>
              <select class="form-control" name="encryption" >
                <option value="" selected="">Seleccione una Encriptacion</option>
                <option value="ssl">ssl</option>
                    <option value="tls" >tls</option>
                    <option value="" >sin encriptacion</option>
             </select>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-sitemap color-white"></i></span>
              <input type="text" name="host" class="form-control" placeholder="host" required="">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-user color-white"></i></span>
              <input type="text" name="username" class="form-control" placeholder="username" required="">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-key color-white"></i></span>
              <input type="text" name="password" class="form-control" placeholder="password" required="">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="far fa-address-book color-white"></i></span>
              <input type="text" name="address" class="form-control" placeholder="address" required="">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-file-signature color-white"></i></span>
              <input type="text" name="name" class="form-control" placeholder="name" required="">
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
  

