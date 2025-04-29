<!-- Sección Datos Personales -->
<div class="card border-info">
    <div class="card-header bg-info text-white">
        <h4>Datos Personales</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <!-- Nombre -->
            <div class="col-md-4 mt-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" value="{{  old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Apellido -->
            <div class="col-md-4 mt-3">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" id="last_name" name="last_name" class="form-control"
                    placeholder="Apellido" value="{{ old('last_name') }}">
                @error('last_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="col-md-4 mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Teléfono -->
            <div class="col-md-4 mt-3">
                <label for="telephone" class="form-label">Teléfono</label>
                <input type="text" id="telephone" name="telephone" class="form-control"
                    placeholder="Teléfono" value="{{ old('telephone') }}">
                @error('telephone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- País -->
            <div class="col-md-4 mt-3">
                <label for="country" class="form-label">País</label>
                <select id="country" name="country" class="form-select">
                    @foreach (config('form.select.countriesLatam') as $key => $value)
                        <option value="{{ $key }}" {{ old('country') == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                @error('country')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Género -->
            {{-- <div class="col-md-4 mt-3">
                <label for="gender" class="form-label">Género</label>
                <select id="gender" name="gender" class="form-select">
                    <option value>Selecciona tu
                        género</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </div> --}}
        </div>
    </div>
</div>

<!-- Sección Estudios -->
<div class="card border-info mt-4">
    <div class="card-header bg-info text-white">
        <h4>Estudios</h4>
    </div>
    <div class="card-body">

        <!-- Primer Estudio -->
        <div class="row g-3">
            <!-- Título -->
            <div class="col-md-4 mt-3">
                <label for="title_1" class="form-label">Título</label>
                <input type="text" id="title_1" name="title_1" class="form-control"
                    placeholder="Título">
            </div>

            <!-- Nivel máximo de estudios -->
            <div class="col-md-4 mt-3">
                <label for="education_level_1" class="form-label">Nivel máximo de
                    estudios</label>
                <select id="education_level_1" name="education_level_1" class="form-select">
                    @foreach(config('form.select.education_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level_1')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Estado actual de estudio -->
            <div class="col-md-4 mt-3">
                <label for="education_state_1" class="form-label">Estado actual de
                    estudio</label>
                <select id="education_state_1" name="education_state_1" class="form-select">
                    @foreach(config('form.select.education_status') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_state_1')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Línea de separación -->
        <hr>

        <!-- Segundo Estudio -->
        <div class="row g-3">
            <!-- Título -->
            <div class="col-md-4 mt-3">
                <label for="title2" class="form-label">Título</label>
                <input type="text" id="title_2" name="title_2" class="form-control"
                    placeholder="Título">
            </div>

            <!-- Nivel máximo de estudios -->
            <div class="col-md-4 mt-3">
                <label for="education_level_2" class="form-label">Nivel máximo de
                    estudios</label>
                <select id="education_level_2" name="education_level_2" class="form-select">
                    @foreach(config('form.select.education_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level_2')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Estado actual de estudio -->
            <div class="col-md-4 mt-3">
                <label for="education_state_2" class="form-label">Estado actual de
                    estudio</label>
                <select id="education_state_2" name="education_state_2" class="form-select">
                    @foreach(config('form.select.education_status') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_state_2')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Línea de separación -->
        <hr>

        <!-- Tercer Estudio -->
        <div class="row g-3">
            <!-- Título -->
            <div class="col-md-4 mt-3">
                <label for="title3" class="form-label">Título</label>
                <input type="text" id="title_3" name="title_3" class="form-control"
                    placeholder="Título">
            </div>

            <!-- Nivel máximo de estudios -->
            <div class="col-md-4 mt-3">
                <label for="education_level_3" class="form-label">Nivel máximo de
                    estudios</label>
                <select id="education_level_3" name="education_level_3" class="form-select">
                    @foreach(config('form.select.education_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_level_3')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Estado actual de estudio -->
            <div class="col-md-4 mt-3">
                <label for="education_state_3" class="form-label">Estado actual de
                    estudio</label>
                <select id="education_state_3" name="education_state_3" class="form-select">
                    @foreach(config('form.select.education_status') as $value => $label)
                        <option value="{{ $value }}" {{ old('education_state_3')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
</div>

<!-- Sección Habilidades -->
<div class="card border-info mt-4">
    <div class="card-header bg-info text-white">
        <h4>Habilidades</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <!-- Skills -->
            <div class="col-md-12 mt-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-stack-exchange"></i></span>
                    <span class="input-group-text">Skills</span>
                    <select class="form-control select-2" name="skills[]" multiple>
                        @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}" {{collect(old('skills'))->contains($skill->id) ? 'selected' : '' }}>{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('skills')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>

<!-- Sección Idiomas -->
<div class="card border-info mt-4">
    <div class="card-header bg-info text-white">
        <h4>Idiomas</h4>
    </div>
    <div class="card-body">

        <!-- Primer Idioma -->
        <div class="row g-3">
            <!-- Idioma 1 -->
            <div class="col-md-6">
                <label for="language_1" class="form-label">Idioma 1</label>
                <select id="language_1" name="language_1" class="form-select">
                    @foreach(config('form.select.languages') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_1')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nivel de Idioma 1 -->
            <div class="col-md-6">
                <label for="language_level_1" class="form-label">Nivel de idioma
                    1</label>
                <select id="language_level_1" name="language_level_1" class="form-select">
                    @foreach(config('form.select.language_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_level_1')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Línea de separación -->
        <hr>

        <!-- Segundo Idioma -->
        <div class="row g-3">
            <!-- Idioma 2 -->
            <div class="col-md-6 mt-3">
                <label for="language_2" class="form-label">Idioma 2</label>
                <select id="language_2" name="language_2" class="form-select">
                    @foreach(config('form.select.languages') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_2')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nivel de Idioma 2 -->
            <div class="col-md-6 mt-3">
                <label for="language_level_2" class="form-label">Nivel de idioma
                    2</label>
                <select id="language_level_2" name="language_level_2" class="form-select">
                    @foreach(config('form.select.language_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_level_2')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Línea de separación -->
        <hr>

        <!-- Tercer Idioma -->
        <div class="row g-3">
            <!-- Idioma 3 -->
            <div class="col-md-6 mt-3">
                <label for="language_3" class="form-label">Idioma 3</label>
                <select id="language_3" name="language_3" class="form-select">
                    @foreach(config('form.select.languages') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_3')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nivel de Idioma 3 -->
            <div class="col-md-6 mt-3">
                <label for="language_level_3" class="form-label">Nivel de idioma
                    3</label>
                <select id="language_level_3" name="language_level_3" class="form-select">
                    @foreach(config('form.select.language_levels') as $value => $label)
                        <option value="{{ $value }}" {{ old('language_level_3')==$value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
</div>

<!-- Sección Redes Sociales -->
<div class="card border-info mt-4">
    <div class="card-header bg-info text-white">
        <h4>Redes Sociales</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <!-- URL LinkedIn -->
            <div class="col-md-4 mt-3">
                <label for="linkedin" class="form-label">URL
                    LinkedIn</label>
                <input type="text" id="linkedin" name="linkedin" class="form-control"
                    placeholder="LinkedIn">
            </div>

            <!-- Otra Red Social 1 -->
            <div class="col-md-4 mt-3">
                <label for="social_1" class="form-label">Behance</label>
                <input type="text" id="social_1" name="social_1" class="form-control"
                    placeholder="Behance">
            </div>

            <!-- Otra Red Social 2 -->
            <div class="col-md-4 mt-3">
                <label for="social_2" class="form-label">GitHub</label>
                <input type="text" id="social_2" name="social_2" class="form-control"
                    placeholder="GitHub">
            </div>
        </div>
    </div>
</div>

{{-- Esto es parte de la cara de Archivos --}}
<div id="input_hidden"></div>

<!-- Sección Cargar CV -->
<div class="card border-info mt-4">
    <div class="card-header bg-info text-white">
        <h4>Subir Archivos</h4>
    </div>
    <div class="card-body">
        <div class="col-12 mt-3">
            <label for="file_single" class="form-label">Cargar CV</label>
            <input type="file" class="filepond_file_single form-control" name="file_single"
                data-form-type="create" />
            <p class="help-block">{{
                $errors->first('file.*') }}</p>
        </div>
        @error('file_single')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
{{-- <script>
    document.querySelector('form').addEventListener('submit', function (e) {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const telephone = document.getElementById('telephone').value.trim();

        if (!name || !email || !telephone) {
            e.preventDefault();
            alert('Por favor, completa todos los campos obligatorios.');
        }
    });
</script> --}}