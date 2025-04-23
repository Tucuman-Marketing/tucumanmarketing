




<div class="row"> 
  <div class="col-md-12">
    <div class="expanel expanel-primary">
      <div class="expanel-heading">
        <h3 class="expanel-title">Empresa</h3>
      </div>
      <div class="expanel-body">
        <div class="row">

        
          <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fab fa-houzz  color-white"></i></span>
              <input type="text" name="name" class="form-control" placeholder="Nombre de la empresa"  value="{{$settingCompany->name}}">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-address-card color-white"></i></span>
              <input type="text" name="addres" class="form-control" placeholder="Direccion de la empresa"  value="{{$settingCompany->addres}}">
            </div>
          </div>


          <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-phone  color-white"></i></span>
              <input type="text" name="phone" class="form-control" placeholder="Telefono de la empresa"  value="{{$settingCompany->phone}}">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fab fa-whatsapp  color-white"></i></span>
              <input type="text" name="whatsapp" class="form-control" placeholder="whatsapp"  value="{{$settingCompany->whatsapp}}">
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-4">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-envelope  color-white"></i></span>
              <input type="text" name="email" class="form-control" placeholder="Ingrese el email"  value="{{$settingCompany->email}}">
            </div>
          </div>
        
        </div>
      </div>
    </div>
  </div>

</div>



<div class="row"> 
  <div class="col-md-12">
    <div class="expanel expanel-primary">
      <div class="expanel-heading">
        <h3 class="expanel-title">Redes Sociales</h3>
      </div>
      

      <div class="expanel-body">

        <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-4">
          <div class="input-group input-icon  ">
            <span class="input-group-addon"><i class="fab fa-facebook-square  color-white"></i></span>
            <input type="text" name="link_facebook" class="form-control" placeholder="link de facebook"  value="{{$settingCompany->link_facebook}}">
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-4">
          <div class="input-group input-icon  ">
            <span class="input-group-addon"><i class="fab fa-google  color-white"></i></span>
            <input type="text" name="link_google" class="form-control" placeholder="link de google"  value="{{$settingCompany->link_google}}">
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-4">
          <div class="input-group input-icon right ">
            <span class="input-group-addon"><i class="fab fa-youtube  color-white"></i></span>
            <input type="text" name="link_youtube" class="form-control" placeholder="link de youtube"  value="{{$settingCompany->link_youtube}}">
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-4">
          <div class="input-group input-icon right ">
            <span class="input-group-addon"><i class="fab fa-twitter  color-white"></i></span>
            <input type="text" name="link_twitter" class="form-control" placeholder="link de twitter"  value="{{$settingCompany->link_twitter}}">
          </div>
        </div>

        <div class="form-group col-xs-12 col-sm-12 col-md-4">
          <div class="input-group input-icon right ">
            <span class="input-group-addon"><i class="fab fa-instagram  color-white"></i></span>
            <input type="text" name="link_instagram" class="form-control" placeholder="link de instagram"  value="{{$settingCompany->link_instagram}}">
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>

</div>




<div class="row">

  <div class=" col-xs-12 col-sm-12 col-md-6">
    <div class="expanel expanel-primary">
      <div class="expanel-heading">
        <h3 class="expanel-title">Logo</h3>
      </div>
      <div class="expanel-body">
        <div class="row">

      <div class="form-group col-xs-12 col-sm-12 col-md-12">
        {{-- img log --}}
        @if ($settingCompany->logo_imagen == null)
          <img src="{{asset('storage/default-image.jpg')}}" class="mx-auto d-block" height="150" width="150" id="image-edit">
        @else
          <img src="{{asset($settingCompany->logo_imagen)}}" class="mx-auto d-block" width="150" height="150" alt="logo">
        @endif
        
      </div>
      


      <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <input type="file" class="dropify" data-height="150" data-allowed-file-extensions="png jpeg jpg" name="logo" >
      </div>
        
        </div>
      </div>
    </div>
  </div>





  <div class="col-xs-12 col-sm-12 col-md-6">
    <div class="expanel expanel-primary">
      <div class="expanel-heading">
        <h3 class="expanel-title">Favicon</h3>
      </div>
      

      <div class="expanel-body">

        <div class="form-group col-xs-12 col-sm-12 col-md-12">
          @if ($settingCompany->favicon_imagen == null)
             <img src="{{asset('storage/default-image.jpg')}}" class="mx-auto d-block" height="150" width="150" id="image-edit">
            @else
              <img src="{{asset($settingCompany->favicon_imagen)}}" class="mx-auto d-block" height="150" width="150" id="image-edit">
          @endif
          
        </div>
        
  
  
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
          <input type="file" class="dropify" data-height="150" data-allowed-file-extensions="ico" name="favicon" >
        </div>
        
        </div>
      </div>
    </div>



  
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-primary pull-right" >Guardar</button>
      </div>
  </div>
  

