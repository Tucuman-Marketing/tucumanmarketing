<div class="card custom-card">
    <div class="card-body">
        <div class="row d-flex mt-3">
            {{-- titulo --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Título</span>
                    <input type="text" class="form-control" placeholder="" aria-label="Username"
                        aria-describedby="basic-addon1" id="title" name="title" value="{{ $data->title }}" readonly>
                </div>
            </div>
            <!-- Selector múltiple para Skills -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-tools"></i></span>
                    <span class="input-group-text">Skills</span>
                    <select class="form-control select-2" name="skills[]" id="skills" multiple disabled>
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}" {{ in_array($skill->id, $selectedSkills) ? 'selected' : '' }}>
                                {{ $skill->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Selector múltiple para Tags -->
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-tags"></i></span>
                    <span class="input-group-text">Tags</span>
                    <select class="form-control select-2" name="tags[]" id="tags" multiple disabled>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- categorias --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-buromobelexperte"></i></span>
                    <span class="input-group-text" id="basic-addon1">Categoría</span>
                    <select class="form-control select-2" name="category" id="category" disabled>
                        <option value="">--Selecciona--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $selectedCategory ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Estatus --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fab fa-bandcamp"></i></span>
                    <span class="input-group-text">Estatus</span>
                    <select class="form-control select-2" name="status" id="status" disabled>
                        <option value="">--Selecciona--</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ (old('status') ?? $selectedStatus) == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- tipo de trabajo --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                    <span class="input-group-text">Tipo de Trabajo</span>
                    <select class="form-control select-2" name="work_type" id="work_type" disabled>
                        <option value="">--Selecciona--</option>
                        @foreach (['full_time' => 'Tiempo completo', 'part_time' => 'Medio tiempo', 'freelance' => 'Freelance', 'internship' => 'Prácticas', 'remote' => 'Remoto', 'other' => 'Otro'] as $key => $value)
                            <option value="{{ $key }}" {{ (old('work_type') ?? $data->work_type) == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- modo de trabajo --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="input-group-text">Modo de Trabajo</span>
                    <select class="form-control select-2" name="work_mode" id="work_mode" disabled>
                        <option value="">--Selecciona--</option>
                        @foreach (['presential' => 'Presencial', 'remote' => 'Remoto', 'hybrid' => 'Híbrido'] as $key => $value)
                            <option value="{{ $key }}" {{ (old('work_mode') ?? $data->work_mode) == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- ubicacion --}}
            <div class="mt-3 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="input-group-text">Ubicacion</span>
                    <select class="form-control select-2" name="country" id="country" disabled>
                        @foreach (config('form.select.countriesLatam') as $key => $value)
                            <option value="{{ $key }}" {{ (old('country') ?? $data->country) == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="card custom-card mt-3">
    <div class="card-header">
        <div class="card-title">
            Contenido del Puesto de Trabajo
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">
            <div class="form-group">
                <textarea class="form-control " id="description" name="description" readonly>{!! $data->description !!}</textarea>
            </div>
        </div>
    </div>
</div>
