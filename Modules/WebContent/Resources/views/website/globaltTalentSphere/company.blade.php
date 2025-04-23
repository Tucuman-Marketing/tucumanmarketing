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
            <h1>¿Estas listo para descubrir a los mejores talentos en Latam?</h1>
            <p style="text-align: center"><strong>Si has llegado hasta aquí, es porque reconoces la importancia de contar con el talento adecuado en tu equipo.</strong> </p>
        </div>
    </div>
</header>


  <section class="form_b">
    <div class="container">
      <div class="form_contact">
        <h2>¡Potencia tu equipo con el talento adecuado! </h2>
        <p>En Wiva, sabemos que el éxito de tu empresa depende en gran medida del talento que la impulsa. Estamos comprometidos en ayudarte a encontrar a los profesionales ideales que encajen con la cultura y las metas de tu organización. Completa el formulario a continuación y nos pondremos en contacto contigo para ofrecerte soluciones personalizadas que fortalezcan tu equipo y promuevan tu crecimiento.</p>
    </p>
        <form method="POST" action="{{ route("public.contactCompanySubmit") }}" enctype="multipart/form-data">
            @csrf
            <div class="rpl_b" style="display: flex; flex-wrap: wrap; gap: 15px;">
                <div style="flex: 1; min-width: 250px;">
                    <input name="name_company" placeholder="Nombre de la Empresa" required style="width: 100%;">
                </div>
                <div style="flex: 1; min-width: 250px;">
                    <input name="name" placeholder="Nombre de responsable" required style="width: 100%;">
                </div>
                <div style="flex: 1; min-width: 250px;">
                    <input name="email" placeholder="Email" required style="width: 100%;">
                </div>

                <div style="flex: 1; min-width: 250px;">
                    <input name="phone" placeholder="Teléfono con código de área" style="width: 100%;">
                </div>
                <div style="flex: 1; min-width: 250px;">
                    <input name="linkedin" placeholder="URL de LinkedIn" style="width: 100%;">
                </div>

            </div>

          <textarea name="message" placeholder="Cuentanos un poco sobre tu necesidad" required></textarea>

          <div class="button">
            <br>
            <button type="submit">Enviar Mensaje</button>
          </div>
        </form>
      </div>
    </div>
  </section>




@endsection



@section('other-scripts')
@stop
