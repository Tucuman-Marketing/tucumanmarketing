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
                <div class="card-header">
                    {{-- BUSCADOR --}}
                    @include('posmodule::client.pos.forms.search')
                    {{-- BUSCADOR --}}
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table text-nowrap table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
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

    <!--modal Show-->
    @include('posmodule::client.pos.modal.show')

@section('mis-scripts')
    {{-- DATATABLE --}}
    @include('posmodule::client.pos.js.datatable')
    {{-- SELECT2 --}}
    @include('posmodule::client.pos.js.search')
    {{-- DATEPICKER --}}
    @include('posmodule::client.pos.js.datepicker')
    {{-- SELECT2 --}}
    @include('posmodule::client.pos.js.select2')

@stop

@endsection
