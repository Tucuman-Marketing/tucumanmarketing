@extends('layouts.theme-admin.volgh.index')

{{-- @section('mis-css')
{!!Html::style('theme-admin/volgh/assets/plugins/bootstrap-daterangepicker\daterangepicker.css')!!}
{!!Html::style('theme-admin/volgh/assets/plugins/date-picker/spectrum.css')!!}


@stop --}}




@section('title-module')
<div>
    <h1 class="page-title"><img src="{{ url('theme-admin/volgh/assets/images/icon/user.svg') }}" alt="" width="50"
            height="50" class="responsive"> Seccion de Configuracion - Empresa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('setting.company.index') }}">Empresa</a></li>
    </ol>
</div>
@endsection



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
                                {{-- <span data-placement="top" data-toggle="tooltip" title="Crear" class='pr-2'>
                                    <button type="button" class="btn btn-primary " data-toggle="modal"
                                        data-target="#modal-create"><i class="fa fa-plus "> </i></button>
                                </span> --}}
                            </div>
                        </div>
                    </div>
                </h4>


                {!!Form::open(['route'=>['receipt.update'],'method'=>'PUT','files'=>True])!!}
                @include('receipts::admin.receipt.forms.edit')
                {!!Form::close()!!}


            </div>
        </div>
    </div>
</div>





<!--modal crear-->
{{-- @include('receipts::admin.receipt.modal.create') --}}
<!--modal Editar-->
{{-- @include('receipts::admin.receipt.modal.edit') --}}
<!--modal Eliminar-->
{{-- @include('receipts::admin.receipt.modal.delete') --}}





@section('mis-scripts')
    {{-- DATEPICKER --}}
    @include('receipts::admin.receipt.js.toastr')
    {{-- DATEPICKER --}}
    @include('receipts::admin.receipt.js.datepicker')
    {{-- FUNCIONES --}}
    @include('receipts::admin.receipt.js.funciones')
    {{-- BUSCADOR --}}
    @include('receipts::admin.receipt.js.search')
    {{-- DATATABLE --}}
    @include('receipts::admin.receipt.js.datatable')
    {{-- SWITCH --}}
    @include('receipts::admin.receipt.js.switch')
    {{-- MODAL AJAX --}}
    @include('receipts::admin.receipt.js.modal-datos')

    {{-- CIUDADES --}}
    {{-- {!!Html::script('plugins/ciudades/countrystatecity.js')!!} --}}
    {{-- select --}}
@stop




@endsection
