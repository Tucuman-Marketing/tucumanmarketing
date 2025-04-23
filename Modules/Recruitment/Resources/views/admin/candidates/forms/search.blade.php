<style>
    #searchForm {
        padding: 20px;
    }

    #searchForm .form-control {
        border: none;
        border-bottom: 1px solid;
        border-radius: 0;
        box-shadow: none;
        background-image: none;
        background-repeat: no-repeat;
        background-position: right 10px center;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    #searchForm .form-control:focus {
        outline: 0;
        box-shadow: none;
    }

    #searchForm .input-group label {
        height: 38px;
        display: flex;
        align-items: center;
        margin-right: 10px;
        line-height: 38px;
        min-width: 135px;
        font-weight: 400;
        padding-left: 13px;
    }

    #searchForm .input-group .select2 {
        flex: 1;
    }

    #searchForm .input-group .select2-selection {
        background-color: transparent;
        border: none;
        border-bottom: 1px solid;
        border-radius: 0;
        box-shadow: none;
        line-height: 38px;
        height: 38px;
        color: var(--default-text-color);
    }

    .input-group-text {
        padding: 0.375rem 0.75rem;
    }

    .d-flex {
        display: flex;
        align-items: center;
    }

    .ml-2 {
        margin-left: 0.5rem;
    }

    .input-group {
        flex-grow: 1;
    }

    /* Estilos para flecha de select */
    .select-arrow {
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 20 20"><polygon points="0,0 10,10 20,0" fill="%23666"/></svg>');
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 10px 10px;
        padding-right: 30px;
        /* Aumentar padding para evitar texto sobre la flecha */
    }
 /* Ajustar el estilo del select2 para que coincida con los inputs regulares */
 #searchForm .select2-container--default .select2-selection--multiple {
    background-color: transparent !important;
    border: none !important;
    border-bottom: 1px solid !important; /* Bordes inferior como los demás inputs */
    border-radius: 0 !important; /* Eliminar bordes redondeados */
    box-shadow: none !important;
    min-height: 38px !important;
    display: flex !important;
    align-items: center !important;
    padding: 0 !important;
}

/* Ajustar las opciones seleccionadas para que se alineen correctamente */
#searchForm .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #6f42c1 !important; /* Cambia este color según tu tema */
    border: none !important;
    color: #fff !important;
    padding: 0 10px !important;
    margin: 2px 5px 2px 0 !important;
    border-radius: 4px !important;
    line-height: 28px !important;
    height: 28px !important;
}

/* Ajustar el campo de búsqueda dentro del select2 */
#searchForm .select2-container--default .select2-selection--multiple .select2-search__field {
    border: none !important;
    margin-left: 5px !important;
    padding: 0 !important;
    line-height: 28px !important;
    height: 28px !important;
}

/* Asegurar que el contenido dentro del select2 se alinee correctamente */
#searchForm .select2-container--default .select2-selection--multiple .select2-selection__rendered {
    padding-left: 0 !important;
    line-height: 38px !important;
    display: flex !important;
    align-items: center !important;
    flex-wrap: wrap !important;
}

#searchForm .select2-container--default .select2-selection--multiple .select2-search--inline {
    display: flex !important;
    align-items: center !important;
}

#searchForm dl,
#searchForm ol,
#searchForm ul {
    margin-top: 0;
    margin-bottom: 0.2rem;
}
</style>

<!--buscador-->
<div class="card-body mb-0 pb-0">
    <div class="row mb-0">
        <div class="col-12 d-flex">
            <div class="input-group mb-3">
                <span class="input-group-text" id="search-addon">
                    <i class="fa fa-search"></i>
                </span>
                <input type="text" class="form-control" placeholder="Búsqueda general" id="search_general"
                    onchange="Filtrar();" aria-label="Búsqueda general" aria-describedby="search-addon">
            </div>
            <button class="btn btn-light ml-2" type="button" onclick="toggleSearchForm()">
                <i class="fas fa-stream"></i> Búsqueda avanzada
            </button>
        </div>
    </div>
</div>

<div id="searchForm" style="display: none;" class="card-body">
    <div class="row">
        <!-- Search name -->
        <div class="col-12 col-sm-12 col-12 col-md-12">
            <div class="input-group mb-3">
                <label for="search_name">Nombre</label>
                <input type="text" class="form-control" placeholder="" id="search_name" onchange="Filtrar();">
            </div>
        </div>

        <!-- Search email -->
        <div class="col-12 col-sm-12 col-12 col-md-6">
            <div class="input-group mb-3">
                <label for="search_email">Email</label>
                <input type="text" class="form-control" placeholder="" id="search_email" onchange="Filtrar();">
            </div>
        </div>

        <!-- Search phone -->
        <div class="col-12 col-sm-12 col-12 col-md-6">
            <div class="input-group mb-3">
                <label for="search_phone">Telefono</label>
                <input type="text" class="form-control" placeholder="" id="search_phone" onchange="Filtrar();">
            </div>
        </div>

        <!-- Select Gender -->
        {{-- <div class="col-12 col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <label for="search_gender">Genero</label>
                <select class="form-control select-arrow" id="search_gender" onchange="Filtrar();">
                    <option value="">--Selecciona un Genero--</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
        </div> --}}
    </div>

    <div class="row">
        <!-- Select skills -->
        <div class="col-12 col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <label for="search_skills">Habilidades</label>
                <select class="form-control select-2" id="search_skills" multiple onchange="Filtrar();">
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- select Idiomas --}}
        <div class="col-12 col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <label for="search_languages">Idiomas</label>
                <select class="form-control select-2 select2v2" id="search_languages" multiple onchange="Filtrar();">
                    @foreach(config('form.select.languages') as $value => $label)
                    <option value="{{ $value }}" {{ old('language_1')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Search date --}}
        <div class="col-12 col-sm-12 col-12 col-md-6">
            <div class="input-group mb-3">
                <label for="search_date">Fecha de registro</label>
                <input type="text" name="search_date" class="form-control flatpickr-input publish-date"
                    placeholder="" id="search_date" autocomplete="off" onchange="Filtrar('search_date', this.value);">
            </div>
        </div>
        {{-- columna rango de fechas --}}
        <div class="col-12 col-sm-12 col-12 col-md-6">
            <div class="input-group mb-3">
                <label for="search_date_range">Rango de Fecha</label>
                <input type="text" name="search_date_range" class="form-control flatpickr-input date-range-picker"
                    placeholder="" onchange="Filtrar();">
            </div>
        </div>
    </div>

</div>


@section('other-scripts')
@parent
<script>
    $(document).ready(function() {
        // Eliminar el primer elemento del select de idiomas
        $('#search_languages option:first').remove();

        // Actualizar el select-2 para reflejar los cambios
        $('#search_languages').trigger('change');
    });
</script>
@endsection
