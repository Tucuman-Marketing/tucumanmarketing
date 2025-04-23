<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">Información general</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label for="name" class="col-sm-2 col-form-label required">Nombre</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="name" id="name" required value="{{ $data->name }}" disabled>
                </div>
            </div>

            <div class="col-md-4">
                <label for="icon" class="col-sm-2 col-form-label">Icono</label>
                <div class="input-group">
                    <input type="text" class="form-control icon" placeholder="Tu icono aquí" aria-label="Icono" name="icon" value="{{ $data->icon }}" disabled>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="openIconModal()" disabled>Seleccionar Ícono</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <label for="sort_order" class="col-sm-2 col-form-label">Orden</label>
                <div class="input-group has-validation">
                    <input type="number" class="form-control" name="sort_order" id="sort_order" min="1" value="{{ $data->sort_order }}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label>Color</label>
                <div style="display: flex; flex-wrap: wrap;">
                    @foreach(\Modules\Blog\Entities\BlogStatus::COLOR_CATALOG as $colorName => $hexValue)
                        <div class="form-check" style="margin-right: 10px; display: flex; align-items: center;">
                            <input class="form-check-input" type="radio" name="color" id="color_{{ $colorName }}" value="{{ $hexValue }}" {{ $data->color == $hexValue ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="color_{{ $colorName }}">
                                <span class="badge" style="background-color: {{ $hexValue }}; color: white; text-shadow: 1px 1px 2px black, 0 0 1em black, 0 0 0.2em black;">{{ ucfirst($colorName) }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
