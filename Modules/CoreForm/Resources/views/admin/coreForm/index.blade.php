@extends('layouts.theme-admin.velvet.index')

@section('other-css')
<style>


.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.close-image {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 1.75rem;
    height: 1.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(var(--danger-rgb), 0.8);
    color: white;
    border-radius: 0.4rem;
    cursor: pointer;
    z-index: 10;
    transition: background-color 0.3s, transform 0.3s;
}

.image-container:hover .close-image {
    display: flex;
}
.close-image:hover {
    background-color: rgba(var(--danger-rgb), 1);
    transform: scale(1.1);
}
</style>
@stop



@section('title-module')
    <div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
        <h4 class="fw-medium mb-0">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Dashboards</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
        </ol>
    </div>
@endsection

@section('content')
@include('flash::message')





<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-end">
                <div class="form-actions">
                    <div class="btn-list">

                        <div class="text-end">
                            <button type="button" class="btn btn-primary label-btn btn-wave label-end waves-effect waves-light"
                             data-bs-toggle="modal" data-bs-target="#create">
                                Nuevo
                                <i class="bi bi-plus-circle-dotted label-btn-icon ms-2"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">

                {{-- BUSCADOR --}}
                @include('coreform::admin.coreForm.forms.search')
                {{-- BUSCADOR --}}

                <br><br>

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th width="1"></th>
                                        <th width="100">Operaciones</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Crear</th>
                                        <th>Editar</th>
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
                <!-- SECTION WRAPPER -->

            </div>
        </div>
    </div>
</div>



<!--modal create-->
@include('coreform::admin.coreForm.modal.create')
<!--modal show-->
@include('coreform::admin.coreForm.modal.show')
<!--modal edit-->
@include('coreform::admin.coreForm.modal.edit')



@section('other-scripts')
    {{-- DATATABLE --}}
    @include('coreform::admin.coreForm.js.datatable')
    {{-- FILE-UPLOAD --}}
    @include('coreform::admin.coreForm.js.file-upload')
    {{-- CKEDITOR --}}
    @include('coreform::admin.coreForm.js.ckeditor')
@stop
@endsection
