@extends('layouts.theme-admin.velvet.index')

@section('other-css')
@stop

@section('title-module')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">Puesto / {{$data->title}} </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-white-50">Dashboard</li>
        <li class="breadcrumb-item text-white-50">puestos</li>
    </ol>
</div>
@endsection

@section('content')
@include('flash::message')

    <div class="card custom-card">
        <div class="card-body">
            <div class="card-header">
                <div class="card-title">
                    Datos del puesto de trabajo
                </div>
            </div>
            <div class="row d-flex mt-3">
                {{-- titulo --}}
                <div class="col-md-12 mt-3">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                        <span class="input-group-text" id="basic-addon1">Título</span>
                        <input type="text" class="form-control" placeholder="" aria-label="Username"
                            aria-describedby="basic-addon1" id="title" name="title" value="{{ $data->title }}" readonly>
                    </div>
                </div>
                <!-- Selector múltiple para Skills -->
                <div class="col-md-6 mt-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-tools"></i></span>
                        <span class="input-group-text">Skills</span>
                        <select class="form-control select-2" name="skills[]" id="skills" multiple disabled>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}" {{ in_array($skill->id, $selectedSkills) ? 'selected' : '' }}>
                                    {{ $skill->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Selector múltiple para Tags -->
                <div class="col-md-6 mt-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-tags"></i></span>
                        <span class="input-group-text">Tags</span>
                        <select class="form-control select-2" name="tags[]" id="tags" multiple disabled>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- categorias --}}
                <div class="col-md-6 mt-3">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-buromobelexperte"></i></span>
                        <span class="input-group-text" id="basic-addon1">Categoría</span>
                        <select class="form-control select-2" name="category" id="category" disabled>
                            <option value="">--Selecciona--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $selectedCategory ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- status --}}
                <div class="col-md-6 mt-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fab fa-bandcamp"></i></span>
                        <span class="input-group-text">Estatus</span>
                        <select class="form-control select-2" name="status" id="status" disabled>
                            <option value="">--Selecciona--</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" {{ (old('status') ?? $selectedStatus) == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card custom-card">
        <div class="card-header">
            <div class="card-title">
                Contenido del Puesto de Trabajo
            </div>
        </div>
        <div class="card-body">
            <div class="row d-flex mt-3">
                <div class="form-group">
                    <textarea class="form-control ckeditor" id="description" name="description" readonly>{!! $data->description !!}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="card custom-card">
        <div class="card-header">
            <div class="card-title">
                Candidatos Realacionados
            </div>
        </div>
        <div class="card-body">

            {{-- BUSCADOR --}}
            @include('recruitment::admin.candidates.forms.search')
            {{-- BUSCADOR --}}

            <div class="row d-flex mt-3">
                <div class="col-md-12 col-lg-12">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered text-nowrap w-100 no-footer table-hover dataTable">
                            <thead>
                                <tr>
                                    <th width="1"></th>
                                    <th width="100">Operaciones</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Genero</th>
                                    <th>CV</th>
                                    <th>Status</th>
                                    <th>Fecha de Creacion</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- TABLE WRAPPER -->
            </div>
        </div>
    </div>

    <!--modal create-->
    @include('recruitment::admin.candidates.modal.create')
    <!--modal show-->
    @include('recruitment::admin.candidates.modal.show')
    <!--modal edit-->
    @include('recruitment::admin.candidates.modal.edit')
    <!--modal status-->
    @include('recruitment::admin.jobs.relationship.candidates.modals.status')
@endsection

@section('other-scripts')
    {{-- FILE-UPLOAD - colocar despues de datatable --}}
    @include('recruitment::admin.jobs.relationship.candidates.js.file-upload')
    {{-- DATATABLE --}}
    @include('recruitment::admin.jobs.relationship.candidates.js.datatable')
    {{-- ckeditor --}}
    @include('recruitment::admin.jobs.relationship.candidates.js.ckeditor')

@stop
