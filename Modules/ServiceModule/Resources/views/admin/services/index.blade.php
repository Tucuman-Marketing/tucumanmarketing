@extends('layouts.theme-admin.volgh.index')

@section('title-module')
<div>
    <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/services.svg') }}" alt="" width="50"
            height="50" class="responsive"> Seccion de Servicios</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{!! URL::to('/admin/services') !!}">Servicios</a></li>
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

                            <span data-placement="top" data-toggle="tooltip" title="Crear Nuevo Servicio" class='pr-2'>
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
                            <table id="mydatatable" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th hidden>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Status</th>
                                        <th>Fecha de alta</th>
                                        <th>Operaciones</th>
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

<!--modal crear usuario-->
@include('servicemodule::admin.services.modal.create')
<!--modal Editar user-->
@include('servicemodule::admin.services.modal.edit')
<!--modal Eliminar user-->
@include('servicemodule::admin.services.modal.delete')

@section('mis-scripts')
{{-- DATATABLE --}}
@include('servicemodule::admin.services.js.datatable')
{{-- MODAL AJAX --}}
@include('servicemodule::admin.services.js.modal-datos')
{{-- IMAGE --}}
{{-- @include('vehicles::admin.vehicles.js.image-upload') --}}

@stop

@endsection
