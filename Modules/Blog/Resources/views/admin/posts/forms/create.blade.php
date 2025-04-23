<div id="input_hidden">

</div>

<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Información general
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Título</span>
                    <input type="text" class="form-control" placeholder="" aria-label="Username"
                        aria-describedby="basic-addon1" id="title" name="title" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-bandcamp"></i></span>
                    <span class="input-group-text">Estatus</span>
                    <select class="form-control select-2" name="status" id="status">
                        <option value="">--Selecciona--</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ old('status') == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row d-flex mt-3">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-buromobelexperte"></i></span>
                    <span class="input-group-text" id="basic-addon1">Categoría</span>
                    <select class="form-control select-2" name="category" id="category">
                        <option value="">--Selecciona--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-stack-exchange"></i></span>
                    <span class="input-group-text" id="basic-addon1">Tags</span>
                    <select class="form-control select-2" name="tags[]" id="" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                {{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row d-flex mt-3">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-day"></i></span>
                    <span class="input-group-text" id="basic-addon1">Fecha de publicación</span>
                    <input type="text" class="form-control flatpickr-input publish-date" name="publish-date"
                        placeholder="Elige una fecha"  required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-clock"></i></span>
                    <span class="input-group-text" id="basic-addon1">Hora de publicación</span>
                    <input type="text" class="form-control flatpickr-input publish-time" name="publish-time"
                        placeholder="Elige una hora" readonly="readonly">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Gestion de archivos
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">
            <div class="col-md-12">
                <!-- Image Single -->
                <label for="image_single" class="form-label">Imagen de portada</label>
                <input type="file" class="filepond_single" name="image_single" id="image_single"
                    data-form-type="create" />
                <p class="help-block">{{ $errors->first('image_single.*') }}</p>
            </div>

            <div class="col-md-12">
                <!-- Image Multiple -->
                <label for="image_multiple" class="form-label">Galeria de imagenes</label>
                <input type="file" class="filepond_multiple" name="image_multiple" data-form-type="create"
                    multiple />
                <p class="help-block">{{ $errors->first('image_multiple.*') }}</p>
            </div>
        </div>

        {{-- <div class="row d-flex mt-3">
            <div class="col-md-12">
                <!-- File Single -->
                <label for="file_single" class="form-label">Carga de archivo simple</label>
                <input type="file" class="filepond_file_single" name="file_single" data-form-type="create" />
                <p class="help-block">{{ $errors->first('file.*') }}</p>
            </div>

            <div class="col-md-12">
                <!-- File Multiple -->
                <label for="file_multiple" class="form-label">Carga de archivos multiples</label>
                <input type="file" class="filepond_file_multiple" name="file_multiple" data-form-type="create"
                    multiple />
                <p class="help-block">{{ $errors->first('file_multiple.*') }}</p>
            </div>
        </div> --}}

    </div>
</div>

<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Contenido del blog
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">
            <div class="form-group">
                <textarea class="form-control ckeditor" name="content"></textarea>
            </div>
        </div>
    </div>
</div>
