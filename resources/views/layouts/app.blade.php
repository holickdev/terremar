<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WF1') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Hind:wght@300;400;500;600;700&family=Jost:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @stack('style') <!-- Aquí se colocarán los estilos añadidos con '@-push('styles')' -->
    @stack('script') <!-- Aquí se colocarán los scripts añadidos con @-push('scripts') -->


</head>

<body class="font-sans antialiased">
    <div class="flex flex-col min-h-screen bg-gray-100">
        <!-- Page Heading -->
        <header>
            <nav class="bg-gray-800">
                <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                    <div class="relative flex h-20 items-center justify-between">
                        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                            <!-- Mobile menu button-->
                            <button type="button" id="mobile-menu-button"
                                class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                aria-controls="mobile-menu" aria-expanded="false">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open main menu</span>
                                <!--
                    Icon when menu is closed.

                    Menu open: "hidden", Menu closed: "block"
                  -->
                                <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <!--
                    Icon when menu is open.

                    Menu open: "block", Menu closed: "hidden"
                  -->
                                <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                            <div class="flex mr-4 flex-shrink-0 items-center">
                                <h2 class="text-xl font-bold tracking-tight text-white sm:text-3xl">Terremar</h2>
                            </div>
                            <div class="hidden sm:ml-6 sm:block">
                                <div class="flex space-x-4">
                                    <!-- Link a Inicio -->
                                    <a href="{{ route('index') }}"
                                        class="{{ Route::is('index') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
                                        aria-current="page">Inicio</a>


                                    <!-- Link a Servicios -->
                                    <a href="{{ route('property.index') }}"
                                        class="{{ Route::is('property.index') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
                                        aria-current="page">Terrenos</a>

                                    {{-- <x-dropdown :options="[
                                        ['label' => 'Terrenos', 'url' => route('property.index')],
                                    ]">
                                        Servicios
                                    </x-dropdown> --}}


                                    <!-- Link a Sobre Nosotros -->
                                    <a href="{{ route('about') }}"
                                        class="{{ Route::is('about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                                        Sobre Nosotros
                                    </a>

                                    <!-- Link a Preguntas Frecuentes -->
                                    <a href="{{ route('faq') }}"
                                        class="{{ Route::is('faq') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                                        Preguntas Frecuentes
                                    </a>

                                    <!-- Link a Blog -->
                                    <a href="{{ route('blog') }}"
                                        class="{{ Route::is('blog') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                                        Blog
                                    </a>
                                </div>
                            </div>



                        </div>

                        @auth
                            <div
                                class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                                <x-dropdown :options="[
                                    ['url' => route('dashboard.index'), 'label' => 'Dashboard'],
                                    ['url' => route('dashboard.profile.show'), 'label' => 'Perfil'],
                                ]"
                                    icon="{{ asset('storage/' . auth()->user()->picture) ?? '' }}">
                                    <x-slot name="extra">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                role="menuitem">
                                                Cerrar Sesión
                                            </button>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @endauth
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pb-3 pt-2 flex flex-col">
                        <!-- Link a Inicio -->
                        <a href="{{ route('index') }}"
                            class="{{ Route::is('index') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Inicio</a>

                            <!-- Link a Servicios -->
                        <a href="{{ route('property.index') }}"
                            class="{{ Route::is('property.index') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Servicios</a>

                        <!-- Link a Sobre Nosotros -->
                        <a href="{{ route('about') }}"
                            class="{{ Route::is('about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                            Sobre Nosotros
                        </a>

                        <!-- Link a Preguntas Frecuentes -->
                        <a href="{{ route('faq') }}"
                            class="{{ Route::is('faq') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                            Preguntas Frecuentes
                        </a>

                        <!-- Link a Blog -->
                        <a href="{{ route('blog') }}"
                            class="{{ Route::is('blog') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                            Blog
                        </a>
                    </div>
                </div>
            </nav>
        </header>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const menuButton = document.getElementById("mobile-menu-button");
                const mobileMenu = document.getElementById("mobile-menu");
                menuButton.addEventListener("click", function() {
                    const isExpanded = menuButton.getAttribute("aria-expanded") === "true";
                    menuButton.setAttribute("aria-expanded", !isExpanded);
                    mobileMenu.classList.toggle("hidden");
                });
            });
        </script>

        <!-- Page Content -->
        <main class="grow min-h-screen">
            @yield('content')
        </main>

        <!-- Page Footing -->


        <footer class="shadow-sm bg-gray-900">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Terremar</span>
                    </a>
                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 text-gray-400">
                        <li>
                            <a href="{{route('property.index')}}" class="hover:underline me-4 md:me-6">Inmuebles</a>
                        </li>
                        <li>
                            <a href="{{route('about')}}" class="hover:underline me-4 md:me-6">Sobre Nosotros</a>
                        </li>
                        <li>
                            <a href="{{route('faq')}}" class="hover:underline me-4 md:me-6">FAQ</a>
                        </li>
                        <li>
                            <a href="{{route('blog')}}"class="hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <span class="block text-sm sm:text-center text-gray-400">© 2025 <a href="/" class="hover:underline">Terremar</a>. Todos los Derechos Reservados.</span>
                <span class="mt-4 block text-sm sm:text-center text-gray-400"><a href="https://instagram.com/holick.dev" class="hover:underline">Desarrolado Por Holick</a></span>
            </div>
        </footer>


    </div>
</body>

</html>
