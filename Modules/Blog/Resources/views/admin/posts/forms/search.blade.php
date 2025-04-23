<style>
    #searchForm {
        padding: 20px;
    }
    #searchForm .form-control {
        border: none;
        border-bottom: 1px solid;
        border-radius: 0;
        box-shadow: none;
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
    #searchForm .input-group .select2{
        flex: 1;
    }
    #searchForm .input-group .select2-selection{
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
</style>


<!--buscador-->
<div class="card-body mb-0 pb-0">
    <div class="row mb-0">
        <div class="col-12 d-flex">
            <div class="input-group mb-3">
                <span class="input-group-text" id="search-addon">
                    <i class="fa fa-search"></i>
                </span>
                <input type="text" class="form-control" placeholder="Búsqueda general" id="search_general" onkeyup="Filtrar();" aria-label="Búsqueda general" aria-describedby="search-addon">
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
            <input type="text" class="form-control" placeholder="" id="search_title" onkeyup="Filtrar();" >
            </div>
        </div>

        <!-- Search content -->
        <div class="col-12 col-sm-12 col-12 col-md-4">
            <div class="input-group mb-3">
                <label for="search_content">Contenido</label>
            <input type="text" class="form-control" placeholder="" id="search_content" onkeyup="Filtrar();" >
            </div>
        </div>

        <!-- Search Author -->
        <div class="col-12 col-sm-12 col-12 col-md-4">
            <div class="input-group mb-3">
                <label for="search_author">Autor</label>
            <input type="text" class="form-control" placeholder="" id="search_author" onkeyup="Filtrar();" >
            </div>
        </div>

        {{-- Search Status --}}
        <div class="col-12 col-sm-12 col-12 col-md-4">
            <div class="input-group mb-3">
                <label for="search_status">Estatus</label>
            <input type="text" class="form-control" placeholder="" id="search_status" onkeyup="Filtrar();" >
            </div>
        </div>
    </div>


    <div class="row">
        {{-- Search date --}}
        <div class="col-12 col-sm-12 col-12 col-md-12">
            <div class="input-group mb-3">
                <label for="search_date">Fecha de registro</label>
            <input type="text" name="search_date" class="form-control flatpickr-input publish-date" placeholder="" id="search_date" autocomplete="off" onchange="Filtrar('search_date', this.value);">
            </div>
        </div>
        {{-- columna rango de fechas --}}
        <div class="col-12 col-sm-12 col-12 col-md-12">
            <div class="input-group mb-3">
                <label for="search_date_range">Fecha de registro (rango)</label>
                <input type="text" name="search_date_range" class="form-control flatpickr-input date-range-picker" placeholder=""  onchange="Filtrar();">
            </div>
        </div>
    </div>

</div>
