
@extends('layouts.theme-admin.velvet.index')

@section('other-css')

@stop


@section('title-module')
    <div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
        <h4 class="fw-medium mb-0">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Dashboards</a>
            </li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.permissions.index') }}">Permisos</a></li>
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


                <br><br>

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table  class="table table-striped table-bordered text-nowrap w-100 no-footer table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>Modulo Permisos</th>
                                        <th>view</th>
                                        <th>create</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                        <th>access</th>
                                        {{-- <th>Operaciones</th>  --}}
                                    </tr>
                                </thead>
                                @if($Permissions->first() != null)
                                    @foreach ($Permissions as $key => $module)
                                        <tr>
                                            <td>{!!$key!!}</td>
                                            @foreach ($module as $Permission)
                                            <td>{!!$Permission->slug!!}</td>
                                            @endforeach
                                            {{-- <td>
                                                <span data-placement="top" data-toggle="tooltip" title="ELIMINAR" >
                                                    <button type="button" class="btn btn-danger"  onclick="ModalDelete('{{$key}}');"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                                </span>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                @endif
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




<!--modal create Përmission-->
@include('admin.user.permissions.modal.create')
<!--modal Eliminar roles-->
{{--  @include('admin.user.permissions.modal.delete') --}}


@endsection



@section('other-scripts')
@parent
    @include('admin.user.permissions.js.modal-datos')
@stop

