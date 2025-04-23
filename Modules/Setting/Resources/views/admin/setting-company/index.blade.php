@extends('layouts.theme-admin.volgh.index')
@section('content')

{{-- @section('mis-css')
@stop --}}




@section('title-module')
<div>
    <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/user.svg') }}" alt="" width="50"
            height="50" class="responsive"> Seccion de Configuracion - Empresa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('setting.company.index') }}">Empresa</a></li>
    </ol>
</div>
@endsection




@include('flash::message')




<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">


                <h4 class="card-title">
                    <div class="form-actions">
                        <div class="btn-list">
                            <div class="row justify-content-end">
                                @permission('recibos-create')
                                <span data-placement="top" data-toggle="tooltip" title="Crear" class='pr-2'>
                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                        data-target="#modal-create"><i class="fa fa-plus "> </i></button>
                                </span>
                                @endpermission


                                {{-- <span data-placement="top" data-toggle="tooltip"
                                    title="Seleccionar/Deseleccionar Todo" class='pr-2'>
                                    <button type="button" class="btn btn-success" onclick="SeleccionarTodo();"><i
                                            class="fa fa-check" style="color:black;"> </i></button>
                                </span>
                                <span data-placement="top" data-toggle="tooltip" title="Eliminar" class='pr-2'>
                                    <button type="button" class="btn btn-danger" id="enviar" data-toggle="modal"
                                        data-target="#delete-user"><i class="fa fa-trash"> </i></button>
                                </span> --}}
                            </div>
                        </div>
                    </div>
                </h4>



                {{-- <ul class="nav nav-tabs" role="tablist">
                    @include('admin.user.partials.menu')
                </ul> --}}

{{-- BUSCADOR --}}
{{-- @include('receipts::admin.receipt.forms.search') --}}
{{-- BUSCADOR --}}


                {{-- <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Tables</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mydatatable"
                                        class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th scope="col-6">Recibo. N°</th>
                                                <th>Usuario</th>
                                                <th>Total</th>
                                                <th>Status</th>
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
                </div> --}}

                <div class="row">
							<div class="col-lg-12">
									<div class="card-body p-6">
										<div class="panel panel-primary">
											<div class="tab-menu-heading">
												<div class="tabs-menu ">
													<!-- Tabs -->
													@include('setting::admin.component.menu-setting')
												</div>
											</div>
											<div class="panel-body tabs-menu-body">
												<div class="tab-content">

                                                    {{-- create --}}
                                                    @if($settingCompany == null)
                                                        {{ Form::open(['route' => ['setting.company.store'], 'method' => 'POST', 'files'=>True]) }}
                                                        @include('setting::admin.setting-company.forms.create')
                                                        {!!Form::close()!!}
                                                    @else
                                                    {{-- edit --}}
                                                        {{ Form::open(['route' => ['setting.company.update', $settingCompany->id], 'method' => 'PUT', 'files'=>True]) }}
                                                        @include('setting::admin.setting-company.forms.edit')
                                                        {!!Form::close()!!}

                                                        {{-- delete --}}
                                                        <div class="container">
                                                            <div class="row">
                                                            <div class="col text-center">
                                                                <span data-placement="top" data-toggle="tooltip" title="Eliminar" class='pr-2'>
                                                                    <button type="button" class="btn btn-danger center" data-toggle="modal"
                                                                    data-target="#modal-delete">
                                                                        <i class="fas fa-trash-alt color-white"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            </div>
                                                        </div>

                                                    @endif



												</div>
											</div>
										</div>
									</div>

							</div><!-- COL-END -->
						</div>
						<!-- ROW-1 CLOSED -->


            </div>
        </div>
    </div>
</div>





<!--modal crear-->
{{-- @include('receipts::admin.receipt.modal.create')
<!--modal Editar-->
@include('receipts::admin.receipt.modal.edit')
<!--modal Eliminar-->
 --}}
 @include('setting::admin..setting-company.modal.delete')





@section('mis-scripts')
    {{-- DATEPICKER --}}
    @include('setting::admin.setting-company.js.datepicker')
    {{-- FUNCIONES --}}
    {{-- @include('setting::admin.setting-company.js.funciones') --}}
    {{-- BUSCADOR --}}
    {{-- @include('setting::admin.setting-company.js.search') --}}
    {{-- DATATABLE --}}
    {{-- @include('setting::admin.setting-company.js.datatable') --}}
    {{-- SWITCH --}}
    @include('setting::admin.setting-company.js.switch')
    {{-- MODAL AJAX --}}
    @include('setting::admin.setting-company.js.modal-datos')
    {{-- IMAGEN UPLOAD --}}
    @include('setting::admin.setting-company.js.image-upload')
@stop



@endsection
