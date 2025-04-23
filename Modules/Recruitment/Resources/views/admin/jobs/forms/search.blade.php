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
                    onkeyup="Filtrar();" aria-label="Búsqueda general" aria-describedby="search-addon">
            </div>
            <button class="btn btn-light ml-2" type="button" onclick="toggleSearchForm()">
                <i class="fas fa-stream"></i> Búsqueda avanzada
            </button>
        </div>
    </div>
</div>

<div id="searchForm" style="display: none;" class="card-body">
    <div class="row">
        <!-- Search title -->
        <div class="col-12 col-sm-12 col-12 col-md-12">
            <div class="input-group mb-3">
                <label for="search_title">Titulo</label>
                <input type="text" class="form-control" placeholder="" id="search_title" onkeyup="Filtrar();">
            </div>
        </div>

        <!-- Select Status -->
        <div class="col-12 col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <label for="search_status">Estatus</label>
                <select class="form-control select-arrow" id="search_status" onchange="Filtrar();">
                    <option value="">--Selecciona Estatus--</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->name }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Select Category -->
        <div class="col-12 col-sm-12 col-md-6">
            <div class="input-group mb-3">
                <label for="search_category">Categoría</label>
                <select class="form-control select-arrow" id="search_category" onchange="Filtrar();">
                    <option value="">--Selecciona Categoría--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
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
