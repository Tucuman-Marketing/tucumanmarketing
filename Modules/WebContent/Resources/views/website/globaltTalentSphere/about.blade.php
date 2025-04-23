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
            <h1>Nosotros</h1>
        </div>
    </div>
</header>
<section class="about_w">
    <div class="container">
        <div class="welcome_ab">
            <div class="row m-0">
                <div class="img_ab col-lg-6 p-0">
                    <img
                        src="{{asset('theme-front/globaltalentsphere/img/globaltalent.png')}}"
                        alt="Wiva - Consultora">
                </div>
                <div class="inf_ab col-lg-6 col-md-12">
                    <h2>Nuestro Origen</h2>
                    <br>
                    <h3>De un sueño a la acción <br> Ivana Sánchez, Fundadora & CEO
                    </h3>
                    <p>
                        <b>-</b>Licenciada en Relaciones del Trabajo.<br>
                        <b>-</b>Coach Ontológico Profesional.<br>
                        <b>-</b>Especializada en <b>Project Management</b>.<br>
                        <b>-</b>Diplomado en <b>Recursos Humanos 4.0</b>. <br>
                        <b>-</b>Docente de talleres de empleabilidad y selección en la <b>Facultad de Ciencias Sociales de la UBA</b>. <br>
                        Tras una amplia trayectoria en <b>RRHH corporativo</b>, decidió dar vida a <b>Wiva</b>, materializando su propósito: <b>humanizar la gestión del talento</b>, combinando metodologías innovadoras y tecnología.<br>
                        Su experiencia y aporte en el ámbito de Recursos Humanos han sido reconocidos a nivel regional, siendo <b>destacada dentro del TOP HR Influencer 2024 de GOintegro</b><br>
                        Hoy, acompaña a empresas en todas sus etapas—<b>startups, crecimiento y consolidación</b>—para potenciar su capital humano y generar culturas organizacionales alineadas con su estrategia de negocio.<br>

                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="products"><span class="element_ten">
        <img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_ten.svg')}}"></span><span
        class="element_eleven"><img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_eleven.svg')}}"></span><span
        class="element_twelve"><img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_twelve.svg')}}"></span>
            <div class="container">
                <div class="row">
                    <!-- Texto -->
                    <div class="title_b col-12 col-md-6 order-1 order-md-1">
                        <h2>¿Por qué Elegirnos?</h2>
                        <p>En Wiva, nos integramos como una extensión
                            natural de tu equipo de Recursos Humanos, construyendo
                            relaciones de confianza a largo plazo. Entendemos
                            profundamente la cultura y necesidades de tu empresa para
                            seleccionar talento que no solo se adapte rápidamente, sino
                            que también aporte valor significativo y contribuya al
                            crecimiento organizacional.</p>
                        <p>Nuestro modelo probado asegura agilidad y calidad en cada
                            búsqueda, optimizando el proceso para satisfacer tus
                            necesidades con eficiencia. Con una amplia red de
                            contactos en toda Latinoamérica, encontramos el ajuste
                            perfecto para cada rol, reduciendo tiempos, costos y
                            minimizando el riesgo de rotación.</p>
                        <p>En Wiva somos aliados estratégicos de importantes compañías en Latam</p>
                    </div>

                    <!-- Imagen -->
                    <div class="title_b col-12 col-md-6 order-2 order-md-2">
                        <img style="width: 90%" src="{{asset('theme-front/globaltalentsphere/img/maps.png')}}">
                    </div>
                </div>
            </div>

</section>

<section class="information_ab">
    <div class="container">
        <div class="col-lg-12">
            <br>
            <h2>¡Solo te falta un paso para llegar al mejor talento de LatAm!</h2>
            <p>Ponte en contacto con nosotros y descubre cómo podemos ayudarte a encontrar el talento ideal para tu equipo. Estamos aquí para responder tus consultas y acompañarte en cada paso del proceso. Escribinos por <a href="https://wa.me/+573028501747">WhatsApp</a> o <a href="https://calendly.com/tatiana-global-talentsphere/30min" target="_blank">agendá una llamada con nuestros expertos.</a> </p>
            <div class="button"><a
                    href="{{ route('public.contact')}}">Contacto</a></div>
        </div>
    </div>
</section>
{{-- <section class="team">
    <div class="container">
        <div class="row">
            <div class="team_t col-lg-3">
                <h2>Our Team</h2>
            </div>
            <div class="team_t col-lg-9">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo.</p>
            </div>
        </div>
        <div class="bg_team col-lg-12">
            <div class="row justify-content-between">
                <div class="face_team col-lg-3 col-md-3 p-0">
                    <div class="img_team"><img src="assets/img/one_team_l.png"
                            alt>
                        <div class="social"><a href="#"><i
                                    class="fab fa-twitter"></i></a><a
                                href="#"><i
                                    class="fab fa-youtube"></i></a><a
                                href="#"><i
                                    class="class fab fa-behance"></i></a><a
                                href="#"><i
                                    class="fab fa-facebook-f"></i></a></div>
                    </div>
                    <h4>Emily Lane</h4><span>Director</span>
                </div>
                <div class="face_team col-lg-3 col-md-3 p-0">
                    <div class="img_team"><img src="assets/img/two_team_l.png"
                            alt>
                        <div class="social"><a href="#"><i
                                    class="fab fa-twitter"></i></a><a
                                href="#"><i
                                    class="fab fa-youtube"></i></a><a
                                href="#"><i
                                    class="class fab fa-behance"></i></a><a
                                href="#"><i
                                    class="fab fa-facebook-f"></i></a></div>
                    </div>
                    <h4>Jack Mosley</h4><span>Designer</span>
                </div>
                <div class="face_team col-lg-3 col-md-3 p-0">
                    <div class="img_team"><img src="assets/img/three_team_l.png"
                            alt>
                        <div class="social"><a href="#"><i
                                    class="fab fa-twitter"></i></a><a
                                href="#"><i
                                    class="fab fa-youtube"></i></a><a
                                href="#"><i
                                    class="class fab fa-behance"></i></a><a
                                href="#"><i
                                    class="fab fa-facebook-f"></i></a></div>
                    </div>
                    <h4>Anna Lane</h4><span>3D Designer</span>
                </div>
                <div class="face_team col-lg-3 col-md-3 p-0">
                    <div class="img_team"><img src="assets/img/four_team_l.png"
                            alt>
                        <div class="social"><a href="#"><i
                                    class="fab fa-twitter"></i></a><a
                                href="#"><i
                                    class="fab fa-youtube"></i></a><a
                                href="#"><i
                                    class="class fab fa-behance"></i></a><a
                                href="#"><i
                                    class="fab fa-facebook-f"></i></a></div>
                    </div>
                    <h4>Roy Pitts</h4><span>Menager</span>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- <section class="gallery">
    <div class="container">
        <div class="gallery_block">
            <h2>Gallery</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Venenatis lectus magna fringilla urna
                porttitor rhoncus dolor purus non.</p>
            <div class="gallery_img">
                <div class="row">
                    <div class="ig col-lg-4 col-md-4 col-12"><a
                            data-fancybox="gallery"
                            href="assets/img/gallery_onefull_l.html"><img
                                src="assets/img/gallery_one_l.png"></a></div>
                    <div class="ig col-lg-4 col-md-4 col-12"><a
                            data-fancybox="gallery"
                            href="assets/img/gallery_twofull_l.png"><img
                                src="assets/img/gallery_two_l.png"></a></div>
                    <div class="ig col-lg-4 col-md-4 col-12"><a
                            data-fancybox="gallery"
                            href="assets/img/gallery_threefull_l.png"><img
                                src="assets/img/gallery_three_l.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

@endsection

@section('other-scripts')
@stop
