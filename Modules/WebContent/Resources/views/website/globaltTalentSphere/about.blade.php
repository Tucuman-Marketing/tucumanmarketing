@extends('webcontent::website.globaltTalentSphere.layouts.index')

@section('other-css')
@stop

@section('content')
@include('flash::message')

<!-- Start Page Banner -->
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content">
            <h2>Nosotros</h2>
            <ul>
                <li>
                    <a href="/">Inicio</a>
                </li>
                <li>Nosotros</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Banner -->

<!-- Start About Area -->
<section class="about-area bg-ffffff ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content-warp">
                    <span>Nuestro Origen</span>
                    <h3>De un sueño a la acción <br> Ivana Sánchez, Fundadora & CEO</h3>
                    <p>Licenciada en Relaciones del Trabajo, Coach Ontológico Profesional y especializada en Project Management y Recursos Humanos 4.0.</p>
                    <p>Docente de talleres de empleabilidad y selección en la Facultad de Ciencias Sociales de la UBA.</p>

                    <ul class="about-warp-list">
                        <li>
                            <i class="flaticon-check"></i>
                            Experiencia en RRHH corporativo
                        </li>

                        <li>
                            <i class="flaticon-check"></i>
                            Destacada TOP HR Influencer 2024 de GOintegro
                        </li>

                        <li>
                            <i class="flaticon-check"></i>
                            Especialista en gestión del talento
                        </li>

                        <li>
                            <i class="flaticon-check"></i>
                            Acompañamiento a empresas en todas sus etapas
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-image">
                    <img src="{{asset('theme-front/globaltalentsphere/img/globaltalent.png')}}" alt="Wiva - Consultora">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area -->

<!-- Start Banking Area -->
<section class="banking-area bg-ffffff ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banking-image">
                    <img src="{{asset('theme-front/globaltalentsphere/img/maps.png')}}" alt="Cobertura Global">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="banking-content">
                    <span>¿Por qué Elegirnos?</span>
                    <h3>Somos aliados estratégicos de importantes compañías en Latam</h3>
                    <p>En Wiva, nos integramos como una extensión natural de tu equipo de Recursos Humanos, construyendo relaciones de confianza a largo plazo.</p>

                    <ul class="banking-list">
                        <li><i class="flaticon-check"></i> Entendemos profundamente la cultura y necesidades de tu empresa</li>
                        <li><i class="flaticon-check"></i> Modelo probado que asegura agilidad y calidad en cada búsqueda</li>
                        <li><i class="flaticon-check"></i> Amplia red de contactos en toda Latinoamérica</li>
                        <li><i class="flaticon-check"></i> Reducimos tiempos, costos y minimizamos el riesgo de rotación</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banking Area -->

<!-- Start Contact CTA Area -->
<section class="contact-cta-area ptb-100">
    <div class="container">
        <div class="contact-cta-content">
            <h2>¡Solo te falta un paso para llegar al mejor talento de LatAm!</h2>
            <p>Ponte en contacto con nosotros y descubre cómo podemos ayudarte a encontrar el talento ideal para tu equipo. Estamos aquí para responder tus consultas y acompañarte en cada paso del proceso.</p>
            <a href="{{ route('public.contact')}}" class="default-btn">Contacto</a>
        </div>
    </div>
</section>
<!-- End Contact CTA Area -->

@endsection

@section('other-scripts')
@stop
