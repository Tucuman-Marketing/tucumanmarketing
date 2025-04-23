




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
                {{-- settingEmail->driver selected --}}
                <option value="" >Seleccione un Driver</option>
                @if($settingEmail->driver == "smtp")
                <option value="smtp" selected="">SMTP</option>
                <option value="imap" >imap</option>
                <option value="pop3" >pop3</option>
                @endif
                @if($settingEmail->driver == "imap")
                <option value="smtp" >SMTP</option>
                <option value="imap" selected="">imap</option>
                <option value="pop3" >pop3</option>
                @endif
                @if($settingEmail->driver == "pop3")
                <option value="smtp" >SMTP</option>
                <option value="imap" >imap</option>
                <option value="pop3" selected="">pop3</option>
                @endif
             </select>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-ethernet  color-white"></i></span>
              <select class="form-control" name="port" >
                <option value="" >Seleccione un Port</option>
                  @if($settingEmail->port == 465)
                  <option value="465" selected="">465</option>
                  <option value="587">587</option>
                  <option value="25">25</option>
                  <option value="993">993</option>
                  <option value="995">995</option>
                  <option value="2525">2525</option>
                  @endif
                  
                   @if($settingEmail->port == 587)
                   <option value="465">465</option>
                   <option value="587" selected="">587</option>
                   <option value="25">25</option>
                   <option value="993">993</option>
                   <option value="995">995</option>
                   <option value="2525">2525</option>
                   @endif

                   @if($settingEmail->port == 25)
                   <option value="465">465</option>
                   <option value="587">587</option>
                   <option value="25" selected="">25</option>
                   <option value="993">993</option>
                   <option value="995">995</option>
                   <option value="2525">2525</option>
                   @endif

                   @if($settingEmail->port == 993)
                   <option value="465">465</option>
                   <option value="587">587</option>
                   <option value="25">25</option>
                   <option value="993" selected="">993</option>
                   <option value="995">995</option>
                   <option value="2525">2525</option>
                   @endif

                   @if($settingEmail->port == 995)
                   <option value="465">465</option>
                   <option value="587">587</option>
                   <option value="25">25</option>
                   <option value="993">993</option>
                   <option value="995"  selected="">995</option>
                   <option value="2525">2525</option>
                   @endif

                   @if($settingEmail->port == 2525)
                   <option value="465">465</option>
                   <option value="587">587</option>
                   <option value="25">25</option>
                   <option value="993">993</option>
                   <option value="995">995</option>
                   <option value="2525"  selected="">2525</option>
                   @endif
             </select>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-code  color-white"></i></span>
              <select class="form-control" name="encryption" >
                <option value="">Seleccione una Encriptacion</option>
                    @if($settingEmail->encryption == "ssl")
                      <option value="ssl" selected="">ssl</option>
                      <option value="tls" >tls</option>
                      <option value="" >sin encriptacion</option>
                    @endif

                    @if($settingEmail->encryption == "tls")
                      <option value="ssl" >ssl</option>
                      <option value="tls" selected="">tls</option>
                      <option value="" >sin encriptacion</option>
                    @endif

                    @if($settingEmail->encryption == "")
                      <option value="ssl">ssl</option>
                      <option value="tls">tls</option>
                      <option value="null" selected="">sin encriptacion</option>
                    @endif
             </select>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-sitemap color-white"></i></span>
              <input type="text" name="host" class="form-control" placeholder="host" required="" value="{{$settingEmail->host}}">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-user color-white"></i></span>
              <input type="text" name="username" class="form-control" placeholder="username" required="" value="{{$settingEmail->username}}">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-key color-white"></i></span>
              <input type="text" name="password" class="form-control" placeholder="password" required="" value="{{$settingEmail->password}}">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="far fa-address-book color-white"></i></span>
              <input type="text" name="address" class="form-control" placeholder="address" required="" value="{{$settingEmail->address}}">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-file-signature color-white"></i></span>
              <input type="text" name="name" class="form-control" placeholder="name" required="" value="{{$settingEmail->name}}">
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
      {!!Form::submit('Actualizar',['class'=>'btn btn-primary pull-right'])!!}
     
      </div>
  </div>
  



  <input type="text" name="uuid_edit" id="uuid_edit" hidden="" value="{{$settingEmail->uuid}}">