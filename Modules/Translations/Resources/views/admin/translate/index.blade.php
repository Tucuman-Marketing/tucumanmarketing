@extends('layouts.theme-admin.volgh.index')

@section('content')


@section('title-module')
<div>
    <h1 class="page-title"><img src="{{ url('theme-admin/volgh/assets/images/icon/user.svg') }}" alt="" width="50"
            height="50" class="responsive"> Traducciones</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('translations.index') }}">Traducciones</a></li>
    </ol>
</div>
@endsection




@include('alerts.errors')
@include('alerts.request')
@include('alerts.success')
@include('flash::message')





    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav panel-tabs">
                        {{-- @if(Route::has('setting.company.index')) --}}
                            <li class="nav-item">
                                <a class="nav-link {{ (\Request::route()->uri() == 'translate') ? 'active' : '' }}" href="{{ route('translations.index') }}" role="tab" aria-expanded="false"><img src="{{ url('theme-admin/volgh/assets/images/iconos/setting-company.svg') }}" alt="" width="50" height="50" class="responsive"> Traducciones</a>
                            </li>
                        {{-- @endif --}}

                        {{-- @if(Route::has('setting.email.index')) --}}
                            <li class="nav-item">
                                <a class="nav-link {{ (\Request::route()->uri() == 'setting-email') ? 'active' : '' }}" href="{{ route('language.index') }}" role="tab" aria-expanded="false"><img src="{{ url('theme-admin/volgh/assets/images/iconos/setting-email.svg') }}" alt="" width="50" height="50" class="responsive"> Lenguajes</a>
                            </li>
                        {{-- @entranslatedif --}}


                    </ul>

                    {{-- <h4 class="card-title">Traducciones Existentes</h4> --}}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Traducciones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($multilanguageEntitie as $entitie)
                            <tr>
                                <td>{{ $entitie->id }}</td>
                                <td>{{ $entitie->model }}</td>
                                <td>
                                    @php
                                        $translations = json_decode($entitie->translations, true);
                                    @endphp
                                    <ul>
                                        @foreach($translations as $key => $value)
                                            <li><strong>{{ $key }}:</strong>
                                                <ul>
                                                    @foreach($value as $lang => $translation)
                                                        <li>{{ strtoupper($lang) }}: {{ $translation ?: 'No disponible' }}</li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <!-- Botón de acción para editar -->
                                    <a href="{{ route('translations.edit', $entitie->id) }}" class="btn btn-primary">Editar</a>

                                     <!-- Formulario para eliminar -->
                                    <form action="{{ route('translations.destroy', $entitie->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta traducción?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
