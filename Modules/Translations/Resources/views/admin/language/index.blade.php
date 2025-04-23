@extends('layouts.theme-admin.volgh.index')

@section('content')
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
                    <h4 class="card-title">Lenguajes Disponibles</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Estado</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $language)
                            <tr>
                                <td>{{ $language->id }}</td>
                                <td>{{ $language->code }}</td>
                                <td>{{ $language->name }}</td>
                                <td>
                                    <input type="checkbox" class="language-status-switch" data-id="{{ $language->id }}" {{ $language->is_active ? 'checked' : '' }}>
                                </td>
                                {{-- <td>
                                    <!-- Acciones como editar o eliminar -->
                                    <a href="{{ route('language.edit', $language->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('language.destroy', $language->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar este lenguaje?')">Eliminar</button>
                                    </form>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('mis-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('.language-status-switch').on('change', function () {
            var languageId = $(this).data('id');
            var isActive = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: '/language/' + languageId + '/edit-status',
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}',
                    is_active: isActive
                },
                success: function(response) {
                    // Manejo del éxito
                    alert('Estado actualizado');
                },
                error: function(response) {
                    // Manejo del error
                    alert('Error al actualizar el estado');
                }
            });
        });
    });
</script>
@endsection
