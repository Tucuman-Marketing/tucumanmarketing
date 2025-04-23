{{-- Extiende la plantilla base --}}
@extends('layouts.theme-admin.volgh.index')

@section('other-css')

@endsection

{{-- Sección del título del módulo --}}
@section('title-module')
    <div>
        <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/plans.svg') }}" alt="" width="50" height="50" class="responsive"> Ingreso de Productos</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{!! URL::to('/product') !!}">Productos</a></li>
        </ol>
    </div>
@endsection

{{-- Contenido principal --}}
@section('content')
@include('flash::message')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <h4 class="card-title">
                        <div class="form-actions">
                            <div class="btn-list">
                                <div class="row justify-content-end">
                                    @permission('product-create')
                                    <span data-placement="top" data-toggle="tooltip" title="Crear Nuevo Producto" class='pr-2'>
                                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#create"><i class="fa fa-plus "> </i></button>
                                    </span>
                                    @endpermission

                                </div>
                            </div>
                        </div>
                    </h4>



                    {{-- BUSCADOR --}}
                    {{-- @include('productos::admin.product.forms.search') --}}
                    {{-- BUSCADOR --}}

                    <br><br>


                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabla de Productos</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
                                            <thead>
                                                <tr>
                                                    {{-- <th></th> --}}
                                                    <th width="1"></th>
                                                     {{-- <th>Nombre</th> --}}
                                                     <th>Nombre</th>
                                                     {{-- <th>Cantidad</th>
                                                     <th>Precio</th>
                                                     <th>Imagen</th>
                                                     <th>Fecha</th> --}}
                                                     <th>OPERACIONES</th>
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




<!--modal crear -->
@include('productos::admin.product.modal.create')
<!--modal editar -->
@include('productos::admin.product.modal.edit')
<!--modal ver -->
@include('productos::admin.product.modal.show')
<!--modal Eliminar -->
@include('productos::admin.product.modal.delete')
<!--modal Eliminar muchas -->
@include('productos::admin.product.modal.massDelete')



@section('mis-scripts')

{{-- include datatable --}}
@include('productos::admin.product.js.datatable')
{{-- include search --}}
@include('productos::admin.product.js.search')
{{-- include datetimepicker --}}
@include('productos::admin.product.js.datepicker')
{{-- include inputmask --}}
@include('productos::admin.product.js.inputmask')
{{-- include select2 --}}
@include('productos::admin.product.js.select2')
{{-- include sweetalert2 --}}


@stop
@endsection
