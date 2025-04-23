@extends('layouts.theme-admin.volgh.index')

@section('title-module')
<div>
    <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/plans.svg') }}" alt="" width="50"
            height="50" class="responsive"> Seccion de Planes</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{!! URL::to('/admin/subscriptions-plans') !!}">Planes</a></li>
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

                            <span data-placement="top" data-toggle="tooltip" title="Crear vehiculo" class='pr-2'>
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
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Duración</th>
                                        <th>tipo</th>
                                        <th>Fecha de alta</th>
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

<!--modal crear-->
@include('subscriptionsmodule::admin.subscriptions_plans.modal.create')
<!--modal Show-->
@include('subscriptionsmodule::admin.subscriptions_plans.modal.show')
<!--modal Editar-->
@include('subscriptionsmodule::admin.subscriptions_plans.modal.edit')
<!--modal Eliminar-->
@include('subscriptionsmodule::admin.subscriptions_plans.modal.delete')

@section('mis-scripts')
{{-- DATATABLE --}}
@include('subscriptionsmodule::admin.subscriptions_plans.js.datatable')
{{-- SELECT2 --}}
@include('subscriptionsmodule::admin.subscriptions_plans.js.select2')
@stop

@endsection