
<div class="row">
    <div class="col-md-12">
<div class="card card-outline-info">
   <div class="card-header">
       <h4 class="m-b-0 text-white">Cambiar Datos del Usuario</h4>
   </div>
   <div class="card-body">

<div class="row">

       <div class="form-group col-xs-12 col-sm-12 col-md-6">
             <div class="input-group">
               <div class="input-group-addon"><i class="mdi mdi-account-box color-white"></i></div>
               <input type="text" name="name" id="name" class="form-control"  placeholder="Nombre"  value="{{ $data->name ?? 'ERROR' }}" readonly>
             </div>
         </div>

         <div class="form-group col-xs-12 col-sm-12 col-md-6">
             <div class="input-group">
               <div class="input-group-addon"><i class="mdi mdi-account-box color-white" ></i></div>
               <input type="text" name="lastname" id="lastname" class="form-control"  placeholder="Apellido"  value="{{ $data->lastname ?? 'ERROR' }}" readonly>
             </div>
         </div>


         <div class="form-group col-xs-12 col-sm-12 col-md-6">
             <div class="input-group">
               <div class="input-group-addon"><i class="mdi mdi-map-marker color-white"></i></div>
               <input type="text" name="addres" id="addres" class="form-control"  placeholder="Direccion"   value="{{ $data->address ?? 'ERROR' }}" readonly>
             </div>
         </div>




         <div class="form-group col-xs-12 col-sm-12 col-md-12">
             <div class="input-group">
               <div class="input-group-addon"><i class="mdi mdi-cellphone color-white"></i></div>
               <input type="text" name="phone" id="phone" class="form-control telefono"  placeholder="Email"  im-insert="true"   value="{{ $data->email ?? 'ERROR' }}" readonly>
             </div>
         </div>

         <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <div class="input-group">
              <div class="input-group-addon"><i class="mdi mdi-cellphone color-white"></i></div>
              <input type="text" name="phone" id="phone" class="form-control telefono"  placeholder="DNI"  im-insert="true"   value="{{ $data->dni ?? 'ERROR' }}" readonly>
            </div>
        </div>




{{--
         <div class="form-group col-xs-12 col-sm-12 col-md-12">
             <div class="input-group">
               <div class="input-group-addon"><i class="mdi mdi-google-maps color-white"></i></div>

<input type="text"  class="form-control"  value="" disabled="" id="country">
<input type="text"  class="form-control"  value="" disabled="" id="province">
<input type="text"  class="form-control"  value="" disabled="" id="city">


             </div>
         </div>


         <div class="form-group col-xs-12 col-sm-12 col-md-12">
             <div class="input-group">
               <div class="input-group-addon"><i class="mdi mdi-google-maps color-white"></i></div>

              <select name="pais" class="form-control countries" id="countryId">
                 <option value="">Select Country</option>
             </select>
             <select name="provincia" class="form-control states" id="stateId">
                 <option value="">Select province</option>
             </select>
             <select name="ciudad" class="form-control cities" id="cityId">
                 <option value="">Select City</option>
             </select>


             </div>
         </div> --}}



</div>





   </div>
 </div>
 </div>
</div>

