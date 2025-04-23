@extends('webcontent::website.globaltTalentSphere.layouts.index')

@section('other-css')
<style>
    body {
        font-family: 'Poppins', sans-serif; /* Fuente moderna y limpia */
        background-color: #f4f7f6; /* Fondo claro para todo el formulario */
        color: #333;
        line-height: 1.6;
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
        <h1>Impulsa tu carrera con nosotros</h1>
<p>Estamos listos para conectarte con empresas en Latam que impulsarán tu carrera y te ofrecerán oportunidades de crecimiento.</p>
      </div>
    </div>
  </header>
  <div class="media_element">
    <div class="container">

      <div class="col-lg-12 p-0">
        <div class="media_blog">
            <img src="{{ asset('theme-front/globaltalentsphere/img/banner1.jpg') }}" alt="Default Image">
            {{-- <img src="{{ asset('theme-front/globaltalentsphere/img/jobbanner.png') }}" alt="Default Image"> --}}
        </div>
      </div>
    </div>
  </div>
  <section class="wrapper">
    <div class="container">
        <div class="row">
            <div class="content_post col-lg-9 col-12">

                <form action="{{ route('public.jobEnrollment.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                        @include('webcontent::website.globaltTalentSphere.forms.uploadCV')

                        <div class="d-flex justify-content-center my-4 button">
                            <button type="submit">Enviar</button>
                        </div>
                </form>
            </div>

            <div class="wrap_sidebar col-lg-3 col-12">
                <div class="sidebar p-0">
                    <!-- Otros widgets aquí -->


                {{-- author --}}
                {{-- <div class="author_widget widget">
                    <div class="avatar"><img src="assets/img/ava_team_l.png" src-plh="https://via.placeholder.com/255x210"></div>
                    <h3>John Doe</h3><span>Designer</span>
                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                </div> --}}

                {{-- search --}}
                {{-- <div class="search_widget widget">
                <input placeholder="Seacrh">
                </div> --}}

                {{-- categories --}}
                <div class="category_widget widget">
                    <div class="flex title_widget">
                        <span><i class="fas fa-folder-open"></i></span>
                        <h4>Categorias</h4>
                    </div>

                    @foreach($categories as $key => $item)
                        <li><a href="{{route('public.jobsByCategory', ['category' => $item->slug])}}">{{$item->name}}<i> {{ $item->jobs_count }}</i></a></li>
                    @endforeach

                </div>

                {{-- tags --}}
                <div class="tags_widget widget">
                    <div class="flex title_widget">
                        <span><i class="fas fa-tag"></i></span>
                        <h4>Tags</h4>
                    </div>
                    @foreach($tags as $key => $item)
                    <span><a href="{{route('public.jobsByTag', ['tag' => $item->slug])}}">{{$item->name}}</a></span>
                    @endforeach
                </div>

                <div class="icon_widget icon_s icon">
                    <div class="row align-items-center justify-content-center">
                        <a href="https://www.linkedin.com/company/wiva-consultora" target="_blank"><i class="fab fa-linkedin"></i></a> <!-- LinkedIn -->
                        <a href="https://www.instagram.com/wiva.ar" target="_blank"><i class="fab fa-instagram"></i></a> <!-- Instagram -->
                        {{-- <a href="#" target="_blank"><i class="fab fa-tiktok"></i></a> <!-- TikTok (añadir URL cuando la tengas) --> --}}
                        {{-- <a href="https://www.facebook.com/profile.php?id=61565403375823" target="_blank"><i class="fab fa-facebook-f"></i></a> <!-- Facebook --> --}}
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>

@endsection

@section('other-scripts')
@parent

{{-- FILE-UPLOAD --}}
@include('webcontent::website.globaltTalentSphere.js.file-upload')

@stop
