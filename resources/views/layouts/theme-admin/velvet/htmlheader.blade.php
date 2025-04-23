
    <head>

        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="Descubre ClubLavaCar en Yerba Buena, Tucumán: el único lavadero de autos con bar café y suscripción mensual para lavados ilimitados.">
        <meta name="keywords" content="ClubLavaCar, lavadero de autos, Yerba Buena, Tucumán, bar café, suscripción mensual, lavados ilimitados">
        <meta name="author" content="ClubLavaCar">

        <meta name="keywords" content="dashboard, admin, dashboard template, admin template, laravel, php laravel, laravel bootstrap, laravel admin template, bootstrap laravel, bootstrap in laravel, laravel dashboard template, laravel admin, laravel dashboard, laravel blade template, php admin">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- FAVICON -->
        @if(isset($setting->favicon_imagen))
            <link rel="shortcut icon" type="image/x-icon" href="{{asset($setting->favicon_imagen)}}">
        @else
            <link rel="shortcut icon" type="image/x-icon" href="assets\images\brand\favicon.ico">
        @endif



		<!-- TITLE -->
		<title>@if(isset($setting->name)) {{$setting->name}} @endif</title>

        <!-- BOOTSTRAP CSS -->
        <link id="style" rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/bootstrap/css/bootstrap.min.css')}}">
        <!-- ICONS CSS -->
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/css/icons.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


        <!-- STYLES CSS -->
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/css/styles.css')}}">
        <!-- NODE WAVES CSS -->
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/node-waves/waves.min.css')}}">
        <!-- SIMPLEBAR CSS -->
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/simplebar/simplebar.min.css')}}">
        <!-- COLOR PICKER CSS -->
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/flatpickr/flatpickr.min.css')}}">
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/%40simonwep/pickr/themes/nano.min.css')}}">
        <!-- CHOICES CSS -->
        <!-- JSVECTOR MAPS CSS -->
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/jsvectormap/css/jsvectormap.min.css')}}">

        <!-- FILEPOND CSS -->
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/filepond/filepond.min.css')}}">
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css')}}">
        <link rel="stylesheet" href="{{asset('theme-admin/velvet/assets/libs/dropzone/dropzone.css')}}">

        {{-- Daterangepicker --}}
        {!!Html::style('theme-admin/velvet/assets/plugins/bootstrap-daterangepicker/daterangepicker.css')!!}
        {!!Html::style('theme-admin/velvet/assets/plugins/date-picker/spectrum.css')!!}
        {{-- C3 CHARTS CSS --}}
        {!!Html::style('theme-admin/velvet/assets/plugins/charts-c3/c3-chart.css')!!}
        {{-- P-scroll bar css --}}
        {!!Html::style('theme-admin/velvet/assets/plugins/p-scroll/perfect-scrollbar.css')!!}
        {{-- FONT-ICONS CSS --}}
        {!!Html::style('theme-admin/velvet/assets/plugins/icons/icons.css')!!}
        {{-- Fontawesome --}}
        {!!Html::style('theme-admin/velvet/assets/plugins/fontawesome/fontawesome-free-6.2.1/css/all.min.css')!!}
        <!-- TOASTR -->
        {!!Html::style('theme-admin/velvet/assets/plugins/toastr/css/toastr.css')!!}
        {{-- Datepicker material --}}
        {!!Html::style('theme-admin/velvet/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')!!}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        {!!Html::style('theme-admin/velvet/assets/plugins/fileuploads/css/fileupload.css')!!}
        {{-- colorpicker --}}
        {!!Html::style('theme-admin/velvet/assets/plugins/bootstrap-colorpicker/css/colorpicker.css')!!}
         <!-- SELECT2 CSS -->
         {!!Html::style('theme-admin/velvet/assets/plugins/select2/select2.min.css')!!}


        <!-- CKEDITOR -->
        {{-- <style>
            .ck.ck-balloon-panel {
                z-index: 1055 !important; /* Debe estar por encima del modal de Bootstrap */
            }
        </style> --}}


        @yield('other-css')

    </head>
