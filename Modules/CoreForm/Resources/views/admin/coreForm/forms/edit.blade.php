<input type="text" name="uuid" id="uuid_edit" hidden="" value="{{$data->uuid}}">
<div id="input_hidden_edit"></div> <!-- Contenedor para campos ocultos en el formulario de edición -->


<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Core Form
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="name" class="form-label">Nombre</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required
                                id="name" name="name" value="{{ $data->name }}">
                                <div class="invalid-feedback">
                                    Please choose a Name.
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>

</div>

{{-- Imagen de Portada --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Imagen de portada
                </div>
            </div>
            <div class="card-body">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="card custom-card product-card" >
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">

                            @if($data->getFirstMedia('image_header'))
                            <div class="image-container position-relative">
                                <span class="border border-primary border-container rounded">
                                <img src="{{ asset($data->getFirstMedia('image_header')->url)}}" alt="..." class="img-fluid  rounded" >
                                </span>
                                <div class="close-image position-absolute">
                                    <button type="button" data-id="{{ $data->getFirstMedia('image_header')->id }}" class="btn btn-delete" onclick="deleteMedia({{ $data->getFirstMedia('image_header')->id }}, this)"><i class="ri-close-line"></i></button>
                                </div>
                            </div>
                            @else
                            <div class="image-container position-relative">
                                <span class="border border-primary border-container rounded">
                                <img src="{{ asset('theme-admin/velvet/assets/images/sin-imagen.jpg') }}" alt="..." class="img-fluid  rounded" >
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                 <!--  Image Simple  -->
                 <input type="file" class="filepond_single" name="image_single" id="image_single" data-form-type="edit" />
                 <p class="help-block">{{ $errors->first('image_single.*') }}</p>

            </div>
        </div>
    </div>
</div>



<div class="col-md-12 mb-2">
    <label for="name" class="form-label">Create</label>
    <button type="button" class="btn btn-primary copy-btn" data-target="create_textarea" onclick="copyToClipboard(event)">
        <i class="fas fa-copy"></i> Copy
    </button>
    <div class="form-group">
        <div class="input-group">
            <textarea class="form-control" id="create_textarea" name="create" rows="15">{!! $data->create !!}</textarea>
            <div class="input-group-append">
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mb-2">
    <label for="name" class="form-label">edit</label>
    <button type="button" class="btn btn-primary copy-btn" data-target="edit_textarea" onclick="copyToClipboard(event)"> <i class="fas fa-copy"></i> Copy
    </button>

    <div class="form-group">
        <textarea class="form-control" id="edit_textarea" name="edit" rows="15">{!! $data->edit !!}</textarea>
    </div>
</div>

<div class="col-md-12 mb-2">
    <label for="name" class="form-label">css</label>
    <button type="button" class="btn btn-primary copy-btn" data-target="css_textarea" onclick="copyToClipboard(event)"> <i class="fas fa-copy"></i> Copy
    </button>
    <div class="form-group">
        <textarea class="form-control" id="css_textarea" name="css" rows="15">{!! $data->css !!}</textarea>
    </div>
</div>

<div class="col-md-12 mb-2">
    <label for="name" class="form-label">js</label>
    <button type="button" class="btn btn-primary copy-btn" data-target="js_textarea" onclick="copyToClipboard(event)"> <i class="fas fa-copy"></i> Copy
    </button>
    <div class="form-group">
        <textarea class="form-control" id="js_textarea" name="js" rows="15">{!! $data->js !!}</textarea>
    </div>
</div>









