@extends('webcontent::website.rrhh.layouts.index')

@section('other-css')
@stop

@section('content')
@include('flash::message')

<!-- Start Page Banner -->
<div class="page-banner-area item-bg3">
    <div class="container">
        <div class="page-banner-content">
            <h2>Contacto</h2>
            <ul>
                <li>
                    <a href="/">Inicio</a>
                </li>
                <li>Contacto</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Banner -->

<!-- Start Contact Info Area -->
<section class="contact-info-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i class="flaticon-office"></i>
                    </div>

                    <h3>Oficina</h3>
                    <p>San Miguel de Tucumán, Tucumán, Argentina</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i class="flaticon-contact"></i>
                    </div>

                    <h3>Contacto</h3>
                    <p><a href="tel:+5493813553101">+54 9 381 355-3101</a></p>
                    <p><a href="mailto:info@tucumanmarketing.com">info@tucumanmarketing.com</a></p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i class="flaticon-time"></i>
                    </div>

                    <h3>Horarios de atención</h3>
                    <p>Lun–Vie: 9 AM - 6 PM</p>
                    <p>Sábado: 9 AM - 1 PM</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Info Area -->

<!-- Start Contact Area -->
<section class="contact-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>Envíanos un mensaje para cualquier consulta</h2>
            <p>Completa el formulario a continuación y nos pondremos en contacto contigo lo antes posible.</p>
        </div>

        <div class="contact-form">
            <form method="POST" action="{{ route('public.contactSubmit') }}" enctype="multipart/form-data">
                @csrf
                @if(config('app.recaptcha'))
                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" value="">
                @endif

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Nombre completo</label>
                            <input type="text" name="name" class="form-control" required placeholder="Tu nombre">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="Tu email">
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Tu mensaje</label>
                            <textarea name="message" class="form-control" cols="30" rows="5" required placeholder="Escribe tu mensaje aquí"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn">Enviar Mensaje</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End Contact Area -->

<!-- Start Map Area -->
<div id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113927.45642999341!2d-65.27939975624999!3d-26.832595899999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94225c0e8d0271b7%3A0x7946062ac490db30!2sSan%20Miguel%20de%20Tucum%C3%A1n%2C%20Tucum%C3%A1n!5e0!3m2!1ses-419!2sar!4v1701799049765!5m2!1ses-419!2sar" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- End Map Area -->

@endsection

@section('other-scripts')
@stop
