<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--  Meta Palabras Clave -->
        <meta name="keywords" content="Somos un Gremio especializado en la recolección de recursos, su procesamiento y posterior fabricación de items.">
        <meta name="article:tag" content="Gremio Linhir">

        <!--  Meta Descripción -->
        <meta name="description" content="Web Oficial del Gremio Linhir">  
        <!--  Meta Título -->
        <meta property="og:title" content="Gremio Linhir">
        <meta property="og:image:alt" content="Gremio Linhir">
        <!--  Meta Image -->
        <meta property="og:image" content="{{ asset('/plantilla/Navidad.png') }}">        
        <meta property="og:url" content="https://linhir.site/">

        <title>{{ config('app.name', 'Linhir') }}</title>

        <!-- Fonts -->
        
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/plantilla/favicon.ico') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
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
    </body>
</html>
