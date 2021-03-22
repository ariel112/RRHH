<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HUMANSYS') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    {{-- listado del frontend --}}
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png')}}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css')}}">
    
    <!-- Datatable CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css')}}">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    
    
    
    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    {{-- fin del frontend --}}


    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts


    {{-- etiquetas js del frotnend --}}
            <!-- jQuery -->
            <script src="{{ asset('assets/js/jquery-3.2.1.min.js')}}"></script>

            <!-- Bootstrap Core JS -->
            <script src="{{ asset('assets/js/popper.min.js')}}"></script>
            <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

            <!-- Slimscroll JS -->
            <script src="{{ asset('assets/js/jquery.slimscroll.min.js')}}"></script>


            <!-- Select2 JS -->
            <script src="{{ asset('assets/js/select2.min.js') }}"></script>

            <!-- Datatable JS -->
            <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

            <!-- Chart JS -->
            <script src="{{ asset('assets/plugins/morris/morris.min.js')}}"></script>
            <script src="{{ asset('assets/plugins/raphael/raphael.min.js')}}"></script>
            <script src="{{ asset('assets/js/chart.js')}}"></script>

            <!-- Custom JS -->
            <script src="{{ asset('assets/js/app.js')}}"></script>

            <!-- Datetimepicker JS -->
            <script src="{{ asset('assets/js/moment.min.js')}}"></script>
            <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
            
            <!--JS permisos-->

            <script src="{{ asset('assets/js/permisos/permisos.js') }}"></script>

    {{-- fin de frontend --}}
</body>

</html>