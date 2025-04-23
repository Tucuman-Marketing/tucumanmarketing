@extends('layouts.theme-admin.velvet.index')

@section('other-css')
@stop



@section('title-module')
    <div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
        <h4 class="fw-medium mb-0">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Dashboards</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
        </ol>
    </div>
@endsection

@section('content')
@include('alerts.flash')
@include('flash::message')





<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-end">
                <div class="form-actions">
                    <div class="btn-list d-flex justify-content-between">

                        @include('admin.user.partials.menu-header')

                        <div class="text-end">
                            <button type="button" class="btn btn-primary label-btn btn-wave label-end waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-create">
                                Nuevo
                                <i class="bi bi-plus-circle-dotted label-btn-icon ms-2"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">

                {{-- BUSCADOR --}}
                @include('blog::admin.posts.forms.search')
                {{-- BUSCADOR --}}

                <br><br>

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered text-nowrap w-100 no-footer table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Operaciones</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>DNI</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Alta</th>
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





<!--Modal Create-->
@include('admin.user.user.modal.create')
<!--Modal Show-->
@include('admin.user.user.modal.show')
<!--Modal Edit-->
@include('admin.user.user.modal.edit')

@section('other-scripts')
    {{-- FILE UPLOAD - colocar antes del datatble --}}
    @include('admin.user.user.js.file-upload')
    {{-- DATATABLE --}}
    @include('admin.user.user.js.datatable')

@stop
@endsection
