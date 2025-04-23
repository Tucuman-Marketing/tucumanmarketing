@extends('layouts.theme-admin.velvet.index')
@section('content')

@section('title-module')
    <div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
        <h4 class="fw-medium mb-0">Perfil de usuario</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-white-50">Usuarios</li>
            <li class="breadcrumb-item active" aria-current="page">Perfil de usuario</li>
        </ol>
    </div>
@endsection

@include('flash::message')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @include('client.user.setting.forms.profile')

            </div>
        </div>
    </div>
</div>

<!--modal editar Perfil (Avatar)-->
@include('client.user.setting.modal.editImage')

@section('other-scripts')
{{-- FILE-UPLOAD --}}
@include('client.user.setting.js.file-upload')
@stop

@endsection
