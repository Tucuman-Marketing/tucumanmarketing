@extends('layouts.theme-admin.volgh.index')
@section('content')

{{-- @section('mis-css')
@stop --}}




@section('title-module')
<div>
    <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/user.svg') }}" alt="" width="50"
            height="50" class="responsive"> Seccion de Configuracion - Email</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('setting.email.index') }}">Email</a></li>
    </ol>
</div>
@endsection




@include('flash::message')




<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
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
                                                    @if($settingEmail == null)
                                                        {{ Form::open(['route' => ['setting.email.store'], 'method' => 'POST', 'files'=>True]) }}
                                                        @include('setting::admin.setting-email.forms.create')
                                                        {!!Form::close()!!}
                                                    @else
                                                    {{-- edit --}}
                                                        {{ Form::open(['route' => ['setting.email.update'], 'method' => 'PUT', 'files'=>True]) }}
                                                        @include('setting::admin.setting-email.forms.edit')
                                                        {!!Form::close()!!}

                                                        {{-- delete --}}
                                                        <div class="container">
                                                            <div class="row">
                                                            <div class="col text-center">
                                                                <span data-placement="top" data-toggle="tooltip" title="Eliminar Datos" class='pr-2'>
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






<!--modal Eliminar-->
 @include('setting::admin.setting-email.modal.delete')





@section('mis-scripts')
@stop



@endsection
