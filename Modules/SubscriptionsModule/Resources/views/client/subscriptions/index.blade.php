{{-- Extiende la plantilla base --}}
@extends('layouts.theme-admin.volgh.index')

@section('other-css')

@endsection

{{-- Sección del título del módulo --}}
@section('title-module')
<div>
    <h1 class="page-title">

        <img src="{{ asset('theme-admin/volgh/assets/images/icon/credit-card.svg') }}" alt="" width="50"
            height="50" class="responsive">
            Mis Suscripciones</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{!! URL::to('/client/subscriptions') !!}">Suscripción Cliente</a></li>
    </ol>
</div>
@endsection

{{-- Contenido principal --}}
@section('content')
@include('flash::message')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-end">
                <div class="form-actions">
                    <div class="btn-list">
                        <div class="row justify-content-end">

                            <span data-placement="top" data-toggle="tooltip" title="Cargar una Suscripción"
                                class='pr-2'>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                    data-target="#create"> <i class="fa-regular fa-credit-card"></i>
                                    Cargar una Suscripción <i class="fa fa-plus "> </i>
                                </button>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                {{-- BUSCADOR --}}
                {{-- @include('cashflow::admin.cashflow.forms.search') --}}
                {{-- BUSCADOR --}}

                <br><br>

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th width="1"></th>
                                                <th>OPERACIONES</th>
                                                <th>Plan Seleccionado</th>
                                                <th>Vehiculo Seleccionado</th>
                                                <th>Tipo</th>
                                                <th>Fecha de Inicio</th>
                                                <th>Estado</th>
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
    </div>
</div>

<!--modal create-->
@include('subscriptionsmodule::client.subscriptions.modal.create')
<!--modal delete -->
@include('subscriptionsmodule::client.subscriptions.modal.delete')
<!--modal cancel -->
@include('subscriptionsmodule::client.subscriptions.modal.cancel')
<!--modal massDelete -->
@include('subscriptionsmodule::client.subscriptions.modal.massDelete')

@section('mis-scripts')

{{-- include datatable --}}
@include('subscriptionsmodule::client.subscriptions.js.datatable')
@include('subscriptionsmodule::client.subscriptions.js.select2')

@stop
@endsection
