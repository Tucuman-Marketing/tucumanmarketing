
{{-- name --}}
<div class="row">
  <div class="col-md-12">
    <div class="card card-outline-info">
      <div class="card-header">
        <h4 class="m-b-0 text-white">atos del Plan</h4>
      </div>
      <div class="card-body">

        <div class="row">

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="mdi mdi-account-box color-white"></i></span>
              <input type="text" name="name" id="name_edit_plans" class="form-control" placeholder="ingrese el nombre"
                required="" value="{{ isset($data->name) ? $data->name : '' }}" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="mdi mdi-account-box color-white"></i></span>
              <input type="text" name="description" id="description_edit_plans" class="form-control" placeholder="ingrese la descripción"
                required="" value="{{ isset($data->description) ? $data->description : '' }}" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="mdi mdi-account-box color-white"></i></span>
              <input type="text" name="duration" id="duration_edit_plans" class="form-control" placeholder="ingrese la duración"
                required="" value="{{ isset($data->duration) ? $data->duration : '' }}" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="mdi mdi-account-box color-white"></i></span>
              <input type="text" name="type" id="type_edit_plans" class="form-control" placeholder="ingrese el tipo"
                required="" value="{{ isset($data->type) ? $data->type : '' }}" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="services">Servicios</label>
            <select class="form-control select2" multiple id="services" name="services[]" multiple="multiple" readonly>
                @foreach($services as $id => $name)
                    <option value="{{ $id }}" {{ in_array($id, $data->services->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>
