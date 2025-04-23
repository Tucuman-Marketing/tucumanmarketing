@extends('webcontent::website.globaltTalentSphere.layouts.index')

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
        <h1>{{$title}}</h1>
        <p>Explora nuestras últimas publicaciones y mantente al día con las tendencias, consejos y novedades de la industria.</p>

    </div>
    </div>
  </header>
  <br>  <br>
  <div class="post_content container">
    <div class="posts_s three_cols col-lg-12">
      <div class="row">


            @foreach($posts as $key => $item)
            <div class="posts_standart">
                <a href="{{ route('public.postDetails', $item->slug) }}">
                    <div class="post_img">
                        @if($item->image_header)
                        <img src="{{ $item->getImageHeaderAttribute('preview') }}" alt="Image Header">
                        @endif
                    </div>
                </a>
                <div class="wrp_post">
                    <div class="category">
                        <span>Blog</span>
                        <span>{{ $item->category?->name ?? '' }}</span>
                    </div>
                    <a href="{{ route('public.postDetails', $item->slug) }}">
                        <h2>{{$item->title}}</h2>
                    </a>
                    {{-- <p>{!! $item->content_short !!}</p> --}}
                    <div class="bottom_inf">
                    <div class="left_inf"><span>{{ $item->author->full_name ?? '' }}</span></div>
                    <div class="right_inf"><span>{{$item->published_at_readable}}</span></div>
                    </div>
                </div>
            </div>
            @endforeach



            <div class="nav_pages">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>

      </div>
    </div>
  </div>

@endsection


@section('other-scripts')
@stop
