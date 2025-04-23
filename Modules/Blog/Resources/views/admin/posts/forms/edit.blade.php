<input type="text" name="uuid" id="uuid_edit" hidden="" value="{{$data->uuid}}">
<div id="input_hidden_edit"></div> <!-- Contenedor para campos ocultos en el formulario de edición -->


<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Post
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title" class="col-sm-2 col-form-label">Título</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required
                                    id="title" name="title" value="{{ $data->title ?? '' }}">
                                <div class="invalid-feedback">
                                    Please choose a Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control select-2"  name="status" id="status">
                                <option value="">--Selecciona--</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $status->id == $data->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row d-flex mt-3">
                        <div class="col-xl-6">
                            <label for="category" class="form-label">Categorías</label>
                            <select class="form-control select-2"  name="category" id="category">
                                <option value="">--Selecciona--</option>
                                @foreach(\Modules\Blog\Entities\BlogCategory::all() as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $data->category_id  ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-6">
                            <label for="tags">Tags</label>
                            <select class="form-control select-2" multiple  name="tags[]"  required>
                                @foreach($tags as $id => $item)
                                    <option value="{{ $item['id'] }}" {{ in_array($item['id'], $data->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row d-flex mt-3">
                            <div class="col-xl-6">
                                <label for="publish-date" class="form-label">Fecha de publicación</label>
                                <input type="text" class="form-control flatpickr-input publish-date" name="publish-date"
                                       value="{{ $data->published_at ? (new DateTime($data->published_at))->format('Y-m-d') : '' }}"
                                       placeholder="Elige una fecha" readonly="readonly">
                            </div>

                            <div class="col-xl-6">
                                <label for="publish-time" class="form-label">Hora de publicación</label>
                                <input type="text" class="form-control flatpickr-input publish-time" name="publish-time"
                                       value="{{ $data->published_at ? (new DateTime($data->published_at))->format('H:i') : '' }}"
                                       placeholder="Elige una hora" readonly="readonly">
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

                            @if($data->getMedia('image_header')->last())
                            <div class="image-container position-relative">
                                <span class="border border-primary border-container rounded">
                                <img src="{{ asset($data->getMedia('image_header')->last()->url)}}" alt="..." class="img-fluid  rounded" >
                                </span>
                                <div class="close-image position-absolute">
                                    <button type="button" data-id="{{ $data->getMedia('image_header')->last()->id }}" class="btn btn-delete" onclick="deleteMedia({{ $data->getMedia('image_header')->last()->id }}, this)"><i class="ri-close-line"></i></button>
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

{{-- Galeria de Imagenes --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Galeria de Imagenes
                </div>
            </div>
            <div class="card-body">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="card custom-card product-card" >
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">

                            @if($data->getMedia('image_gallery')->count() > 0)
                                @foreach ($data->getMedia('image_gallery') as $image )
                                    <div class="image-container position-relative">
                                        <span class="border border-primary border-container rounded">
                                        <img src="{{ asset($image->url)}}" alt="..." class="img-fluid  rounded" >
                                        </span>
                                        <div class="close-image position-absolute">
                                            <button type="button" data-id="{{ $image->id }}" class="btn btn-delete" onclick="deleteMedia({{ $image->id }}, this)"><i class="ri-close-line"></i></button>
                                        </div>
                                    </div>
                                @endforeach
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

                  <!--  Image multiple -->
                  <input type="file" class="filepond_multiple" name="image_multiple" data-form-type="edit" multiple />
                <p class="help-block">{{ $errors->first('image_multiple.*') }}</p>

            </div>
        </div>
    </div>
</div>

{{-- Cargar Archivo --}}
{{-- <div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Cargar Archivo
                </div>
            </div>
            <div class="card-body">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="card custom-card product-card" >
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">
                            @if($data->getFirstMedia('file'))
                                <div class="image-container position-relative">
                                    <span class="border border-primary border-container rounded">
                                        @if($data->getFirstMedia('file')->mime_type == 'application/pdf')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/pdf.svg') }}" alt="PDF" class="img-fluid rounded">
                                        @elseif($data->getFirstMedia('file')->mime_type == 'application/zip')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/zip.svg') }}" alt="ZIP" class="img-fluid rounded">
                                        @elseif($data->getFirstMedia('file')->mime_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/word.svg') }}" alt="word" class="img-fluid rounded">
                                        @elseif($data->getFirstMedia('file')->mime_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/xlsx.svg') }}" alt="XLSX" class="img-fluid rounded">
                                        @elseif($data->getFirstMedia('file')->mime_type == 'application/x-rar-compressed')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/rar.svg') }}" alt="RAR" class="img-fluid rounded">
                                        @endif
                                        </span>
                                    <div class="close-image position-absolute">
                                        <button type="button" data-id="{{ $data->getFirstMedia('file')->id }}" class="btn btn-delete" onclick="deleteMedia({{ $data->getFirstMedia('file')->id }}, this)"><i class="ri-close-line"></i></button>
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

                <!--  File Simple  -->
                <input type="file" class="filepond_file_single" name="file_single" data-form-type="edit" />
                <p class="help-block">{{ $errors->first('file.*') }}</p>

            </div>
        </div>
    </div>
</div> --}}

{{-- Cargar Multiples Archivos --}}
{{-- <div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Cargar Multiples Archivos
                </div>
            </div>
            <div class="card-body">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="card custom-card product-card" >
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">

                            @if($data->getMedia('file_multiple')->count() > 0)
                                @foreach ($data->getMedia('file_multiple') as $file )
                                    <div class="image-container position-relative">
                                        <span class="border border-primary border-container rounded">

                                        @if($file->mime_type == 'application/pdf')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/pdf.svg') }}" alt="PDF" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/zip')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/zip.svg') }}" alt="ZIP" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/word.svg') }}" alt="word" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/xlsx.svg') }}" alt="XLSX" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/x-rar-compressed')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/rar.svg') }}" alt="RAR" class="img-fluid rounded">
                                        @endif
                                        </span>
                                        <div class="close-image position-absolute">
                                            <button type="button" data-id="{{ $file->id }}" class="btn btn-delete" onclick="deleteMedia({{ $file->id }}, this)"><i class="ri-close-line"></i></button>
                                        </div>
                                    </div>
                                @endforeach
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

                <!--  File Multiple  -->
                <input type="file" class="filepond_file_multiple" name="file_multiple"  data-form-type="edit" multiple/>
                <p class="help-block">{{ $errors->first('file_multiple.*') }}</p>

            </div>
        </div>
    </div>
</div> --}}


{{-- Cargar Multiples Archivos --}}
{{-- <div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Cargar Multiples Archivos 2
                </div>
            </div>
            <div class="card-body">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                    <div class="card custom-card product-card" >
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">

                            @if($data->getMedia('file_multiple')->count() > 0)
                                @foreach ($data->getMedia('file_multiple') as $file )
                                    <div class="image-container position-relative">
                                        <span class="border border-primary border-container rounded">

                                        @if($file->mime_type == 'application/pdf')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/pdf.svg') }}" alt="PDF" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/zip')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/zip.svg') }}" alt="ZIP" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/word.svg') }}" alt="word" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/xlsx.svg') }}" alt="XLSX" class="img-fluid rounded">
                                        @elseif($file->mime_type == 'application/x-rar-compressed')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/rar.svg') }}" alt="RAR" class="img-fluid rounded">
                                        @endif
                                        </span>
                                        <div class="close-image position-absolute">
                                            <button type="button" data-id="{{ $file->id }}" class="btn btn-delete" onclick="deleteMedia({{ $file->id }}, this)"><i class="ri-close-line"></i></button>
                                        </div>
                                    </div>
                                @endforeach
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

                <!--  File Multiple  -->
                <input type="file" class="filepond_file_multiple" name="file_multiple2"  data-form-type="edit" multiple/>
                <p class="help-block">{{ $errors->first('file_multiple.*') }}</p>

            </div>
        </div>
    </div>
</div> --}}


{{-- textarea --}}
<div class="form-group">
    <textarea class="form-control ckeditor" name="content" >{!! $data->content !!}</textarea>
</div>


