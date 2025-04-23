@extends('layouts.theme-admin.volgh.index')

@section('title-module')
    <div>
        <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/reporte.svg') }}" alt=""
                width="50" height="50" class="responsive"> Operaciones Club Lavacar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{!! URL::to('/admin/washeds') !!}">Operaciones</a></li>
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

                                <span data-placement="top" data-toggle="tooltip" title="Crear Lavado" class='pr-2'>
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
                @include('posmodule::admin.pos.forms.search')
                {{-- BUSCADOR --}}

                    <br><br>

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            {{-- <th>Operaciones</th> --}}
                                            <th>Cliente</th>
                                            <th>Vehiculo</th>
                                            <th>Tipo</th>
                                            <th>Patente</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Fecha de Lavado</th>
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
    @include('posmodule::admin.pos.modal.create')
    <!--modal Show-->
    @include('posmodule::admin.pos.modal.show')
    <!--modal Editar-->
    @include('posmodule::admin.pos.modal.edit')
    <!--modal Eliminar-->
    {{-- @include('posmodule::admin.pos.modal.delete') --}}


    @section('mis-scripts')
    {{-- DATATABLE --}}
    @include('posmodule::admin.pos.js.datatable')
    {{-- SELECT2 --}}
    @include('posmodule::admin.pos.js.select2')
    {{-- SELECT2 --}}
    @include('posmodule::admin.pos.js.search')
    @stop

@endsection
