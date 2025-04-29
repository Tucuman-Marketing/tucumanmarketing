@extends('webcontent::website.rrhh.layouts.index')

@section('other-css')

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
        <h1>{{$job->title}}</h1>
        <p>{!! $job->content_short !!}</p>
      </div>
    </div>
  </header>
  <div class="media_element">
    <div class="container">
        <div class="col-lg-12 p-0">
            <div class="media_blog">
                @if($job->image_header)
                    <img src="{{ $job->getImageHeaderAttribute('preview') }}" alt="Image Header">
                @else
                    <img src="{{ asset('theme-front/globaltalentsphere/img/banner1.jpg') }}" alt="Default Image">
                @endif
            </div>
        </div>
      </div>
    </div>
  </div>
  <section class="wrapper">
    <div class="container">
      <div class="row">
        <div class="content_post col-lg-9 col-12">
            {!! $job->description !!}

            <!-- Botón de APLICAR centrado -->
            <div class="d-flex justify-content-center my-4 button">
                <a href="{{ route('public.jobEnrollment', $job->slugId) }}" class="btn btn-primary">Aplicar</a>
            </div>

        </div>

        <div class="wrap_sidebar col-lg-3 col-12">
        <div class="sidebar p-0">

            <div class="latest_posts_widget latest widget">
                <div class="flex title_widget"><span><i class="fas fa-th-list"></i></span>
                    <h4>publicaciones relacionadas</h4>
                </div>
                @foreach($relatedJobs as $key => $item)
                    <div class="lts_post">
                        <div class="min_img_w">
                            @if($item->image_header)
                                <img src="{{ $post->getImageHeaderAttribute('thumb') }}" alt="Image Header">
                            @endif
                            <div class="info_m_post">
                                <h5>{!! $item->content_short !!}</h5><span> {{ $item->published_at_readable}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


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
                    {{-- <a href="#" target="_blank"><i class="fab fa-tiktok"></i></a> <!-- TikTok (añadir URL cuando la tengas) -->
                    <a href="https://www.facebook.com/profile.php?id=61565403375823" target="_blank"><i class="fab fa-facebook-f"></i></a> <!-- Facebook --> --}}
                </div>
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
    @include('webcontent::website.rrhh.js.file-upload')
@stop

