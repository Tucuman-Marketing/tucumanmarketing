@extends('layouts.theme-admin.velvet.index')

@section('other-css')
@stop

@section('title-module')
    <div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
        <h4 class="fw-medium mb-0">Blog / Estatus</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-white-50">Dashboard</li>
            <li class="breadcrumb-item text-white-50">Blog</li>
            <li class="breadcrumb-item active" aria-current="page">Estatus</li>
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

                        @include('blog::admin.partials.menu-header')

                        <div class="text-end">
                            <button type="button" class="btn btn-primary label-btn btn-wave label-end waves-effect waves-light"
                             data-bs-toggle="modal" data-bs-target="#modal-create">
                                Nuevo
                                <i class="bi bi-plus-circle-dotted label-btn-icon ms-2"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">

                {{-- BUSCADOR --}}
                @include('blog::admin.statuses.forms.search')
                {{-- BUSCADOR --}}

                <br><br>

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered text-nowrap w-100 no-footer table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th width="1"></th>
                                        <th width="100">Operaciones</th>
                                        <th>Icono</th>
                                        <th>Nombre</th>
                                        <th>Color</th>
                                        <th>Orden</th>
                                        <th>Fecha de Creación</th>
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


    {{-- modal create --}}
    @include('blog::admin.statuses.modal.create')
    <!--modal show-->
    @include('blog::admin.statuses.modal.show')
    <!--modal edit-->
    @include('blog::admin.statuses.modal.edit')

    {{-- Component --}}
    @include('layouts.theme-admin.velvet.components.selectIcon')
@endsection


@section('other-scripts')
    {{-- DATATABLE --}}
    @include('blog::admin.statuses.js.datatable')
@stop

