@extends('webcontent::website.globaltTalentSphere.layouts.index')

@section('other-css')
@stop

@section('content')
@include('flash::message')

<header class="slider_head">
        <div>
            <svg class="waves-effect" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        {{-- <span class="element_two"><img
            src="{{asset('theme-front/globaltalentsphere/img/cub_two.png')}}"></span> --}}
        <div class="element_three">
            <img src="{{asset('theme-front/globaltalentsphere/img/cub_three.png')}}" alt="Elemento Tres">
        </div>
            {{-- <span
        class="element_four"><img
            src="{{asset('theme-front/globaltalentsphere/img/cub_four.png')}}"></span> --}}
        {{-- <span class="element_five">
            <img src="{{asset('theme-front/globaltalentsphere/img/block_five.png')}}">
        </span> --}}
        {{-- <span class="element_six">
            <img src="{{asset('theme-front/globaltalentsphere/img/cub_six.png')}}">
        </span>
        <span class="element_seven">
            <img src="{{asset('theme-front/globaltalentsphere/img/cub_seven.png')}}">
        </span> --}}
        <span class="svg-container">
            <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
                <!-- Definición del filtro de brillo -->
                <defs>
                    <filter id="glow" x="-50%" y="-50%" width="200%" height="200%">
                        <feGaussianBlur stdDeviation="10" result="blur" />
                        <feComposite in="SourceGraphic" in2="blur" operator="over" />
                    </filter>

                    <!-- Gradiente para el efecto de luz -->
                    <radialGradient id="lightGradient">
                        <stop offset="0%" stop-color="white" stop-opacity="1" />
                        <stop offset="40%" stop-color="#FF3EB5" stop-opacity="0.6" />
                        <stop offset="100%" stop-color="#FF3EB5" stop-opacity="0" />
                    </radialGradient>
                </defs>

                <!-- Importar tu SVG como un objeto externo -->
                <g id="importedSVG">
                    <!-- Aquí se cargará tu SVG -->
                </g>

                <!-- Efecto de luz que se moverá a lo largo de la ruta -->
                <circle id="lightEffect" r="20" fill="url(#lightGradient)" filter="url(#glow)">
                    <!-- La animación se aplicará mediante JavaScript -->
                </circle>
            </svg>
        </span>
            {{-- <span class="element_eight">
                <img src="{{asset('theme-front/globaltalentsphere/img/cub_eight.png')}}">
            </span> --}}
            {{-- <span
        class="element_nine"><img
            src="{{asset('theme-front/globaltalentsphere/img/cub_four.png')}}"></span> --}}
    {{-- <div class="icon">
        <div
            class="row flex-column align-items-center justify-content-center h-100">
            <a href="https://www.linkedin.com/company/wiva-consultora"
                target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.instagram.com/wiva.ar"
                target="_blank"><i class="fab fa-instagram"></i></a>
            <a href target="_blank"><i class="fab fa-tiktok"></i></a>
            <a href=""
                target="_blank"><i class="fab fa-facebook-f"></i></a>
        </div>

    </div> --}}

    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper head_slider">
                <div class="swiper-slide">
                    <div class="tit_img">
                        <img
                            src="{{ asset('theme-front/globaltalentsphere/img/global_logo.png') }}"
                            alt="Global Logo">
                    </div>

                    <div class="title">
                        <div class="box">
                            <h1>Wiva</h1>
                        </div>
                        <p>Somos tu socio estratégico en la búsqueda de talento excepcional, garantizando altos estándares de calidad. Nos encargamos de encontrar al candidato ideal para que puedas enfocarte en el crecimiento de tu negocio.
                            <br>
                            Creemos firmemente en la conexión entre el potencial único de cada persona y las oportunidades alineadas con los objetivos y la cultura organizacional.
                            <br>
                            Sabemos lo desafiante que es el mercado hoy, y ¿sabes qué? ¡Eso nos motiva aún más a acompañarte!
                        </p>
                        <div class="button"><a
                                href="{{ route('public.jobs')}}">Ver
                                Empleos</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="swiper-pagination"></div> -->
</header>

<section class="welcome_b">
    <svg xmlns="http://www.w3.org/2000/svg"
        style="position:absolute; width:0; height:0;">
        <defs>
            <clippath id="mask">
                <path id="path-1" />
            </clippath>
        </defs>
    </svg>

    <div class="welcome row">
        <div class="img_b col-lg-6 p-0">
            <img
                src="{{asset('theme-front/globaltalentsphere/img/globaltalent.png')}}"
                alt="Imagen de Wiva violeta">
        </div>
        <div class="bg col-lg-6">
            <div class="cont_inf">
                <h2>¿Quiénes Somos?</h2>
                <p>
                    En Wiva, somos una consultora moderna y dinámica,
                    especializada en Selección de Personal y Gestión integral del Talento.
                    <br>
                    No solo buscamos cubrir posiciones, sino transformar la manera en que las empresas
                    entienden y gestionan su talento. Brindamos soluciones personalizadas que combinan innovación,
                    excelencia y un enfoque humano. Nuestro objetivo es fortalecer las prácticas organizacionales,
                    impulsar el desarrollo estratégico y adaptar las estructuras empresariales a las demandas del
                    futuro del trabajo, agregando valor al crecimiento y éxito de nuestros clientes.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="products">
    {{-- <span class="element_ten">
        <img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_ten.png')}}"
            alt>
    </span> --}}
    {{-- <span class="element_eleven">
        <img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_eleven.svg')}}"
            alt>
    </span> --}}
    {{-- <span class="element_twelve">
        <img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_twelve.png')}}"
            alt>
    </span> --}}
    <div class="container">
        <div class="row">
            <div class="title_b col-sm-12 col-12">
                <h2>¿Por qué Elegirnos?</h2>
            </div>
            <div class="row">
                <div class="pr col-lg-4 col-md-8 col-12" data-aos="fade-up"
                    data-aos-duration="0">
                    <div class="product_bl">
                        <img
                            src="{{asset('theme-front/globaltalentsphere/img/block_one_l.png')}}"
                            alt>
                        <div class="product_cont">
                            <h4>Criterio asertivo basado <br>en competencias:</h4>
                            <p class="expandable-text">
                                Seleccionamos talento con una mirada estratégica,
                                asegurando un match perfecto con la empresa.
                            </p>
                            <button class="toggle-btn">Mostrar mas</button>
                        </div>
                    </div>
                </div>
                <div class="pr col-lg-4 col-md-8 col-12" data-aos="fade-up"
                    data-aos-duration="1000">
                    <div class="product_bl">
                        <img
                            src="{{asset('theme-front/globaltalentsphere/img/block_two_2.png')}}"
                            alt>
                        <div class="product_cont">
                            <h4>Evaluación profunda:</h4>
                            <p class="expandable-text">
                                Incluimos evaluación psicotécnica laboral y test conductuales
                                sin costo adicional, brindando un análisis detallado del perfil.
                            </p>
                            <button class="toggle-btn">Mostrar mas</button>
                        </div>
                    </div>
                </div>
                <div class="pr col-lg-4 col-md-8 col-12" data-aos="fade-up"
                    data-aos-duration="2000">
                    <div class="product_bl">
                        <img
                            src="{{asset('theme-front/globaltalentsphere/img/block_three_3.png')}}"
                            alt>
                        <div class="product_cont">
                            <h4> Búsqueda a éxito:</h4>
                            <p class="expandable-text">
                                Nuestro modelo prioriza la eficiencia y compromiso en cada proceso,
                                asegurando la reducción de tiempos, costos y minimizando el riesgo de rotación.
                                Ofrecemos un modelo de selección flexible, adaptado a las necesidades de cada cliente.
                            </p>
                            <button class="toggle-btn">Mostrar mas</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Separador -->
        <div class="row">
            <div class="col-12">
                <br> <!-- Línea separadora -->
            </div>
        </div>

        <div class="row">
            <div class="title_b col-sm-12 col-12">
            </div>
            <div class="row">
                <div class="pr col-lg-4 col-md-8 col-12" data-aos="fade-up"
                    data-aos-duration="0">
                    <div class="product_bl">
                        <img
                            src="{{asset('theme-front/globaltalentsphere/img/block_four_4.png')}}"
                            alt>
                        <div class="product_cont">
                            <h4>Seguimiento post-ingreso:</h4>
                            <p class="expandable-text">
                                ofrecemos mentorías de acompañamiento durante las primeras semanas
                                para garantizar la conformidad y adaptación tanto del talento como de la empresa.
                            </p>
                            <button class="toggle-btn">Mostrar mas</button>
                        </div>
                    </div>
                </div>
                <div class="pr col-lg-4 col-md-8 col-12" data-aos="fade-up"
                    data-aos-duration="1000">
                    <div class="product_bl">
                        <img
                            src="{{asset('theme-front/globaltalentsphere/img/block_five_5.png')}}"
                            alt>
                        <div class="product_cont">
                            <h4>Respaldo garantizado:</h4>
                            <p class="expandable-text">
                                Brindamos una garantía de 90 días en nuestros procesos de selección,
                                asegurando confianza en cada contratación.
                            </p>
                            <button class="toggle-btn">Mostrar mas</button>
                        </div>
                    </div>
                </div>
                <div class="pr col-lg-4 col-md-8 col-12" data-aos="fade-up"
                    data-aos-duration="2000">
                    <div class="product_bl">
                        <img
                            src="{{asset('theme-front/globaltalentsphere/img/block_six_6.png')}}"
                            alt>
                        <div class="product_cont">
                            <h4>Conexión con el mercado:</h4>
                            <p class="expandable-text">
                                Contamos con un amplio alcance en redes de contratación, asegurando visibilidad,
                                amplia base de talentos en diversos rubros y acceso a los mejores perfiles.
                            </p>
                            <button class="toggle-btn">Mostrar mas</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="row">
            <div class="title_b col-sm-12 col-12" style="padding-bottom: 20px;">
                <h2>Nuestros Valores</h2>
            </div>
        </div>
        <div class="row" style="padding-bottom: 30px;">
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="0">
                <div class="numb">
                    <span><i class="fas fa-handshake"></i></span>
                    <h3>INTEGRIDAD</h3>
                    <p>
                        Actuamos con honestidad, transparencia y ética
                        en cada interacción con clientes y partners.
                    </p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="numb">
                    <span><i class="fas fa-people-carry"></i></span>
                    <h3>COMPROMISO</h3>
                    <p>
                        Nos apasiona acompañar a nuestros clientes en su crecimiento,
                        garantizando un servicio de excelencia y alto impacto.
                    </p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="2000">
                <div class="numb">
                    <span><i class="fas fa-balance-scale"></i></span>
                    <h3>INNOVACIÓN</h3>
                    <p>
                        Integramos tecnología y metodologías disruptivas para humanizar
                        los procesos de talento, adaptándonos a los desafíos del mercado.
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="padding-bottom: 30px;">
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="3000">
                <div class="numb">
                    <span><i class="fas fa-check-circle"></i></span>
                    <h3>CREATIVIDAD</h3>
                    <p>
                        Desarrollamos soluciones a medida, con un enfoque flexible y estratégico que potencia el talento.
                    </p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="4000">
                <div class="numb">
                    <span><i class="fas fa-bolt"></i></span>
                    <h3>DISFRUTE</h3>
                    <p>
                        Amamos lo que hacemos. Creemos que el entusiasmo y la pasión
                         son clave para generar experiencias transformadoras.
                    </p>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="5000">
                <div class="numb">
                    <span><i class="fas fa-user-cog"></i></span>
                    <h3>TRABAJO EN EQUIPO</h3>
                    <p>
                        Creemos en la colaboración como motor de crecimiento.
                        Fomentamos un ambiente de confianza y sinergia, donde cada voz suma y potencia los resultados.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="products">
    {{-- <span class="element_ten">
        <img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_twelve-1.png')}}"></span> --}}
            {{-- <span
        class="element_eleven"><img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_eleven.svg')}}"></span> --}}
            {{-- <span
        class="element_twelve"><img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_twelve-2.png')}}"></span> --}}
    <div class="container">
        <div class="row">
            <div class="title_b col-sm-12 col-12">
                <h2>Dejanos tu CV</h2>
                <p>Explora oportunidades únicas subiendo tu CV a nuestra
                    plataforma.
                    <br>
                    Aquí en Wiva, personalizamos la búsqueda de
                    talento para ajustarse a las necesidades específicas de tu
                    carrera.</p>
                <div class="button"><a href="{{ route('public.uploadCV')}}">Dejanos
                        tu CV</a></div>

            </div>
        </div>
    </div>
</section>

<section class="process" id="process">
    <div class="container">
        <div class="title_b">
            <h2>Nuestra Ruta de Colaboración</h2>
            <p>
                En Wiva, seguimos un proceso claro y estratégico para garantizar
                una selección eficiente y alineada con las necesidades de tu empresa.
                Mantenemos una comunicación constante con tu equipo, brindando actualizaciones
                en cada fase del proceso para que puedas hacer un seguimiento detallado de la búsqueda
                y tomar decisiones informadas.
            </p>
        </div>
        <div class="row process_c">
            <div class="process_b sq_on col-lg-4 col-md-4 col-12"><span
                    class="square_one">1</span>
                <div class="b_brc" data-aos="fade-up" data-aos-duration="0">
                    <h3>Diagnóstico Estratégico</h3>
                    <br>
                    <p>
                        Nos reunimos con tu equipo para comprender en profundidad la necesidad
                        de contratación, alineándonos con la cultura, valores y objetivos estratégicos de la empresa.
                    </p>
                </div>
            </div>
            <div class="process_b sq_tw col-lg-4 col-md-4 col-12"><span
                    class="square_two">2</span>
                <div class="b_brc" data-aos="fade-up" data-aos-duration="1000">
                    <h3> Mapeo y Atracción de Talento</h3>
                    <p>
                        Identificamos y contactamos a los candidatos más adecuados a través de nuestra red y estrategias
                        de hunting/sourcing, asegurando un pool de talento alineado con el perfil buscado.
                    </p>
                </div>
            </div>
            <div class="process_b pr_b sq_th col-lg-4 col-md-4 col-12"><span
                    class="square_three">3</span>
                <div class="b_brc" data-aos="fade-up" data-aos-duration="2000">
                    <h3>Evaluación y Presentación</h3>
                    <p>
                        Realizamos entrevistas por competencias, assessments y pruebas
                        específicas según el rol, entregando un informe detallado con los mejores perfiles.
                    </p>
                </div>
            </div>
            <div class="process_b sq_fo col-lg-4 col-md-4 col-12"><span
                    class="square_four">6</span>
                <div class="b_brc" data-aos="fade-up" data-aos-duration="0">
                    <h3>Test y Validación</h3>
                    <p>
                        Facilitamos pruebas conductuales y psicotécnicas cuando sea necesario,
                        asegurando un análisis integral de cada candidato finalista.
                        <br>
                        &nbsp;&nbsp;&nbsp;
                    </p>
                </div>
            </div>
            <div class="process_b sq_fv col-lg-4 col-md-4 col-12"><span
                    class="square_five">5</span>
                <div class="b_brc" data-aos="fade-up" data-aos-duration="1000">
                    <h3>Cierre y Propuesta</h3>
                    <p>
                        Acompañamos en el diseño de la propuesta final y en la negociación
                        con el candidato seleccionado, garantizando un proceso fluido.
                        <br>
                        &nbsp;&nbsp;&nbsp;
                    </p>
                </div>
            </div>
            <div class="process_b sq_s col-lg-4 col-md-4 col-12"><span
                    class="square_six">4</span>
                <div class="b_brc" data-aos="fade-up" data-aos-duration="2000">
                    <h3>Onboarding y Seguimiento</h3>
                    <p>
                        Brindamos soporte en la incorporación del nuevo talento,
                        asegurando una transición efectiva y alineada con los objetivos de la empresa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="products">
    {{-- <span class="element_ten"><img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_twelve-1.png')}}"></span> --}}
    {{-- <span class="element_eleven"><img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_eleven.svg')}}"></span> --}}
    {{-- <span class="element_twelve"><img
            src="{{asset('theme-front/globaltalentsphere/img/icons/cub_twelve-2.png')}}"></span> --}}
    <div class="counter-grid-custom row"
        style="padding-left: 25px; padding-right: 25px;">
        <div class="counter-container-custom">
            <div class="counter-grid-custom row">
                <div class="col-lg-3 col-md-6 col-12 counter-box-custom">
                    <i class="fas fa-smile"></i>
                    <div class="counter-value-custom" data-target="100">0</div>
                    <span>Nivel de satisfacción de nuestros clientes (%)</span>
                </div>
                <div class="col-lg-3 col-md-6 col-12 counter-box-custom">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="counter-value-custom" data-target="28">0</div>
                    <span>Ahorro de tiempo en cierre de posiciones (días)</span>
                </div>
                <div class="col-lg-3 col-md-6 col-12 counter-box-custom">
                    <i class="fas fa-dollar-sign"></i>
                    <div class="counter-value-custom" data-target="30">0</div>
                    <span>Ahorro de costos en reclutamiento (%)</span>
                </div>
                <div class="col-lg-3 col-md-6 col-12 counter-box-custom">
                    <i class="fas fa-database"></i>
                    <div class="counter-value-custom" data-target="1255">0</div>
                    <span>Candidatos en nuestra base de datos</span>
                </div>
            </div>
        </div>
    </section>

    <section class="mercados">
        <div class="container-mercados">
            <div class="title_b">
                <h2>Nuestros Mercados</h2>
                <p>
                    En Wiva, brindamos soluciones especializadas en diversos sectores.
                    Desde tecnología, finanzas y retail, hasta marketing, seguros, construcción,
                    industria y agricultura, nuestro equipo está preparado para conectar el mejor
                    talento con las empresas que buscan crecer e innovar."
                </p>
            </div>

            <div class="carousel-wrapper row">
                <!-- Columna Izquierda: Fecha -->
                <!-- Columna Izquierda: Flecha Anterior -->
                <div class="col-left">
                    <button class="carousel-button prev-button"
                        onclick="prevSlide()">&#10094;</button>
                </div>

                <!-- Columna Central: Carrusel -->
                <div class="col-center">
                    <div class="carousel">
                        <div class="carousel-item">
                            <i class="fas fa-laptop-code"></i>
                            <p>Tecnología</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-chart-line"></i>
                            <p>Finanzas y Seguros</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-heartbeat"></i>
                            <p>Salud</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-bullhorn"></i>
                            <p>Marketing y Publicidad</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-hard-hat"></i>
                            <p>Construcción</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-headset"></i>
                            <p>BPO</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-concierge-bell"></i>
                            <p>Servicios</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-shield-alt"></i>
                            <p>Seguridad</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-utensils"></i>
                            <p>Alimentos y Bebidas</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-plane"></i>
                            <p>Aerolíneas</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-car"></i>
                            <p>Automotriz</p>
                        </div>
                        <div class="carousel-item">
                            <i class="fas fa-ellipsis-h"></i>
                            <p>Entre otros...</p>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Flecha Siguiente -->
                <div class="col-right">
                    <button class="carousel-button next-button"
                        onclick="nextSlide()">&#10095;</button>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="title_b">
                <h2>Blog Talento 360°</h2>
                <p>
                    Sumergite en nuestro blog y descubrí las últimas novedades y tendencias
                    en el mundo de Recursos Humanos. Si sos parte de una empresa, vas a encontrar
                    estrategias y consejos clave para atraer, seleccionar y fidelizar al mejor talento.
                    Si estás buscando crecer en tu carrera, te compartimos guías y recursos para que te
                    destaques y accedas a nuevas oportunidades. Con artículos actualizados constantemente,
                    ponemos a tu alcance nuestra experiencia y conocimientos para que logres tus objetivos,
                    ya sea formando un equipo sólido o potenciando tu desarrollo profesional.
                </p>
            </div>

            <div class="posts_s three_cols col-lg-12">
                <div class="row">

                    @foreach($posts as $item)
                    <div class="posts_standart">
                        <a href="single_post_image.html">
                            <div class="post_img">
                                @if($item->image_header)
                                <a
                                    href="{{ route('public.postDetails', $item->slug) }}">
                                    <img
                                        src="{{ $item->getImageHeaderAttribute('preview') }}"
                                        alt="Image Header">
                                </a>
                                @endif
                            </div>
                        </a>
                        <div class="wrp_post">
                            <div class="category">
                                <span>Blog</span>
                                <span>{{ $item->category->name ?? '' }}</span>
                            </div>
                            <a
                                href="{{ route('public.postDetails', $item->slug) }}">
                                <h2>{{ $item->title ?? '' }}</h2>
                            </a>
                            <p>{!! $item->content_short !!}</p>
                            <div class="bottom_inf">
                                <div class="left_inf"><span>{{
                                        $item->author->full_name ?? ''
                                        }}</span></div>
                                <div
                                    class="right_inf"><span>{{$item->published_at_readable}}</span></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="button" style="text-align: center; margin-top: 20px;">
                <a href="{{ route('public.posts')}}">Ver más</a>
            </div>

        </div>
    </section>

    <section id="testimonial-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="section-heading text-center">
                        <h2>Lo Que Dicen Sobre Nosotros</h2>
                        <p>Conoce las experiencias de nuestros candidatos y
                            clientes que han sido parte de los procesos de
                            selección y reclutamiento en Globant
                            TalentSphere.<br>
                            <br><br>
                            .</p>

                    </div>
                </div>
            </div>

            <div class="testi-wrap">

                <div class="client-single active position-1"
                    data-position="position-1">
                    <div class="client-img">
                        <img
                        src="{{asset('theme-front/globaltalentsphere/img/testimonial/1.png')}}">
                    </div>
                    <div class="client-comment">
                        <h3>Mi proceso de reclutamiento podría describirse en
                            una sola palabra: “eficiente”, ya que desde que tuve
                            el primer contacto estuvo claro que la vacante se
                            tenía que cubrir de forma rápida, y sin embargo,
                            esto no significó que se saltaran pasos, sino que
                            aseguraban a cada paso que yo fuera el candidato
                            ideal e hiciera realmente clic con la vacante. Logré
                            encontrar un trabajo que me apasiona y un equipo en
                            el que puedo desarrollarme profesionalmente.</h3>
                        <span><i class="fa fa-quote-left"></i></span>
                    </div>
                </div>

                <div class="client-single inactive position-2"
                    data-position="position-2">
                    <div class="client-img">
                        <img
                        src="{{asset('theme-front/globaltalentsphere/img/testimonial/2.png')}}">

                    </div>
                    <div class="client-comment">
                        <h3>El proceso de selección llevado a cabo a través de
                            Wiva fue completo, con
                            acompañamiento constante y lleno de
                            retroalimentaciones. Me sentí respaldado en todo
                            momento, desde el inicio hasta mi incorporación, lo
                            que me permitió adaptarme rápidamente a mi nuevo
                            rol.</h3>
                        <span><i class="fa fa-quote-left"></i></span>
                    </div>
                </div>

                <div class="client-single inactive position-3"
                    data-position="position-3">
                    <div class="client-img">
                        <img
                        src="{{asset('theme-front/globaltalentsphere/img/testimonial/3.png')}}">

                    </div>
                    <div class="client-comment">
                        <h3>Mi experiencia en el proceso de selección con
                            Wiva fue excelente. Siempre me
                            mantuvieron al tanto de cada etapa y me
                            proporcionaron un feedback constante, ayudándome a
                            despejar mis dudas. Gracias a ellos, conseguí el
                            trabajo que tanto deseaba.</h3>
                        <span><i class="fa fa-quote-left"></i></span>
                    </div>
                </div>

                <div class="client-single inactive position-4"
                    data-position="position-4">
                    <div class="client-img">
                        <img
                        src="{{asset('theme-front/globaltalentsphere/img/testimonial/4.png')}}">

                    </div>
                    <div class="client-comment">
                        <h3>Me sentí muy cómodo en todo el proceso de selección.
                            Desde el principio, el equipo fue atento y claro,
                            respondiendo rápidamente mis dudas y brindándome
                            retroalimentación en cada etapa. Fue un proceso ágil
                            y profesional. Sin duda, recomiendo trabajar con
                            Wiva.</h3>
                        <span><i class="fa fa-quote-left"></i></span>
                    </div>
                </div>

                <div class="client-single inactive position-5"
                    data-position="position-5">
                    <div class="client-img">
                        <img
                        src="{{asset('theme-front/globaltalentsphere/img/testimonial/5.png')}}">

                    </div>
                    <div class="client-comment">
                        <h3>El equipo de Wiva logró encontrar el
                            trabajo perfecto para mí. Desde el primer contacto,
                            el proceso fue rápido, claro y enfocado en mis
                            necesidades. Agradezco el acompañamiento y el
                            compromiso demostrado durante todo el proceso.</h3>
                        <span><i class="fa fa-quote-left"></i></span>
                    </div>
                </div>

                <div class="client-single inactive position-6"
                    data-position="position-6">
                    <div class="client-img">
                        <img
                        src="{{asset('theme-front/globaltalentsphere/img/testimonial/6.png')}}">

                    </div>
                    <div class="client-comment">
                        <h3>Gracias a Wiva, conseguí mi primer
                            empleo en tecnología. El equipo fue profesional,
                            atento y siempre dispuesto a resolver mis dudas.
                            Recomiendo ampliamente sus servicios.</h3>
                        <span><i class="fa fa-quote-left"></i></span>
                    </div>
                </div>

                <div class="client-single inactive position-7"
                    data-position="position-7">
                    <div class="client-img">
                        <img
                        src="{{asset('theme-front/globaltalentsphere/img/testimonial/7.png')}}">

                    </div>
                    <div class="client-comment">
                        <h3>El acompañamiento durante mi proceso de selección
                            fue inigualable. Me mantuvieron informado y apoyado
                            en cada etapa, logrando que obtuviera la posición
                            perfecta para mi perfil. Gracias, Wiva.</h3>
                        <span><i class="fa fa-quote-left"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
    @section('other-scripts')

    <script>
        $(document).ready(function () {

        $('.client-single').on('click', function (event) {
        event.preventDefault();

    var active = $(this).hasClass('active');

    var parent = $(this).parents('.testi-wrap');

    if (!active) {
        var activeBlock = parent.find('.client-single.active');

        var currentPos = $(this).attr('data-position');

        var newPos = activeBlock.attr('data-position');

        activeBlock.removeClass('active').removeClass(newPos).addClass('inactive').addClass(currentPos);
        activeBlock.attr('data-position', currentPos);

        $(this).addClass('active').removeClass('inactive').removeClass(currentPos).addClass(newPos);
        $(this).attr('data-position', newPos);

    }
    });

    }(jQuery));

</script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>



    <script>
  class SupahBlob {
    constructor(obj) {
      if (!obj.el) return;

      this.el = obj.el;
      this.segments = obj.segments || 8;
      this.centerX = obj.centerX || 400;
      this.centerY = obj.centerY || 400;
      this.minRadius = obj.minRadius || 300;
      this.maxRadius = obj.maxRadius || 380;
      this.minDuration = obj.minDuration || 4;
      this.maxDuration = obj.maxDuration || 6;
      this.maskEl = obj.maskEl || null;
      this.maskID = obj.maskID || null;

      this.init();
    }

    init() {
      this.points = [];
      const slice = Math.PI * 2 / this.segments;
      const tl = new gsap.timeline({
        onUpdate: () => {
          this.update();
        }
      });

      for (let i = 0; i < this.segments; i++) {
        const angle = slice * i;
        const duration = gsap.utils.random(this.minDuration, this.maxDuration);

        const p = {
          x: this.centerX + (Math.cos(angle) * this.minRadius),
          y: this.centerX + (Math.sin(angle) * this.minRadius),
        };

        const tween = gsap.to(p, {
          duration,
          x: this.centerX + Math.cos(angle) * this.maxRadius,
          y: this.centerX + Math.sin(angle) * this.maxRadius,
          ease: 'sine.inOut',
          repeat: -1,
          yoyo: true,
        });
        tl.add(tween, -duration);
        this.points.push(p);
      }
    }

    update() {
      this.el.setAttribute('d', this.createPath());

      if (this.maskEl) {
        this.maskEl.style.clipPath = 'none';
        this.maskEl.style.webkitClipPath = 'none';
        this.maskEl.offsetWidth;
        this.maskEl.style.clipPath = `url("${this.maskID}")`;
        this.maskEl.style.webkitClipPath = `url("${this.maskID}")`;
      }
    }

    createPath() {
      const data = this.points;
      const size = this.points.length;

      let path = `M${data[0].x} ${data[0].y} C`;

      for (let i = 0; i < size; i++) {
        const p0 = data[(i - 1 + size) % size];
        const p1 = data[i];
        const p2 = data[(i + 1) % size];
        const p3 = data[(i + 2) % size];

        const x1 = p1.x + (p2.x - p0.x) * 0.15;
        const y1 = p1.y + (p2.y - p0.y) * 0.15;
        const x2 = p2.x - (p3.x - p1.x) * 0.15;
        const y2 = p2.y - (p3.y - p1.y) * 0.15;

        path += ` ${x1} ${y1} ${x2} ${y2} ${p2.x} ${p2.y}`;
      }

      return `${path}z`;
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    const blob1 = new SupahBlob({
      el: document.querySelector('#path-1'),
      segments: 9,
      centerX: 400,
      centerY: 400,
      minRadius: 300,
      maxRadius: 380,
      minDuration: 4,
      maxDuration: 6,
      maskEl: document.querySelector('.img_b img'),
      maskID: '#mask'
    });

    const blob2 = new SupahBlob({
      el: document.querySelector('#path-2'),
      segments: 9,
      centerX: 200,
      centerY: 200,
      minRadius: 150,
      maxRadius: 200,
      minDuration: 4,
      maxDuration: 6,
      maskEl: document.querySelector('.img_b img'),
      maskID: '#mask-small'
    });
  });
</script>

    <script>let currentIndex = 0;
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');

    function updateCarousel() {
        const itemWidth = items[0].offsetWidth;
        const offset = -currentIndex * itemWidth;
        carousel.style.transform = `translateX(${offset}px)`;
    }

    function nextSlide() {
        currentIndex++;
        if (currentIndex > items.length - 1) {
            currentIndex = 0; // Reinicia al inicio si llegamos al final
        }
        updateCarousel();
    }

    function prevSlide() {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = items.length - 1; // Reinicia al último si retrocede desde el inicio
        }
        updateCarousel();
    }

    window.addEventListener('resize', updateCarousel);
    updateCarousel(); // Inicializa el carrusel en la posición correcta

</script>
<script>
    $(document).ready(function () {
        $('.toggle-btn').on('click', function () {
            const $currentText = $(this).prev('.expandable-text'); // Selecciona el párrafo anterior al botón

            // Cierra cualquier otro párrafo expandido
            $('.expandable-text.expanded').not($currentText).each(function () {
                $(this).removeClass('expanded'); // Elimina la clase "expanded"
                $(this).next('.toggle-btn').text('Mostrar más'); // Cambia el texto del botón
            });

            // Alterna la clase "expanded" en el párrafo actual
            $currentText.toggleClass('expanded');

            // Cambia el texto del botón actual
            if ($currentText.hasClass('expanded')) {
                $(this).text('Mostrar menos');
            } else {
                $(this).text('Mostrar más');
            }
        });
    });
</script>
    @stop
