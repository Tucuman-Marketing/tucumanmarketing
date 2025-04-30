@extends('webcontent::website.rrhh.layouts.index')

@section('other-css')
@stop

@section('content')
@include('flash::message')

<!-- Start Main Banner Area -->
<div class="main-banner">
    <div class="main-banner-item">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="main-banner-content">
                        <h1>Impulsamos tu presencia digital en Tucumán</h1>
                        <p>Somos una agencia de marketing digital especializada en ayudar a empresas tucumanas a crecer y destacar en el mundo digital.</p>
                        <div class="banner-btn">
                            <a href="{{ route('public.contact') }}" class="default-btn">Comenzar ahora</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="main-banner-image">
                        <img src="{{ asset('theme-front/tucumanmarketing/img/main-banner/banner-image-1.png') }}" class="black-logo" alt="Marketing Digital">
                        <img src="{{ asset('theme-front/tucumanmarketing/img/main-banner/banner-image-2.png') }}" class="white-logo" alt="Marketing Digital">
                        {{-- <div class="banner-mobile">
                            <img src="{{ asset('theme-front/tucumanmarketing/img/main-banner/banner-mobile.png') }}" alt="Marketing Digital Mobile">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-banner-shape">
        <div class="shape-1">
            <img src="{{ asset('theme-front/tucumanmarketing/img/main-banner/banner-shape-1.png') }}" alt="shape">
        </div>
    </div>
</div>
<!-- End Main Banner Area -->

<!-- Start Banking Area -->
<section id="quienes-somos" class="banking-area pb-100">
    <div class="container">
        <br>
        <h1 style="text-align: center;">Quienes somos</h1>
        <br>
        <h3 style="text-align: center;">Somos una consultora de negocios y marketing con 15 años de experiencia
            Actualmente brindamos servicios de consultoría o asesoramiento personalizado
            a emprendedores, comercios, empresas e industrias.</h3>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banking-image">
                    <img src="{{ asset('theme-front/tucumanmarketing/img/banking/banking-1.png') }}" alt="image">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="banking-content">
                    <span>Hacé que tu marca se destaque. Nosotros te guiamos</span>
                    <h3>Creamos estrategias personalizadas para mejorar tu posicionamiento, rentabilidad y presencia en el mercado.</h3>

                    <ul class="banking-list">
                        <li><i class="flaticon-check"></i> Optimizamos tus precios con enfoque estratégico para mejorar tu rentabilidad.</li>
                        <li><i class="flaticon-check"></i> Te ayudamos a definir una propuesta de valor clara y diferenciadora.</li>
                        <li><i class="flaticon-check"></i> Acompañamos el desarrollo de tu marca con visión de largo plazo.</li>
                        <li><i class="flaticon-check"></i> Diseñamos acciones de marketing alineadas a los objetivos de tu negocio.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banking Area -->

<!-- Start Fun Facts Area -->
<section id="porque-elegirnos" class="fun-facts-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span>¿Por qué elegirnos?</span>
            <h2>Somos una consultora de negocios y marketing con 15 años de experiencia.</h2>
        </div>

        <div class="fun-facts-inner">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-fun-fact">
                        <h3>
                            <span class="odometer" data-count="+500">00</span>
                        </h3>
                        <p>clientes</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-fun-fact">
                        <h3>
                            <span class="odometer" data-count="15">00</span>
                        </h3>
                        <p>Años de mercado</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-fun-fact">
                        <h3>
                            <span class="odometer" data-count="1200">00</span>
                        </h3>
                        <p>Proyectos completados</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-fun-fact">
                        <h3>
                            <span class="odometer" data-count="350">00</span>
                        </h3>
                        <p>Campañas publicitarias</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Fun Facts Area -->

<!-- Start Protect Area -->
<section class="protect-area pb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="protect-content">
                    <span>Potenciamos tu negocio, cuidamos tu inversión</span>
                    <h3>Creamos soluciones inteligentes para que tu marca crezca con seguridad y visión estratégica.</h3>
                    <p>Trabajamos junto a vos para que cada decisión en tu emprendimiento, comercio o empresa esté respaldada
                        por análisis, experiencia y resultados. Nuestra misión es acompañarte con acciones concretas, medibles y
                        enfocadas en el largo plazo.</p>

                    <div class="protect-inner-content">
                        <div class="number">
                            <span>1</span>
                        </div>

                        <h4>Diagnóstico estratégico profundo</h4>
                        <p>Analizamos tu negocio en su contexto real para ofrecerte un plan de acción sólido, adaptado a tu etapa y objetivos.</p>
                    </div>

                    <div class="protect-inner-content">
                        <div class="number">
                            <span>2</span>
                        </div>

                        <h4>Metodología enfocada en resultados</h4>
                        <p>Nuestras recomendaciones están pensadas para lograr rentabilidad, posicionamiento y valor de marca desde el primer mes.</p>
                    </div>

                    <div class="protect-inner-content">
                        <div class="number">
                            <span>3</span>
                        </div>

                        <h4>Acompañamiento continuo y personalizado</h4>
                        <p>No solo diseñamos estrategias, te guiamos paso a paso para implementarlas con éxito, adaptándonos a tu ritmo y capacidad operativa.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="protect-image"></div>
            </div>
        </div>
    </div>
</section>
<!-- End Protect Area -->

<!-- Start Services Area -->
<section id="servicios" class="services-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>Servicios</span>
            <h2>Nuestros clientes pueden acceder a estos servicios</h2>
        </div>

        <div class="services-slider owl-carousel owl-theme">
            <div class="single-services-item">
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>
                    <a href="#">Estrategias de Marketing Digital</a>
                </h3>
                <p>Creamos estrategias personalizadas para aumentar tu visibilidad y atraer más clientes a tu negocio.</p>
                <a href="#" class="learn-btn">Learn more <i class="flaticon-right-arrow"></i></a>
            </div>

            <div class="single-services-item">
                <div class="icon">
                    <i class="fas fa-share-alt"></i>
                </div>
                <h3>
                    <a href="#">Gestión de Redes Sociales</a>
                </h3>
                <p>Impulsa tu marca en redes sociales con contenido creativo y campañas efectivas.</p>
                <a href="#" class="learn-btn">Learn more <i class="flaticon-right-arrow"></i></a>
            </div>

            <div class="single-services-item">
                <div class="icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h3>
                    <a href="#">Diseño Web Profesional</a>
                </h3>
                <p>Diseñamos sitios web modernos y funcionales que representan la esencia de tu marca.</p>
                <a href="#" class="learn-btn">Learn more <i class="flaticon-right-arrow"></i></a>
            </div>

            <div class="single-services-item">
                <div class="icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>
                    <a href="#">SEO y Posicionamiento Web</a>
                </h3>
                <p>Optimiza tu presencia en buscadores y alcanza las primeras posiciones en Google.</p>
                <a href="#" class="learn-btn">Learn more <i class="flaticon-right-arrow"></i></a>
            </div>

            <div class="single-services-item">
                <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h3>
                    <a href="#">Publicidad Digital</a>
                </h3>
                <p>Llega a tu público objetivo con campañas publicitarias en Google Ads y redes sociales.</p>
                <a href="#" class="learn-btn">Learn more <i class="flaticon-right-arrow"></i></a>
            </div>

            <div class="single-services-item">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>
                    <a href="#">Email Marketing</a>
                </h3>
                <p>Conecta con tus clientes a través de campañas de email marketing personalizadas.</p>
                <a href="#" class="learn-btn">Learn more <i class="flaticon-right-arrow"></i></a>
            </div>

            <div class="single-services-item">
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h3>
                    <a href="#">Análisis de Datos</a>
                </h3>
                <p>Toma decisiones informadas con reportes detallados y análisis de métricas clave.</p>
                <a href="#" class="learn-btn">Learn more <i class="flaticon-right-arrow"></i></a>
            </div>

            <div class="single-services-item">
                <div class="icon">
                    <i class="fas fa-palette"></i>
                </div>
                <h3>
                    <a href="#">Branding y Diseño Gráfico</a>
                </h3>
                <p>Construimos una identidad visual única para que tu marca destaque en el mercado.</p>
                <a href="#" class="learn-btn">Learn more <i class="flaticon-right-arrow"></i></a>
            </div>
        </div>
    </div>
</section>


<!-- Start Customer Area -->
<section class="customer-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>Lo que dicen nuestros clientes sobre nosotros</h2>
        </div>

        <div class="customer-slider owl-carousel owl-theme">
            <div class="customer-item">
                <img src="{{ asset('theme-front/tucumanmarketing/img/customer/customer-1.jpg') }}" alt="image">
                <p>"Gracias al equipo de Tucumán Marketing logramos ordenar nuestros precios, mejorar nuestra propuesta de valor y duplicar las ventas en solo 3 meses."</p>

                <div class="customer-info">
                    <h3>Paula Rodríguez</h3>
                    <span>Software engineer</span>
                </div>

                <div class="icon">
                    <i class="flaticon-right-quotation-mark"></i>
                </div>
            </div>

            <div class="customer-item">
                <img src="{{ asset('theme-front/tucumanmarketing/img/customer/customer-2.jpg') }}" alt="image">
                <p>"Nos ayudaron a profesionalizar nuestra imagen de marca y posicionarnos mejor frente a la competencia. Hoy nuestros clientes nos eligen con más confianza."</p>

                <div class="customer-info">
                    <h3>Marcos Fernández</h3>
                    <span>Software engineer</span>
                </div>

                <div class="icon">
                    <i class="flaticon-right-quotation-mark"></i>
                </div>
            </div>

            <div class="customer-item">
                <img src="{{ asset('theme-front/tucumanmarketing/img/customer/customer-1.jpg') }}" alt="image">
                <p>"El acompañamiento fue clave. No solo nos brindaron una estrategia clara, sino que nos guiaron en cada paso para implementarla. Excelente experiencia."</p>

                <div class="customer-info">
                    <h3>Verónica López</h3>
                    <span>Software engineer</span>
                </div>

                <div class="icon">
                    <i class="flaticon-right-quotation-mark"></i>
                </div>
            </div>

            <div class="customer-item">
                <img src="{{ asset('theme-front/tucumanmarketing/img/customer/customer-2.jpg') }}" alt="image">
                <p>"Con su asesoría entendimos cómo comunicar nuestro diferencial. Ahora tenemos una marca sólida, coherente y reconocida por nuestros clientes."</p>

                <div class="customer-info">
                    <h3>Alejandro González</h3>
                    <span>Software engineer</span>
                </div>

                <div class="icon">
                    <i class="flaticon-right-quotation-mark"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Customer Area -->


@endsection

@section('other-scripts')
<!-- Jquery Slim JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/bootstrap.bundle.min.js') }}"></script>
<!-- Meanmenu JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/jquery.meanmenu.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/jquery.nice-select.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Odometer JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/odometer.min.js') }}"></script>
<!-- Jquery Appear JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/jquery.appear.min.js') }}"></script>
<!-- Ajaxchimp JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/jquery.ajaxchimp.min.js') }}"></script>
<!-- Form Validator JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/form-validator.min.js') }}"></script>
<!-- Contact JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/contact-form-script.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/wow.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('theme-front/tucumanmarketing/js/main.js') }}"></script>
@stop
