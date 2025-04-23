
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
		<title>@if(isset($setting->name)) {{$setting->name}} @endif Club Lavacar</title>

		<!-- BOOTSTRAP CSS -->
        {!!Html::style('theme-admin/volgh/assets/plugins/bootstrap/css/bootstrap.min.css')!!}
		{{-- <link href="assets\plugins\bootstrap\css\bootstrap.min.css" rel="stylesheet"> --}}



		<!-- STYLE CSS -->
        {!!Html::style('theme-admin/volgh/assets/css/style.css')!!}
        {!!Html::style('theme-admin/volgh/assets/css/skin-modes.css')!!}
        {!!Html::style('theme-admin/volgh/assets/css/dark-style.css')!!}

        <!-- HELPDESK STYLE -->
        {!!Html::style('theme-admin/volgh/assets/css/helpdesk-style.css')!!}

        <!-- Login -->
        {!!Html::style('theme-admin/volgh/assets/css/login.css')!!}

		{{-- <link href="assets\css\style.css" rel="stylesheet">
		<link href="assets\css\skin-modes.css" rel="stylesheet">
		<link href="assets\css\dark-style.css" rel="stylesheet"> --}}
        {{-- Image Upload --}}
        {!!Html::style('theme-admin/volgh/assets/plugins/fileuploads/css/fileupload.css')!!}

        <!--daterangepicker -->
        {!!Html::style('theme-admin/volgh/assets/plugins/bootstrap-daterangepicker/daterangepicker.css')!!}
        {!!Html::style('theme-admin/volgh/assets/plugins/date-picker/spectrum.css')!!}

		<!--C3 CHARTS CSS -->
        {!!Html::style('theme-admin/volgh/assets/plugins/charts-c3/c3-chart.css')!!}

		<!-- P-scroll bar css-->
        {!!Html::style('theme-admin/volgh/assets/plugins/p-scroll/perfect-scrollbar.css')!!}

		<!--- FONT-ICONS CSS -->
        {!!Html::style('theme-admin/volgh/assets/plugins/icons/icons.css')!!}

        {{-- fontawesome --}}
        {!!Html::style('theme-admin/volgh/assets/plugins/fontawesome/fontawesome-free-6.2.1/css/all.min.css')!!}

        <!-- SIDE-MENU CSS -->
        {!!Html::style('theme-admin/volgh/assets/css/sidemenu.css')!!}

		<!-- SIDEBAR CSS -->
        {!!Html::style('theme-admin/volgh/assets/plugins/sidebar/sidebar.css')!!}

		<!-- COLOR SKIN CSS -->
        {!!Html::style('theme-admin/volgh/assets/colors/color1.css')!!}

        <!-- SWITCHER SKIN CSS -->
        {!!Html::style('theme-admin/volgh/assets/switcher/css/switcher.css')!!}
        {!!Html::style('theme-admin/volgh/assets/switcher/demo.css')!!}

        <!-- TOASTR -->
        {!!Html::style('theme-admin/volgh/assets/plugins/toastr/css/toastr.css')!!}

        {{-- fontawesome --}}
        {!!Html::style('theme-admin/volgh/assets/plugins/fontawesome/fontawesome-free-6.2.1/css/all.min.css')!!}

        {{-- Datepicker material --}}
        {!!Html::style('theme-admin/volgh/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')!!}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

         <!-- Select 2 -->
        {{-- {!!Html::style('theme-admin/volgh/assets/plugins/multipleselect/multiple-select.css')!!} --}}
        {{-- {!!Html::style('theme-admin/volgh/assets/plugins/select2/select2.min.css')!!} --}}
        {!!Html::style('theme-admin/volgh/assets/plugins/select2/bootstrap/css/select2.css')!!}
        {!!Html::style('theme-admin/volgh/assets/plugins/fileuploads/css/fileupload.css')!!}

        <!-- Datatble -->
        {{-- {!!Html::style('theme-admin/volgh/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')!!}
 --}}

 {{-- colorpicker --}}
 {!!Html::style('theme-admin/volgh/assets/plugins/bootstrap-colorpicker/css/colorpicker.css')!!}

 {{-- Multiple Select --}}
 {!!Html::style('theme-admin/volgh/assets/plugins/multipleselect/multiple-select.css')!!}




@yield('other-css')

    </head>
