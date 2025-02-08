@extends('layouts.app')

@section('title', 'WF1')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/library/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/library/fontawesome.all.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/library/solid.css') }}" /> --}}
@endpush

@push('script')
    <script src="{{ asset('js/library/flowbite.js') }}"></script>
@endpush

@section('content')
    <div class="bg-gray-100 flex flex-col justify-center items-center container mx-auto px-4 pb-4 lg:w-3/4 lg:py-8">
        <div class="w-full flex flex-wrap justify-center items-center -mx-4">

            <div id="default-carousel" class="relative w-full mb-6" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @foreach ($property->media as $media)
                        <div class="duration-700 ease-in-out"
                            {{ $loop->first ? 'data-carousel-item=active' : 'data-carousel-item' }}>
                            @if (str_starts_with($media->type, 'image/'))
                                <!-- Mostrar imagen -->
                                <img src="{{ asset('storage/' . $media->url) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="Imagen de la propiedad">
                            @elseif (str_starts_with($media->type, 'video/'))
                                <!-- Mostrar video -->
                                <video class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    controls>
                                    <source src="{{ asset('storage/' . $media->url) }}" type="{{ $media->type }}">
                                    Tu navegador no soporta la reproducción de videos.
                                </video>
                            @else
                                <!-- Mostrar mensaje para tipos no soportados -->
                                <p class="text-center text-gray-500">Tipo de archivo no soportado.</p>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    @foreach ($property->media as $index => $media)
                        <button type="button" class="w-3 h-3 rounded-full"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                            data-carousel-slide-to="{{ $index }}"></button>
                    @endforeach
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


        </div>

        <!-- Product Details -->
        <section class="w-full flex flex-col md:flex-row w-full">

            <div class="w-full md:w-3/4">

                <div class=" px-4">
                    <h2 class="text-3xl font-bold mb-2">{{ $property->title }}</h2>
                    <p class="text-gray-600 mb-4">
                        En {{ $property->trade->name }}
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
                            {{ $property->address->state . ' > ' . $property->address->municipality . ' > ' . $property->address->city }}
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

            <aside class="px mb-6 md:w-1/4">
                <h3 class="text-lg font-semibold mb-2">Asesores:</h3>
                <div class="flex justify-center flex-col gap-2">
                    @foreach ($property->advisors as $advisor)
                        <div
                            class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:sticky lg:top-[10px]">
                            <div class="flex flex-col items-center py-6">
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('img/Arnoldo.jpg') }}"
                                    alt="advisor-image" />
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
                                        <i class="fa-solid fa-envelope"></i>
                                        Contactar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </aside>

        </section>

        @if ($property->longitude && $property->latitude)
            @push('style')
                <link href="{{ asset('css/library/leaflet.css') }}" rel="stylesheet" />
            @endpush
            @push('script')
                <script src="{{ asset('js/library/leaflet.js') }}"></script>
            @endpush
            <div class=" px-4 flex flex-col md:w-full">
                <div class="mb-3">
                    <h3 class="text-lg font-semibold mb-2">Mapa:</h3>
                </div>

                <div class="h-96 w-96 md:w-full mb-6" id="map"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var latitude = @json($property->latitude);
                        var longitude = @json($property->longitude);

                        var map = L.map('map').setView([longitude, latitude], 16);

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '© OpenStreetMap contributors'
                        }).addTo(map);

                        L.circle([longitude, latitude], {
                            color: 'red',
                            fillColor: '#f03',
                            fillOpacity: 0.5,
                            radius: 10
                        }).addTo(map);
                    });
                </script>
            </div>
        @endif

    </div>

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
            <h1 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 text-center">Propiedades Similares</h1>

            <div
                class="flex flex-row overflow-hidden mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @foreach ($similars as $similar)
                    <x-card :id="$similar->id" :title="$similar->title" :price="$similar->price" :bedrooms="$similar->bedrooms" :bathrooms="$similar->bathrooms"
                        :parkings="$similar->parkings" :area="$similar->area"></x-card>
                @endforeach

            </div>
        </div>
    </div>

@endsection
