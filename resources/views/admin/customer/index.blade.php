@extends('layouts.theme-admin.velvet.index')

@section('title-module')
    <div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
        <h4 class="fw-medium mb-0">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Dashboards</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Sales</li>
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
                        <div class="row justify-content-end">

                            <span data-placement="top" data-toggle="tooltip" title="Crear Cliente" class='pr-2'>
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#create">
                                    <i class="fa fa-plus "> </i>
                                </button>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                {{-- BUSCADOR --}}
                {{-- @include('admin.vehicles.forms.search') --}}
                {{-- BUSCADOR --}}

                <br><br>

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
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
@include('admin.customer.modal.create')
<!--Modal Show-->
@include('admin.customer.modal.show')
<!--Modal Edit-->
@include('admin.customer.modal.edit')
<!--Modal Delete-->
@include('admin.customer.modal.delete')
<!--Modal Mass Delete-->
@include('admin.customer.modal.massDelete')

@section('mis-scripts')
{{-- DATATABLE --}}
@include('admin.customer.js.datatable')
{{-- SELECT2 --}}
@include('admin.customer.js.select2')
{{-- IMAGE --}}
@include('admin.customer.js.dropify')
{{-- SWITCH --}}
@include('admin.customer.js.switch')
@stop

@endsection
