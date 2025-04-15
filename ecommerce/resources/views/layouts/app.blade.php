<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        <title>{{ config('app.name', 'Laravel') }} | @yield('title', 'Página Inicial')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Preload CSS para melhor performance -->
        <link rel="preload" href="{{ mix('css/app.css') }}" as="style">
        
        <!-- Additional CSS -->
        @stack('styles')
        
        <!-- Livewire Styles -->
        @livewireStyles
        
        <!-- Meta Tags para SEO -->
        <meta name="description" content="@yield('description', config('app.description', 'Descrição padrão do site'))">
        <meta name="keywords" content="@yield('keywords', 'palavras, chave, padrão')">
        <meta name="author" content="@yield('author', config('app.name'))">
        
        <!-- Open Graph / Social Media -->
        <meta property="og:title" content="@yield('og:title', config('app.name'))">
        <meta property="og:description" content="@yield('og:description', config('app.description', 'Descrição para redes sociais'))">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="@yield('og:image', asset('images/og-image.jpg'))">
        
        <!-- Canonical URL para SEO -->
        <link rel="canonical" href="{{ url()->current() }}" />
    </head>
    <body class="font-sans antialiased">
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXX"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>

        <x-banner />

        <div class="min-h-screen bg-gray-100 flex flex-col">
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
            <main class="flex-grow container mx-auto px-4 py-6">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                
                @hasSection('content')
                    @yield('content')
                @else
                    {{ $slot }}
                @endif
            </main>

            <!-- Footer -->
            <footer class="bg-white shadow mt-auto">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-gray-500 text-sm">
                        &copy; {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.
                    </p>
                </div>
            </footer>
        </div>

        @stack('modals')
        @livewireScripts
        @stack('scripts')
        
        <!-- Analytics (opcional) -->
        @production
            <script>
                (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-XXXXXX');
            </script>
        @endproduction
    </body>
</html>