<head>
     <!-- Meta tags esenciales -->
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <!-- Descripción y palabras clave -->
     <meta name="description" content="Global Talent Sphere es una empresa colombiana de reclutamiento que trabaja para empresas en toda Latinoamérica, conectando talento con oportunidades laborales.">
     <meta name="keywords" content="reclutamiento, talento, empresas, selección de personal, Latinoamérica, Colombia, Global Talent Sphere">
     <meta name="author" content="Global Talent Sphere">

     <!-- Meta Open Graph para compartir en redes sociales -->
     <meta property="og:title" content="Global Talent Sphere - Reclutamiento en Latinoamérica">
     <meta property="og:description" content="Conectamos empresas con el mejor talento en toda Latinoamérica.">
     <meta property="og:url" content="http://globaltalentsphere.com/">
     <meta property="og:type" content="website">
     <meta property="og:image" content="https://globaltalentsphere.com/theme-front/globaltalentsphere/img/icons/logo_wiva.png">

     <!-- Twitter Card -->
     <meta name="twitter:card" content="summary_large_image">
     <meta name="twitter:title" content="Global Talent Sphere - Reclutamiento en Latinoamérica">
     <meta name="twitter:description" content="Conectamos empresas con el mejor talento en toda Latinoamérica.">
     <meta name="twitter:image" content="https://globaltalentsphere.com/theme-front/globaltalentsphere/img/icons/logo_wiva.png">

     <!-- Favicon para diferentes plataformas -->
     <link rel="icon" href="{{asset('theme-front/globaltalentsphere/img/icons/favicon/Mesa.png')}}" sizes="16x16" type="image/png">
     <link rel="icon" href="{{asset('theme-front/globaltalentsphere/img/icons/favicon/favicon-32x32.png')}}" sizes="32x32" type="image/png">
     <link rel="apple-touch-icon" href="{{asset('theme-front/globaltalentsphere/img/icons/favicon/apple-touch-icon')}}">
     <link rel="manifest" href="{{asset('theme-front/globaltalentsphere/img/icons/favicon/manifest.json')}}">
     <link rel="mask-icon" href="{{asset('theme-front/globaltalentsphere/img/icons/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
     <meta name="msapplication-TileColor" content="#ffffff">
     <meta name="theme-color" content="#ffffff">

     <!-- WhatsApp Sharing -->
     <meta property="og:image" content="https://globaltalentsphere.com/theme-front/globaltalentsphere/img/icons/logo_wiva.png">
     <meta property="og:title" content="Global Talent Sphere">
     <meta property="og:description" content="Conectamos empresas con el mejor talento en Latinoamérica.">
     <meta property="og:url" content="http://globaltalentsphere.com/">

     <title>Wiva - Consultora</title>

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('theme-front/globaltalentsphere/css/libs.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('theme-front/globaltalentsphere/css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SELECT2 CSS -->
    {!!Html::style('theme-admin/velvet/assets/plugins/select2/select2.min.css')!!}

    <!-- FILEPOND CSS -->
    <link rel="stylesheet"
        href="{{asset('theme-admin/velvet/assets/libs/filepond/filepond.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('theme-admin/velvet/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('theme-admin/velvet/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('theme-admin/velvet/assets/libs/dropzone/dropzone.css')}}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @yield('other-css')

    {{-- Paginacion --}}
    <style>
        .nav_pages {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            flex-wrap: nowrap; /* Asegura que los elementos no se envuelvan en una nueva línea */
        }

        .nav_pages .page-item {
            margin: 0 5px; /* Espaciado entre los elementos */
            list-style: none; /* Elimina los puntos de lista */
        }

        .nav_pages .page-item .page-link {
    color: #ffffff;
    background: linear-gradient(135deg, #6f42c1, #af4f9d); /* Aplica el gradiente */
    border: 1px solid transparent; /* Hace que el borde sea del mismo color que el gradiente */
    border-radius: 50%;
    padding: 10px 15px;
    text-align: center;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background-color 0.3s ease, transform 0.3s ease; /* Añade una transición suave para el hover */
}

.nav_pages .page-item .page-link:hover {
    background: linear-gradient(135deg, #5e33a8, #9b4386); /* Gradiente más oscuro en hover */
    border-color: transparent;
    transform: scale(1.1); /* Aumenta ligeramente el tamaño en hover */
}

.nav_pages .page-item.active .page-link {
    background: linear-gradient(135deg, #ff4081, #ff6f61); /* Aplica un gradiente diferente para el estado activo */
    border-color: transparent;
    color: #ffffff;
    transform: scale(1.1); /* Mantiene el aumento de tamaño para el botón activo */
}

        .nav_pages ul {
            padding: 0;
            margin: 0;
            display: flex;
        }

        .nav_pages ul li {
            display: inline-flex;
            align-items: center;
        }


    </style>
</head>
