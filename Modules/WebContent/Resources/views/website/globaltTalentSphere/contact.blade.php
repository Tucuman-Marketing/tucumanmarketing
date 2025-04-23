@extends('webcontent::website.globaltTalentSphere.layouts.index')

@section('other-css')
@stop


@section('content')
@include('flash::message')

<header class="head_page">
    {{-- <span class="element_two">
        <img src="{{ asset('theme-front/globaltalentsphere/img/cub_two.png') }}" alt="">
    </span> --}}
    <span class="element_three">
        <img src="{{ asset('theme-front/globaltalentsphere/img/cub_three.png') }}" alt="">
    </span>
    {{-- <span class="element_thirteen">
        <img src="{{ asset('theme-front/globaltalentsphere/img/icons/cub_thirteen.png') }}" alt="">
    </span> --}}
    <div class="container title_h">
        <div class="block_title">
            <h1>Contacto</h1>
        </div>
    </div>
</header>


  <section class="form_b">
    <div class="container">
      <div class="form_contact">
        <h2>¿Tienes alguna pregunta o necesitas más información?
        </h2>
        <p>Completa el formulario a continuación y nos pondremos en contacto contigo lo antes posible.

        </p>
        <form method="POST" action="{{ route("public.contactSubmit") }}" enctype="multipart/form-data">
            @csrf
            @if(config('app.recaptcha'))
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" value="">
            @endif

          <div class="rpl_b">
            <input name="name" placeholder="Ingrese el Nombre" required>
            <input name="email" placeholder="Ingrese el Email" required>
          </div>
          <textarea name="message" placeholder="Ingrese el Mensaje" required></textarea>
          {{-- <p>
            <input type="checkbox" value="yes">
            <label>Save my name, email, and website in this browser for the next time I comment.</label>
          </p> --}}
          <div class="button">
            <br>
            <button type="submit">Enviar Mensaje</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  {{-- <section class="map">
    <div class="col-lg-12 p-0">
      <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m10!1m3!1d174066.96780511574!2d32.059409951671284!3d46.9883057226557!2m1!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1565129653470!5m2!1sru!2sua" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </section> --}}



@endsection



@section('other-scripts')
@stop
