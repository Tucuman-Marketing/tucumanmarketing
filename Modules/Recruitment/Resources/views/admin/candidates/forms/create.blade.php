<div id="input_hidden"></div>


{{-- habilidades --}}
<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Habilidades
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">

            <!-- Selector múltiple para Skills -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-tools"></i></span>
                    <span class="input-group-text">Skills</span>
                    <select class="form-control select-2" name="skills[]" id="skills" multiple>
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
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
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre" id="name" name="name" required>
                </div>
            </div>

            {{-- LastName --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <span class="input-group-text" id="basic-addon1">Apellido</span>
                    <input type="text" class="form-control" placeholder="Ingrese el apellido" id="last_name" name="last_name" required>
                </div>
            </div>

            {{-- email --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="email" class="form-control" placeholder="Ingrese el email" id="email" name="email" required>
                </div>
            </div>

            {{-- phone --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                    <span class="input-group-text" id="basic-addon1">Teléfono</span>
                    <input type="text" class="form-control" placeholder="Ingrese el teléfono" id="phone" name="phone" required>
                </div>
            </div>

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
                    <input type="text" class="form-control" placeholder="Ingrese el titulo" id="title_1" name="title_1" required>
                </div>
            </div>
            <!-- Nivel máximo de estudios -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Nivel máximo de estudios</span>
                    <select class="form-control" name="education_level_1" id="education_level_1" required>
                        @foreach(config('form.select.education_levels') as $value => $label)
                            <option value="{{ $value }}" {{ old('education_level_1')==$value ? 'selected' : '' }}>{{ $label }}</option>
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
                        <option value="{{ $value }}" {{ old('education_state_1')==$value ? 'selected' : '' }}>{{ $label }}</option>
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
                    <input type="text" class="form-control" placeholder="Ingrese el titulo" id="title_2" name="title_2" required>
                </div>
            </div>
            <!-- Nivel máximo de estudios -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Nivel máximo de estudios</span>
                    <select class="form-control" name="education_level_2" id="education_level_2" required>
                        @foreach(config('form.select.education_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level_2')==$value ? 'selected' : '' }}>{{ $label }}</option>
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
                        <option value="{{ $value }}" {{ old('education_state_2')==$value ? 'selected' : '' }}>{{ $label }}</option>
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
                    <input type="text" class="form-control" placeholder="Ingrese el titulo" id="title_3" name="title_3" required>
                </div>
            </div>
            <!-- Nivel máximo de estudios -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    <span class="input-group-text">Nivel máximo de estudios</span>
                    <select class="form-control" name="education_level_3" id="education_level_3" required>
                        @foreach(config('form.select.education_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level_3')==$value ? 'selected' : '' }}>{{ $label }}</option>
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
                        <option value="{{ $value }}" {{ old('education_state_3')==$value ? 'selected' : '' }}>{{ $label }}</option>
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
                    <span class="input-group-text"><i class="fas fa-language"></i></span>
                    <span class="input-group-text">Idioma 1</span>
                    <select class="form-control" name="language_1" id="language_1" required>
                        @foreach(config('form.select.languages') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_1')==$value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Nivel de Idioma 1 --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-signal"></i></span>
                    <span class="input-group-text">Nivel de idioma 1</span>
                    <select class="form-control" name="language_level_1" id="language_level_1" required>
                        @foreach(config('form.select.language_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_level_1')==$value ? 'selected' : '' }}>{{ $label }}</option>
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
                    <span class="input-group-text"><i class="fas fa-language"></i></span>
                    <span class="input-group-text">Idioma 2</span>
                    <select class="form-control" name="language_2" id="language_2" required>
                        @foreach(config('form.select.languages') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_2')==$value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Nivel de Idioma 2 --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-signal"></i></span>
                    <span class="input-group-text">Nivel de idioma 2</span>
                    <select class="form-control" name="language_level_2" id="language_level_2" required>
                        @foreach(config('form.select.language_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_level_2')==$value ? 'selected' : '' }}>{{ $label }}</option>
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
                    <span class="input-group-text"><i class="fas fa-language"></i></span>
                    <span class="input-group-text">Idioma 3</span>
                    <select class="form-control" name="language_3" id="language_3" required>
                        @foreach(config('form.select.languages') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_3')==$value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Nivel de Idioma 3 --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-signal"></i></span>
                    <span class="input-group-text">Nivel de idioma 3</span>
                    <select class="form-control" name="language_level_3" id="language_level_3" required>
                        @foreach(config('form.select.language_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_level_3')==$value ? 'selected' : '' }}>{{ $label }}</option>
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

{{-- CV --}}
<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Cargar CV
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">
             <!-- File Single -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                <label for="file_single" class="form-label">subir archivo</label>
                <input type="file" class="filepond_file_single" name="file_single" data-form-type="create" />
                <p class="help-block">{{ $errors->first('file.*') }}</p>
            </div>
        </div>
    </div>
</div>

{{-- <div class="card custom-card mt-3">
    <div class="card-header">
        <div class="card-title">
            Contenido del Puesto de Trabajo
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">
            <div class="form-group mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                <textarea class="form-control ckeditor" id="description" name="description"></textarea>
            </div>
        </div>
    </div>
</div> --}}


