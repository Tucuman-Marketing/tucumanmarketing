@extends('webcontent::website.globaltTalentSphere.layouts.index')

@section('other-css')
<style>
    .work .img_w .img_portf {
    width: calc((100% / 2) - 20px) !important;
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
        </span>     --}}
        <div class="container title_h">
            <div class="block_title">
            <h1>{{$post->title}}</h1>
            {{-- <p>{!! $post->content_short !!}</p> --}}
            </div>
        </div>
    </header>

    <div class="media_element">
        <div class="container">
        <div class="col-lg-12 p-0">
            <div class="media_blog">
                @if($post->image_header)
                    <img src="{{ $post->getImageHeaderAttribute('preview') }}" alt="Image Header">
                @endif
            </div>
        </div>
        </div>
    </div>


    <section class="wrapper">
        <div class="container">
        <div class="row">
            <div class="content_post col-lg-9 col-12">
                {!! $post->content !!}

                {{-- Galería de Imágenes --}}
                @if($post->getMedia('image_gallery')->count() > 0)
                    <div class="work">
                        <div class="img_w col-lg-9 col-12 mt-4 mx-auto">
                            <div class="row justify-content-center">
                                @foreach ($post->getMedia('image_gallery') as $image)
                                    <div class="img_portf {{ $post->getMedia('image_gallery')->count() == 1 ? 'single-image' : '' }}">
                                        <a data-fancybox="gallery" href="{{ asset($image->url) }}">
                                            <div class="hover_info"><i class="fas fa-search"></i></div>
                                            <img src="{{ asset($image->url) }}" class="img-fluid rounded" alt="Gallery Image">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="posts_s three_cols col-lg-12">
                    <div class="row">

                        @foreach($relatedPosts as $item)
                            <div class="posts_standart">
                                <a href="single_post_image.html">
                                    <div class="post_img">
                                        @if($item->image_header)
                                        <a href="{{ route('public.postDetails', $item->slug) }}">
                                            <img src="{{ $item->getImageHeaderAttribute('preview') }}" alt="Image Header">
                                        </a>
                                        @endif
                                    </div>
                                </a>
                                <div class="wrp_post">
                                    <div class="category">
                                        <span>Blog</span>
                                        <span>{{ $item->category->name ?? '' }}</span>
                                    </div>
                                    <a href="{{ route('public.postDetails', $item->slug) }}">
                                        <h2>{{ $item->title ?? '' }}</h2>
                                    </a>
                                    {{-- <p>{!! $item->content_short !!}</p> --}}
                                    <div class="bottom_inf">
                                        <div class="left_inf"><span>{{ $item->author->full_name ?? '' }}</span></div>
                                        <div class="right_inf"><span>{{$item->published_at_readable}}</span></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>


            <div class="wrap_sidebar col-lg-3 col-12">
                <div class="sidebar p-0">

                    {{-- author --}}
                    {{-- <div class="author_widget widget">
                        <div class="avatar"><img src="assets/img/ava_team_l.png" src-plh="https://via.placeholder.com/255x210"></div>
                        <h3>{{ $post->author->full_name}}</h3><span>Designer</span>
                        <p>Lorem ipsum dolor sit amet, consectetur.</p>
                    </div> --}}

                    {{-- search --}}
                    {{-- <div class="search_widget widget">
                    <input placeholder="Seacrh">
                    </div> --}}

                    {{-- post relacionados --}}
                    <div class="latest_posts_widget latest widget">
                        <div class="flex title_widget">
                            <span><i class="fas fa-th-list"></i></span>
                            <h4>publicaciones relacionadas</h4>
                        </div>
                        @foreach($relatedPosts as $item)
                            <div class="lts_post">
                                <div class="min_img_w">
                                    @if($item->image_header)
                                        <a href="{{ route('public.postDetails', $item->slug) }}">
                                            <img src="{{ $item->getImageHeaderAttribute('thumb') }}" alt="Image Header">
                                        </a>
                                    @endif
                                </div>
                                <div class="info_m_post">
                                    <a href="{{ route('public.postDetails', $item->slug) }}">
                                        <h5>{{ $item->title ?? '' }}</h5>
                                    </a>
                                    <span>{{ $item->published_at_readable }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    {{-- categories --}}
                    <div class="category_widget widget">
                        <div class="flex title_widget"><span><i class="fas fa-folder-open"></i></span>
                            <h4>Categorias</h4>
                        </div>
                        @foreach($categories as $key => $item)
                            <li><a href="{{ route('public.postsByCategory', $item->slug) }}">{{ $item->name }}<i>{{ $item->posts_count }}</i></a></li>
                        @endforeach
                    </div>

                    {{-- tags --}}
                    <div class="tags_widget widget">
                        <div class="flex title_widget"><span><i class="fas fa-tag"></i></span>
                            <h4>Tags</h4>
                        </div>
                        @foreach($tags as $key => $item)
                        <span>
                            <a href="{{ route('public.postsByTag', $item->slug) }}">{{ $item->name }}</a>
                        </span>
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




    {{-- blog relacionados --}}
    {{-- <section class="blog">
        <div class="container">
        <div class="posts_s three_cols col-lg-12">
            <div class="row">
                <div class="posts_standart"><a href="single_post_image.html">
                    <div class="post_img"><img src="assets/img/blog_post_one_l.png"></div></a>
                    <div class="wrp_post">
                        <div class="category"><span>Blog</span><span>Construction</span><span>Painting</span></div><a href="single_post_image.html">
                        <h2>Why design is needed</h2></a>
                        <p>A large selection of houses in the south of Ukraine, call, always happy to help with the choice of your dreams. A large selection of houses in the south of Ukraine, call, always happy to help with the choice of your dreams</p>
                        <div class="bottom_inf">
                        <div class="left_inf"><span>John Doe</span></div>
                        <div class="right_inf"><span>14.07.2019</span></div>
                        </div>
                    </div>
                </div>
                <div class="posts_standart video">
                <div class="video_p">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/3wi65UW_nJk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="wrp_post">
                    <div class="category"><span>Blog</span><span>Construction</span><span>Painting</span></div><a href="single_post_video.html">
                    <h2>Success in front of you</h2></a>
                    <p>A large selection of houses in the south of Ukraine, call, always happy to help with the choice of your dreams. A large selection of houses in the south of Ukraine, call, always happy to help with the choice of your dreams</p>
                    <div class="bottom_inf">
                    <div class="left_inf"><span>John Doe</span></div>
                    <div class="right_inf"><span>14.07.2019</span></div>
                    </div>
                </div>
                </div>
                <div class="posts_standart"><a href="single_post_image.html">
                    <div class="post_img"><img src="assets/img/blog_post_two_l.png"></div></a>
                    <div class="wrp_post">
                        <div class="category"><span>Blog</span><span>Construction</span><span>Painting</span></div><a href="single_post_image.html">
                        <h2>Business Courses</h2></a>
                        <p>A large selection of houses in the south of Ukraine, call, always happy to help with the choice of your dreams. A large selection of houses in the south of Ukraine, call, always happy to help with the choice of your dreams</p>
                        <div class="bottom_inf">
                        <div class="left_inf"><span>John Doe</span></div>
                        <div class="right_inf"><span>14.07.2019</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> --}}

    {{-- comentarios --}}
    {{-- <section class="comments">
        <div class="container">
        <div class="wrapper_min"></div>
        <div class="comment">
            <h2>Comments</h2>
            <div class="ava_img">
            <div class="avatar"><img src="assets/img/ava_comment_l.png" src-plh="https://via.placeholder.com/120x120"></div>
            <div class="info_comm">
                <h3>Anna Hardy</h3><span>June 25, 2019</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                <div class="ava_img answer">
                <div class="avatar"><img src="assets/img/ava_comment_two_l.png" src-plh="https://via.placeholder.com/120x120"></div>
                <div class="info_comm">
                    <h3>John Doe</h3><span>June 25, 2019</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="form_comment">
            <h2>Comments</h2>
            <p> Your email address will not be published. Required fields are marked *</p>
            <form>
            <div class="rpl_b">
                <input placeholder="Name">
                <input placeholder="Email">
            </div>
            <textarea placeholder="Comment"></textarea>
            <p>
                <input type="checkbox" value="yes">
                <label>Save my name, email, and website in this browser for the next time I comment.</label>
            </p>
            <div class="button"><a href="#">Send Message</a></div>
            </form>
        </div>
        </div>
    </section> --}}

@endsection

@section('other-scripts')
@stop
