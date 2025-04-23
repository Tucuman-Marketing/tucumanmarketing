<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Post
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title" class="col-sm-2 col-form-label">Título</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="title" value="{{ isset($data->title) ? $data->title : '' }}" disabled>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control select-2" name="status" id="status" disabled>
                                <option value="">--Selecciona--</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ (isset($data->status_id) && $status->id == $data->status_id) ? 'selected' : '' }}>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row d-flex mt-3">
                        <div class="col-xl-6">
                            <label for="category" class="form-label">Categorías</label>
                            <select class="form-control select-2" name="category" id="category" disabled>
                                <option value="">--Selecciona--</option>
                                @foreach(\Modules\Blog\Entities\BlogCategory::all() as $category)
                                    <option value="{{ $category->id }}" {{ (isset($data->category_id) && $category->id == $data->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-6">
                            <label for="tags">Tags</label>
                            <select class="form-control select-2" multiple name="tags[]" required disabled>
                                @foreach($tags as $id => $item)
                                    <option value="{{ $item['id'] }}" {{ (isset($data->tags) && in_array($item['id'], $data->tags->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row d-flex mt-3">
                            <div class="col-xl-6">
                                <label for="publish-date" class="form-label">Fecha de publicación</label>
                                <input type="text" class="form-control flatpickr-input publish-date" name="publish-date"
                                       value="{{ $data->published_at ? (new DateTime($data->published_at))->format('Y-m-d') : '' }}"
                                       placeholder="Elige una fecha" readonly="readonly" disabled>
                            </div>

                            <div class="col-xl-6">
                                <label for="publish-time" class="form-label">Hora de publicación</label>
                                <input type="text" class="form-control flatpickr-input publish-time" name="publish-time"
                                       value="{{ $data->published_at ? (new DateTime($data->published_at))->format('H:i') : '' }}"
                                       placeholder="Elige una hora" readonly="readonly" disabled>
                            </div>
                        </div>
                    </div>
                </form>
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

            </div>
        </div>
    </div>
</div>
