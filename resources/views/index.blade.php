<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'WF1') <!-- Opcional: si quisieras personalizar el título en el head -->

@push('style')
    <link rel="stylesheet" href="{{ asset('css/library/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/library/solid.css') }}" />
@endpush

@section('content')
    <section style="min-height:calc(100dvh - 5rem)" class="flex justify-center items-center md:h-100 bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-16 ">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Tu nueva propiedad te espera</h1>
            <p class="mb-8 text-md font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                Descubre las propiedades y terrenos disponibles. De acorde a tus gustos. De acorde a tus necesidades.
                Descubre Terremar
            </p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <div class="lg:w-screen">
                    <div class="flex flex-col">

                        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-lg">
                            <form action="{{ route('property.index') }}">

                                <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                                    <div class="flex flex-col">
                                        <x-select-input :name="'trade'" :placeholder="'Negocios'" :options="$trades" />
                                    </div>

                                    <div class="flex flex-col">
                                        <x-select-input :name="'type'" :placeholder="'Tipo'" :options="$types" />
                                    </div>

                                    <div class="flex flex-col">
                                        <x-select-input :name="'municipality'" :placeholder="'Municipio'" :options="$municipalities" />
                                    </div>
                                    <div
                                        class="md:col-start-3 flex flex-col mt-3 grid w-full grid-cols-2 justify-end gap-3">
                                        <button
                                            class="rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-700 outline-none hover:opacity-80 focus:ring">Limpiar</button>
                                        <button
                                            class="rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Buscar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>

    <section class="bg-gray-900 text-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <p class="mt-2 text-pretty text-4xl font-semibold tracking-tight sm:text-5xl lg:text-balance">
                    Encuentra el lugar donde comienza tu historia
                </p>
                <p class="mt-6 text-md/8 text-gray-400">
                    Descubre propiedades que se ajustan a tus necesidades. Ya sea para tu hogar o inversión, estamos aquí
                    para ayudarte a tomar la mejor decisión.
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-300">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                            Compra con confianza
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-400">
                            Ofrecemos asesoramiento profesional para ayudarte a encontrar la propiedad que mejor se adapte a
                            tu estilo de vida y presupuesto.
                        </dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-200">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                            Propiedades verificadas
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-400">
                            Cada inmueble es revisado cuidadosamente para garantizar la transparencia y calidad en cada
                            transacción.
                        </dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-200">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <i class="fa-solid fa-user-check"></i>
                            </div>
                            Asesoramiento personalizado
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-400">
                            Nuestro equipo está listo para brindarte el mejor soporte en cada paso del proceso, desde la
                            búsqueda hasta el cierre.
                        </dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base/7 font-semibold text-gray-200">
                            <div
                                class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                <i class="fa-solid fa-gauge-high"></i>
                            </div>
                            Soluciones rápidas
                        </dt>
                        <dd class="mt-2 text-base/7 text-gray-400">
                            Te ayudamos a resolver trámites legales y financieros para que tengas una experiencia sin
                            complicaciones.
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900 py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">Servicios Topográficos</h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Contamos con un equipo profesional para ayudarte en cada etapa del desarrollo de tu terreno o proyecto constructivo.</p>
            </div>

            <div class="mt-16 grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Servicio 1 -->
                <div class="flex flex-col">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-600/20 mb-4">
                        <i class="fa-solid fa-ruler-combined text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Levantamientos Topográficos</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Realizamos levantamientos precisos que incluyen <strong>altimetría</strong>, <strong>planimetría</strong> y <strong>deslindes</strong>, esenciales para cualquier análisis de terreno.
                    </p>
                </div>

                <!-- Servicio 2 -->
                <div class="flex flex-col">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-600/20 mb-4">
                        <i class="fa-solid fa-pencil-ruler text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Planificación de Proyectos</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Apoyamos en la elaboración de <strong>proyectos topográficos</strong>, <strong>lotificación</strong> y gestión de <strong>permisología</strong>, garantizando cumplimiento y factibilidad.
                    </p>
                </div>

                <!-- Servicio 3 -->
                <div class="flex flex-col">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-600/20 mb-4">
                        <i class="fa-solid fa-layer-group text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Levantamiento Catastral</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Registramos y actualizamos información técnica y legal de terrenos para facilitar trámites de propiedad y desarrollo urbano.
                    </p>
                </div>

                <!-- Servicio 4 -->
                <div class="flex flex-col">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-600/20 mb-4">
                        <i class="fa-solid fa-calculator text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Cómputos Métricos</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Elaboramos cálculos detallados de cantidades y volúmenes de obra, fundamentales para presupuestos y planificación.
                    </p>
                </div>

                <!-- Servicio 5 -->
                <div class="flex flex-col">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-600/20 mb-4">
                        <i class="fa-solid fa-hard-hat text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Supervisión de Obras</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Brindamos <strong>control y seguimiento</strong> técnico durante la ejecución del proyecto para garantizar calidad y cumplimiento normativo.
                    </p>
                </div>

                <!-- Servicio 6 -->
                <div class="flex flex-col">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-600/20 mb-4">
                        <i class="fa-solid fa-shield-halved text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Seriedad y Responsabilidad</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Nos distinguimos por nuestro compromiso ético y profesional en cada servicio que ofrecemos, asegurando confianza y resultados.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <section class="bg-gray-900 text-white">
        <div class="container px-6 py-12 mx-auto">
            <div class="text-center">
                <p class="font-medium text-blue-400">Contáctanos</p>

                <h1 class="mt-2 text-2xl font-semibold text-white md:text-3xl">
                    Nos encanta platicar con nuestros clientes.
                </h1>

                <p class="mt-3 text-gray-400">Conversa con nuestro amigable equipo.</p>
            </div>

            <img class="object-cover w-full h-64 mt-10 rounded-lg lg:h-96"
                src="https://images.unsplash.com/photo-1568992688065-536aad8a12f6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=100"
                alt="">

            <div class="grid grid-cols-1 gap-12 mt-10 lg:grid-cols-3 sm:grid-cols-2">
                <div class="p-4 rounded-lg bg-gray-800 md:p-6">
                    <span class="inline-block p-3 text-blue-500 rounded-lg bg-gray-700">
                        <!-- ícono -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </span>

                    <h2 class="mt-4 text-base font-medium text-white">Correo Electrónico</h2>
                    <p class="mt-2 text-sm text-gray-400">Escríbenos a nuestro correo electrónico para cualquier duda</p>
                    <a href="mailto:info@terremar.com" class="mt-2 text-sm text-blue-400">info@terremar.com</a>
                </div>

                <div class="p-4 rounded-lg bg-gray-800 md:p-6">
                    <span class="inline-block p-3 text-blue-500 rounded-lg bg-gray-700">
                        <!-- ícono -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </span>

                    <h2 class="mt-4 text-base font-medium text-white">Visítanos</h2>
                    <p class="mt-2 text-sm text-gray-400">Visita nuestra home-office para un trato personal</p>
                    <p class="mt-2 text-sm text-blue-400">Urb. Luisa Cáceres de Arismendi, Sector La Auyama, Nueva Esparta.</p>
                </div>

                <div class="p-4 rounded-lg bg-gray-800 md:p-6">
                    <span class="inline-block p-3 text-blue-500 rounded-lg bg-gray-700">
                        <!-- ícono -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </span>

                    <h2 class="mt-4 text-base font-medium text-white">Llámanos</h2>
                    <p class="mt-2 text-sm text-gray-400">Lun-Dom desde 8am a 8pm.</p>
                    <a href="+584120940522" class="mt-2 text-sm text-blue-400">+58 412 094-0522</a>
                </div>
            </div>
        </div>
    </section>


    <section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex items-end justify-between">
                <div class="flex-1 text-center lg:text-left">
                    <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">Último de Nuestro Blog
                    </h2>
                    <p class="max-w-xl mx-auto mt-4 text-base leading-relaxed text-gray-600 lg:mx-0">Conoce nuestras más
                        recientes publicaciones referentes al mundo de los inmuebles y los terrenos.</p>
                </div>
            </div>

            <div class="grid max-w-md grid-cols-1 gap-6 mx-auto mt-8 lg:mt-16 lg:grid-cols-3 lg:max-w-full">
                @foreach ($blogs as $blog)
                    <div class="overflow-hidden bg-white rounded shadow">
                        <div class="p-5">
                            <div class="relative">
                                <a href="/blog/{{ $blog->title }}" title="" class="block aspect-w-4 aspect-h-3">
                                    <img class="object-cover w-full h-full" src="{{ asset('storage/' . $blog->picture) }}"
                                        alt="Portada de {{ $blog->title }}" />
                                </a>

                                <div class="absolute top-4 left-4">
                                    <span
                                        class="px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full">
                                        {{ $blog->type }} </span>
                                </div>
                            </div>
                            <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase">
                                {{ $blog->created_at }} </span>
                            <p class="mt-5 text-2xl font-semibold">
                                <a href="/blog/{{ $blog->title }}" title="" class="text-black">
                                    {{ $blog->title }}</a>
                            </p>
                            <p class="mt-4 text-base text-gray-600">{{ $blog->description }}</p>
                            <a href="/blog/{{ $blog->title }}" title=""
                                class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                                Continuar Leyendo
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


@endsection
