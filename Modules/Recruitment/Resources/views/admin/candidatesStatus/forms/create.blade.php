<div id="input_hidden">
    <input type="hidden" id="selectedIcon" name="icon">
</div>
<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">Información general</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label for="name" class="col-sm-2 col-form-label required">Nombre</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control " name="name" id="name" required>
                </div>
            </div>

            <div class="col-md-4">
                <label for="name" class="col-sm-2 col-form-label">Icono</label>
                <div class="input-group ">
                    <input type="text" class="form-control icon" placeholder="Tu icono aquí" aria-label="Icono" name="icon" >
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button"  onclick="openIconModal()">Seleccionar Ícono</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <label for="name" class="col-sm-2 col-form-label">Orden</label>
                <div class="input-group has-validation">
                    <input type="number" class="form-control" name="sort_order" id="sort_order"  min="1" >
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-6">
                <label>Color</label>
                @foreach(\Modules\Blog\Entities\BlogStatus::COLOR_CATALOG as $colorName => $hexValue)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="color" id="color_{{ $colorName }}" value="{{ $hexValue }}">
                        <label class="form-check-label" for="color_{{ $colorName }}">
                            <span class="badge" style="background-color: {{ $hexValue }}; color: white; text-shadow: 1px 1px 2px black, 0 0 1em black, 0 0 0.2em black;">{{ ucfirst($colorName) }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12"> <!-- Cambiado a col-md-12 para usar todo el ancho disponible -->
                <label>Color</label>
                <div style="display: flex; flex-wrap: wrap;"> <!-- Contenedor flex para los elementos .form-check -->
                    @foreach(\Modules\Blog\Entities\BlogStatus::COLOR_CATALOG as $colorName => $hexValue)
                        <div class="form-check" style="margin-right: 10px; display: flex; align-items: center;"> <!-- Estilo modificado para mostrar en línea -->
                            <input class="form-check-input" type="radio" name="color" id="color_{{ $colorName }}" value="{{ $hexValue }}">
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
