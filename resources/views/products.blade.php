@extends('layouts.app')

@section('title', 'WF1')

@section('content')

    @php
        $images = [
            [
                'src' => asset('img/inmueble-0.jpeg'),
            ],
            [
                'src' => asset('img/inmueble-1.jpeg'),
            ],
        ];
    @endphp


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="bg-gray-100 flex flex-col justify-center items-center container mx-auto px-4 pb-4 lg:w-3/4 lg:py-8">
        <div class="flex flex-wrap justify-center items-center -mx-4">

            <div id="default-carousel" class="relative w-full mb-6" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{  asset('storage' . $property->pic1) }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{  asset('storage' . $property->pic2) }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{  asset('storage' . $property->pic3) }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{  asset('storage' . $property->pic4) }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{  asset('storage' . $property->pic5) }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <!-- Product Details -->
            <section class="flex flex-col md:flex-row w-full">

                <div class="w-full md:w-3/4">

                    <div class=" px-4">
                        <h2 class="text-3xl font-bold mb-2">{{ $property->title }}</h2>
                        <p class="text-gray-600 mb-4">
                            En {{ $property->trade }}
                        </p>
                        <div class="mb-4">
                            <span class="text-2xl font-bold mr-2">${{ number_format($property->price, 2, ',', '.') }}</span>
                        </div>


                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Detalles:</h3>
                            <div class="flex space-x-2">
                                <ul
                                    class="tracking-normal mt-1 text-lg text-gray-500 w-full flex justify-between flex-col sm:flex-row sm:text-sm">
                                    <li class="inline-flex gap-x-3">
                                        <i class=" fa-solid fa-bed"></i>
                                        <p>Habitaciones {{ $property->bedrooms }}</p>
                                    </li>
                                    <li class="inline-flex gap-x-3">
                                        <i class=" fa-solid fa-shower"></i>
                                        <p>Baños {{ $property->bathrooms }}</p>
                                    </li>
                                    <li class="inline-flex gap-x-3">
                                        <i class="fa-solid fa-car"></i>
                                        <p>Estacinamientos {{ $property->parkings }}</p>
                                    </li>
                                    <li class="inline-flex gap-x-3">
                                        <i class=" fa-solid fa-ruler-combined"></i>
                                        <p>Area {{ $property->area }} m<sup>2</sup></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Descripción:</h3>
                            <p class="text-gray-700 mb-6">{{ $property->description }}</p>
                        </div>
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Direccion:</h3>
                            <p class="text-gray-700 mb-6">
                                {{ $property->address->state . ' > ' . $property->address->municipality . ' > ' . $property->address->parish }}
                            </p>
                        </div>


                        {{-- <div>
                            <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
                            <ul class="list-disc list-inside text-gray-700">
                                <li>Industry-leading noise cancellation</li>
                                <li>30-hour battery life</li>
                                <li>Touch sensor controls</li>
                                <li>Speak-to-chat technology</li>
                            </ul>
                        </div> --}}
                    </div>



                </div>

                <aside class="px-4 mb-6 md:w-1/4">
                    <h3 class="text-lg font-semibold mb-2">Asesores:</h3>
                    <div class="flex justify-center">
                        @foreach ($property->advisors as $advisor)
                            <div
                                class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:sticky lg:top-[10px]">
                                <div class="flex flex-col items-center py-6">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                                        src="{{ asset('img/Arnoldo.jpg') }}" alt="advisor-image" />
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                        {{ $advisor->person->name }} {{ $advisor->person->lastname }}</h5>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                                    <div class="flex mt-4 md:mt-6">
                                        <a href="#"
                                            class="px-4 py-2 ms-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-800">
                                            <i class="fa-brands fa-whatsapp"></i>
                                            Contactar
                                        </a>
                                        <a href="#"
                                            class="py-2 px-4 ms-2 text-sm font-medium text-white focus:outline-none bg-red-600 rounded-lg border border-red-200 hover:bg-red-800 focus:z-10 focus:ring-4 focus:ring-red-800 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            <i class="fa-regular fa-envelope"></i>
                                            Correo
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </aside>
            </section>

            <div class=" px-4 flex flex-col md:w-full">
                <div class="mb-3">
                    <h3 class="text-lg font-semibold mb-2">Mapa:</h3>
                </div>

                @if ($property->longitude && $property->latitude)
                    <div class="h-96 w-96 md:w-full mb-6" id="map"></div>
                    <script>
                        console.log("avaina simon");
                        var latitude = {{ $property->latitude }};
                        var longitude = {{ $property->longitude }};

                        var map = L.map('map').setView([longitude, latitude], 16); // Coordenadas centrales

                        // Capa base (OpenStreetMap)
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '© OpenStreetMap contributors'
                        }).addTo(map);

                        var circle = L.circle([longitude, latitude], {
                            color: 'red',
                            fillColor: '#f03',
                            fillOpacity: 0.5,
                            radius: 10
                        }).addTo(map);
                    </script>
                @endif
            </div>



        </div>

        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
                <h1 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 text-center">Propiedades Similares</h1>

                <div class="flex flex-row overflow-hidden mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                    @foreach ($similars as $similar)
                        <x-card
                            :id="$similar->id"
                            :title="$similar->title"
                            :price="$similar->price"
                            :bedrooms="$similar->bedrooms"
                            :bathrooms="$similar->bathrooms"
                            :parkings="$similar->parkings"
                            :area="$similar->area"
                        ></x-card>
                    @endforeach

                </div>
            </div>
        </div>

    </div>

    <script>
        function changeImage(src) {
            document.getElementById('mainImage').src = src;
        }
    </script>

    </div>

@endsection
