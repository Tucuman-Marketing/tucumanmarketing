@extends('layouts.theme-admin.volgh.index')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Editar Traducción</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('translations.update', $multilanguageEntitie->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @php
                            $translations = json_decode($multilanguageEntitie->translations, true);
                        @endphp

                        @foreach($translations as $key => $value)
                            <div class="form-group">
                                <label>{{ ucfirst($key) }}</label>
                                @foreach($value as $lang => $translation)
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ strtoupper($lang) }}</span>
                                        </div>
                                        <input type="text" class="form-control" name="translations[{{ $key }}][{{ $lang }}]" value="{{ $translation }}">
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
