@extends('webcontent::website.rrhh.layouts.index')

@section('other-css')
<style>
    .wrp_post {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden; /* Oculta contenido que exceda la altura */
        display: flex;
        flex-direction: column; /* Alinea elementos en columna */
        justify-content: space-between; /* Distribuye espacio entre los elementos */
    }

    .form_group {
        display: flex;
        flex-direction: column;
    }

    .label_widget {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 10px;
    }

    .row {
        display: flex;
        justify-content: center; /* Centra los botones horizontalmente */
    }

    .apply-button {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        background: linear-gradient(135deg, #6f42c1, #af4f9d); /* Degradado en el botón */
        color: white;
        border: none;
        display: inline-block;
    }

    .apply-button:hover {
        background: linear-gradient(135deg, #6f42c1, #af4f9d); /* Degradado en el botón */
        color: white; /* Mantén el texto en blanco */
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Opcional: añade sombra para efecto de profundidad */
    }

    .apply-button i {
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .form_group {
            margin-bottom: 15px;
        }

        .apply-button {
            width: 100%;
            margin-bottom: 10px;
        }
    }


    </style>

@stop


@section('content')
@include('flash::message')

<header class="head_page">
    {{-- <span class="element_two">
        <img src="{{asset('theme-front/globaltalentsphere/img/cub_two.png')}}">
    </span> --}}
    <span class="element_three">
        <img src="{{asset('theme-front/globaltalentsphere/img/cub_three.png')}}">
    </span>
    {{-- <span class="element_thirteen">
        <img src="{{asset('theme-front/globaltalentsphere/img/icons/cub_thirteen.png')}}">
    </span> --}}
    <div class="container title_h">
        <div class="block_title">
            <h1>{{$title}}</h1>
            <p> <strong>Encuentra la mejor oportunidad para ti en toda Latam. </strong>Explora nuestras ofertas de empleo y descubre cómo puedes dar el siguiente paso en tu carrera.

            </p>
        </div>
    </div>
</header>
<br>

<div class="post_content container">
    <div class="row">
        <div class="posts_s col-lg-9">
            {{-- Search --}}
            <div class="posts_standart quotes">
                <div class="wrp_post">
                    <form class="search_widget" action="{{ route('public.jobSearch')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="rpl_b row">
                            <!-- Buscar trabajo -->
                            <div class="form_group col-12 mb-3">
                                <label for="search_title" class="label_widget">Buscar trabajo</label>
                                <input type="text" id="search_title" name="search_title" class="form-control" placeholder="Título del trabajo">
                            </div>

                            <!-- Modalidad de trabajo -->
                            <div class="form_group col-md-6 mb-3">
                                <label for="search_work_mode" class="label_widget">Modalidad del puesto</label>
                                <select id="search_work_mode" name="search_work_mode" class="select_widget form-control">
                                    <option value>-- Selecciona una opción --</option>
                                    @foreach (\Modules\Recruitment\Entities\RecruitmentJobs::WORK_MODE_CATALOG as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tipo de trabajo -->
                            <div class="form_group col-md-6 mb-3">
                                <label for="search_type" class="label_widget">Tipo de empleo</label>
                                <select id="search_type" name="search_type" class="select_widget form-control">
                                    <option value>-- Selecciona una opción --</option>
                                    @foreach (\Modules\Recruitment\Entities\RecruitmentJobs::WORK_TYPE_CATALOG as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Categoría -->
                            <div class="form_group col-md-6 mb-3">
                                <label for="search_category" class="label_widget">Categoría</label>
                                <select id="search_category" name="search_category" class="select_widget form-control">
                                    <option value="">-- Selecciona una opción --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Ubicación -->
                            <div class="form_group col-md-6 mb-3">
                                <label for="search_country" class="label_widget">País</label>
                                <select id="search_country" name="search_country" class="select_widget form-control">
                                    <option value="">-- Selecciona un país --</option>
                                    @foreach (config('form.select.countriesLatam') as $code => $name)
                                        <option value="{{ $code }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>



                        </div>

                        <div class="row justify-content-center mt-3">
                            <div class="col-auto">
                                <button type="submit" class="apply-button btn btn-primary">Buscar</button><br><br>
                            </div>
                            <br>
                            <div class="col-auto">
                                <button type="button" class="apply-button btn btn-danger" onclick="clearFormAndRedirect()">
                                    <i class="fas fa-trash"></i> Limpiar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            {{-- Jobs --}}
            @foreach($jobs as $key => $item)
            <div class="posts_standart quotes">
                <div class="wrp_post p-4 mb-4 bg-light shadow-sm rounded">
                    <div class="category mb-2">
                        <span class="badge bg-primary text-white">{{ $item->category->name ?? 'Sin categoría' }}</span>
                    </div>
                    <a href="{{ route('public.jobDetails', $item->slugId) }}" class="text-decoration-none text-dark">
                        <h3 class="fw-bold">{{$item->title}}</h3>
                        {{-- <h5 class="text-muted">{!! $item->short_description !!}</h5> --}}
                    </a>
                    <div class="bottom_inf mt-3 d-flex justify-content-between align-items-center">
                        <div class="left_inf">
                            <span class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ config('form.select.countriesLatam')[$item->country] ?? $item->country }}</span>
                        </div>
                        <div class="left_inf">
                            <span class="text-muted"><i class="fas fa-laptop-house"></i> {{ \Modules\Recruitment\Entities\RecruitmentJobs::WORK_MODE_CATALOG[$item->work_mode] ?? $item->work_mode }}</span>
                        </div>
                        <div class="right_inf text-end">
                            <span class="text-muted"><i class="fas fa-calendar-alt"></i> Fecha de Publicación <br> {{$item->formatted_short_date}}</span>
                        </div>
                    </div>
                    <!-- Botón "Ver más" -->
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('public.jobDetails', $item->slugId) }}" class="apply-button btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="nav_pages">
                {{ $jobs->links('pagination::bootstrap-4') }}
            </div>
        </div>


        <div class="wrap_sidebar col-lg-3">
            <div class="sidebar p-0">

                {{-- Últimos trabajos --}}
                {{-- <div class="latest_posts_widget widget">
                    <div class="flex title_widget"><span><i
                        class="fas fa-th-list"></i></span>
                    <h4>Últimos trabajos</h4>
                    </div>
                    <div class="lts_post">
                    <div class="info_m_post">
                        <h5>Title</h5><span>June 25, 2019</span>
                    </div>
                    </div>
                    <div class="lts_post">
                    <div class="info_m_post">
                        <h5>Title</h5><span>June 25, 2019</span>
                    </div>
                    </div>
                </div> --}}

                {{-- Category --}}
                <div class="category_widget widget">
                    <div class="flex title_widget">
                        <span><i class="fas fa-folder-open"></i></span>
                        <h4>Categorias</h4>
                    </div>

                    @foreach($categories as $key => $item)
                        <li><a href="{{route('public.jobsByCategory', ['category' => $item->slug])}}">{{$item->name}}<i> {{ $item->jobs_count }}</i></a></li>
                    @endforeach

                </div>

                {{-- Tags --}}
                <div class="tags_widget widget">
                    <div class="flex title_widget">
                        <span><i class="fas fa-tag"></i></span>
                        <h4>Tags</h4>
                    </div>
                    @foreach($tags as $key => $item)
                    <span><a href="{{route('public.jobsByTag', ['tag' => $item->slug])}}">{{$item->name}}</a></span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('other-scripts')
<script>
    $(document).ready(function() {
    // Recuperar los filtros de localStorage
    if (localStorage.getItem('search_title')) {
        $('#search_title').val(localStorage.getItem('search_title'));
        console.log('search_title loaded:', localStorage.getItem('search_title'));
    }
    if (localStorage.getItem('search_work_mode')) {
        $('#search_work_mode').val(localStorage.getItem('search_work_mode'));
        console.log('search_work_mode loaded:', localStorage.getItem('search_work_mode'));
    }
    if (localStorage.getItem('search_type')) {
        $('#search_type').val(localStorage.getItem('search_type'));
        console.log('search_type loaded:', localStorage.getItem('search_type'));
    }
    if (localStorage.getItem('search_category')) {
        $('#search_category').val(localStorage.getItem('search_category'));
        console.log('search_category loaded:', localStorage.getItem('search_category'));
    }

    // Guardar los filtros en localStorage cuando se cambian
    $('#search_title').on('input', function() {
        localStorage.setItem('search_title', $(this).val());
        console.log('search_title saved:', $(this).val());
    });
    $('#search_work_mode').on('change', function() {
        localStorage.setItem('search_work_mode', $(this).val());
        console.log('search_work_mode saved:', $(this).val());
    });
    $('#search_type').on('change', function() {
        localStorage.setItem('search_type', $(this).val());
        console.log('search_type saved:', $(this).val());
    });
    $('#search_category').on('change', function() {
        localStorage.setItem('search_category', $(this).val());
        console.log('search_category saved:', $(this).val());
    });

    // Limpiar los filtros de localStorage después de 10 minutos
    $('form').on('submit', function() {
        setTimeout(function() {
            localStorage.removeItem('search_title');
            localStorage.removeItem('search_work_mode');
            localStorage.removeItem('search_type');
            localStorage.removeItem('search_category');
            console.log('localStorage cleared after 10 minutes');
        }, 10 * 60 * 1000); // 10 minutos en milisegundos
    });
});

function clearFormAndRedirect() {
    $('#search_title').val('');
    $('#search_work_mode').val('');
    $('#search_type').val('');
    $('#search_category').val('');
    localStorage.removeItem('search_title');
    localStorage.removeItem('search_work_mode');
    localStorage.removeItem('search_type');
    localStorage.removeItem('search_category');
    console.log('Form cleared and localStorage items removed');
    window.location.href = "{{ route('public.jobs') }}";
}
</script>
@stop
