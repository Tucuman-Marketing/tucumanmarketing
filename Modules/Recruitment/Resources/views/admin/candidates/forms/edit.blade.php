<input type="text" name="uuid" id="uuid_edit" hidden="" value="{{$data->uuid}}">
<div id="input_hidden_edit"></div> <!-- Contenedor para campos ocultos en el formulario de edición -->

{{-- habilidades --}}
<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Habilidades
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">
            {{-- Skills --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-tools"></i></span>
                    <span class="input-group-text">Skills</span>
                    <select class="form-control select-2" name="skills[]" id="skills" multiple>
                        @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}" {{ in_array($skill->id, $data->skills->pluck('id')->toArray())
                            ? 'selected' : '' }}>{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- datos Personales --}}
<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Datos Personales
        </div>
    </div>

    <div class="card-body">
        <div class="row d-flex mt-3">

            {{-- name --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre" id="name" name="name"
                        value="{{ $data->name }}" required>
                </div>
            </div>

            {{-- LastName --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <span class="input-group-text" id="basic-addon1">Apellido</span>
                    <input type="text" class="form-control" placeholder="Ingrese el apellido" id="last_name"
                        name="last_name" value="{{ $data->last_name }}" required>
                </div>
            </div>

            {{-- email --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="email" class="form-control" placeholder="Ingrese el email" id="email" name="email"
                        value="{{ $data->email }}" required>
                </div>
            </div>

            {{-- phone --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                    <span class="input-group-text" id="basic-addon1">Teléfono</span>
                    <input type="text" class="form-control" placeholder="Ingrese el teléfono" id="phone" name="phone"
                        value="{{ $data->phone }}" required>
                </div>
            </div>

            {{-- Gender --}}
            {{-- <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                    <span class="input-group-text">Género</span>
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="" disabled>--Selecciona--</option>
                        <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>Masculino</option>
                        <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>
            </div> --}}

        </div>
    </div>
</div>

{{-- estudios --}}
<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Estudios
        </div>
    </div>

    <div class="card-body">
        <!-- Primer Estudio -->
        <div class="row d-flex mt-3">
            <!-- Título -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Título</span>
                    <input type="text" class="form-control" placeholder="Ingrese el titulo" id="title_1" name="title"
                        required>
                </div>
            </div>
            <!-- Nivel máximo de estudios -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Nivel máximo de estudios</span>
                    <select class="form-control" name="education_level_1" id="education_level_1" required>
                        @foreach(config('form.select.education_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{ $label }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Estado actual de estudio -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Estado actual de estudio</span>
                    <select class="form-control" name="education_state_1" id="education_state_1" required>
                        @foreach(config('form.select.education_status') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{ $label }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Línea de separación -->
        <hr>

        <!-- Segundo Estudio -->
        <div class="row d-flex mt-3">
            <!-- Título -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Título</span>
                    <input type="text" class="form-control" placeholder="Ingrese el titulo" id="title_2" name="title"
                        required>
                </div>
            </div>
            <!-- Nivel máximo de estudios -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Nivel máximo de estudios</span>
                    <select class="form-control" name="education_level_2" id="education_level_2" required>
                        @foreach(config('form.select.education_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{ $label }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Estado actual de estudio -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Estado actual de estudio</span>
                    <select class="form-control" name="education_state_2" id="education_state_2" required>
                        @foreach(config('form.select.education_status') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{ $label }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Línea de separación -->
        <hr>

        <!-- Tercer Estudio -->
        <div class="row d-flex mt-3">
            <!-- Título -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Título</span>
                    <input type="text" class="form-control" placeholder="Ingrese el titulo" id="title_3" name="title"
                        required>
                </div>
            </div>
            <!-- Nivel máximo de estudios -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Nivel máximo de estudios</span>
                    <select class="form-control" name="education_level_3" id="education_level_3" required>
                        @foreach(config('form.select.education_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{ $label }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Estado actual de estudio -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Estado actual de estudio</span>
                    <select class="form-control" name="education_state_3" id="education_state_3" required>
                        @foreach(config('form.select.education_status') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{ $label }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- idiomas --}}
<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Idiomas
        </div>
    </div>
    <div class="card-body">

        <!-- Primer Idioma -->
        <div class="row d-flex mt-3">
            <!-- Idioma 1 -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Idioma 1</span>
                    <select class="form-control" name="language_1" id="language_1" required>
                        @foreach(config('form.select.languages') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{
                            $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Nivel de Idoma 1 --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Nivel de idioma 1</span>
                    <select class="form-control" name="language_level_1" id="language_level_1" required>
                        @foreach(config('form.select.language_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{
                            $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Línea de separación -->
        <hr>

        <!-- Segundo Idioma -->
        <div class="row d-flex mt-3">
            <!-- Idioma 2 -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Idioma 2</span>
                    <select class="form-control" name="language_2" id="language_2" required>
                        @foreach(config('form.select.languages') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{
                            $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Nivel de Idoma 2 --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Nivel de idioma 2</span>
                    <select class="form-control" name="language_level_2" id="language_level_2" required>
                        @foreach(config('form.select.language_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{
                            $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Línea de separación -->
        <hr>

        <!-- Tercer Idioma -->
        <div class="row d-flex mt-3">
            <!-- Idioma 3 -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Idioma 3</span>
                    <select class="form-control" name="language_3" id="language_3" required>
                        @foreach(config('form.select.languages') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{
                            $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Nivel de Idoma 3 --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Nivel de idioma 3</span>
                    <select class="form-control" name="language_level_3" id="language_level_3" required>
                        @foreach(config('form.select.language_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level')==$value ? 'selected' : '' }}>{{
                            $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Redes Sociales --}}
<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Redes Sociales
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">

            <!-- URL LinkedIn -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <label for="linkedin" class="form-label">URL LinkedIn</label>
                <input type="text" id="linkedin" name="linkedin" class="form-control" placeholder="LinkedIn">
            </div>

            <!-- Otra Red Social 1 -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <label for="social_1" class="form-label">Otra Red Social</label>
                <input type="text" id="social_1" name="social_1" class="form-control" placeholder="Otra Red Social">
            </div>

            <!-- Otra Red Social 2 -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3">
                <label for="social_2" class="form-label">Otra Red Social</label>
                <input type="text" id="social_2" name="social_2" class="form-control" placeholder="Otra Red Social">
            </div>


        </div>
    </div>
</div>

{{-- Cargar Archivo --}}
<div class="card custom-card">
    <div class="card-body">
        <div class="row d-flex mt-3">

            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Cargar CV
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card custom-card product-card">
                                <div class="card-body d-flex justify-content-center align-items-center flex-wrap">
                                    @if($data->getFirstMedia('file'))
                                    <div class="image-container position-relative">
                                        <span class="border border-primary border-container rounded">
                                            @if($data->getFirstMedia('file')->mime_type == 'application/pdf')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/pdf.svg') }}"
                                                alt="PDF" class="img-fluid rounded">
                                            @elseif($data->getFirstMedia('file')->mime_type == 'application/zip')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/zip.svg') }}"
                                                alt="ZIP" class="img-fluid rounded">
                                            @elseif($data->getFirstMedia('file')->mime_type ==
                                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/word.svg') }}"
                                                alt="word" class="img-fluid rounded">
                                            @elseif($data->getFirstMedia('file')->mime_type ==
                                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/xlsx.svg') }}"
                                                alt="XLSX" class="img-fluid rounded">
                                            @elseif($data->getFirstMedia('file')->mime_type ==
                                            'application/x-rar-compressed')
                                            <img src="{{ asset('theme-admin/velvet/assets/images/icon/files/rar.svg') }}"
                                                alt="RAR" class="img-fluid rounded">
                                            @endif
                                        </span>
                                        <div class="close-image position-absolute">
                                            <button type="button" data-id="{{ $data->getFirstMedia('file')->id }}"
                                                class="btn btn-delete"
                                                onclick="deleteMedia({{ $data->getFirstMedia('file')->id }}, this)"><i
                                                    class="ri-close-line"></i></button>
                                        </div>
                                    </div>
                                    @else
                                    <div class="image-container position-relative">
                                        <span class="border border-primary border-container rounded">
                                            <img src="{{ asset('theme-admin/velvet/assets/images/sin-imagen.jpg') }}" alt="..."
                                                class="img-fluid  rounded">
                                        </span>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <!--  File Simple  -->
                        <input type="file" class="filepond_file_single" name="file_single" data-form-type="edit" />
                        <p class="help-block">{{ $errors->first('file.*') }}</p>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
