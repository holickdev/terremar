@extends('layouts.app')

@section('title', 'WF1')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/library/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/library/fontawesome.all.css') }}">
@endpush

@push('script')
    <script src="{{ asset('js/library/flowbite.js') }}"></script>
@endpush

@section('content')
    <div class="bg-gray-100 py-8">
        <div class="container mx-auto px-4 max-w-screen-xl">
            <!-- Carousel -->
            <div id="default-carousel" class="relative w-full mb-8" data-carousel="slide">
                <div class="relative overflow-hidden rounded-lg h-64 md:h-96">
                    @foreach ($property->media as $media)
                        <div class="duration-700 ease-in-out"
                            {{ $loop->first ? 'data-carousel-item=active' : 'data-carousel-item' }}>
                            @if (str_starts_with($media->type, 'image/'))
                                <img src="{{ asset('storage/' . $media->url) }}"
                                    class="object-cover w-full h-full rounded-lg" alt="Imagen de la propiedad">
                            @elseif (str_starts_with($media->type, 'video/'))
                                <video class="object-cover w-full h-full rounded-lg" controls>
                                    <source src="{{ asset('storage/' . $media->url) }}" type="{{ $media->type }}">
                                    Tu navegador no soporta la reproducción de videos.
                                </video>
                            @else
                                <div class="flex items-center justify-center h-full">
                                    <p class="text-center text-gray-500">Tipo de archivo no soportado.</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex justify-center space-x-3 bottom-5 left-1/2 transform -translate-x-1/2">
                    @foreach ($property->media as $index => $media)
                        <button type="button" class="w-3 h-3 rounded-full"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                            data-carousel-slide-to="{{ $index }}"></button>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 6 10"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1L1 5l4 4" />
                        </svg>
                        <span class="sr-only">Anterior</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 6 10"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Siguiente</span>
                    </span>
                </button>
            </div>

            <!-- Detalles de la Propiedad -->
            <section class="flex flex-col md:flex-row gap-8">
                <!-- Contenido Principal -->
                <div class="md:w-3/4 bg-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">{{ $property->title }}</h2>
                    <p class="text-gray-600 text-base md:text-lg mb-4">En {{ $property->trade->name }}</p>
                    <div class="mb-4">
                        <span
                            class="text-2xl font-bold text-green-600">${{ number_format($property->price, 2, ',', '.') }}</span>
                    </div>
                    <!-- Detalles específicos -->
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Detalles:</h3>
                        <ul class="grid grid-cols-2 gap-4 text-gray-600 text-base md:text-lg">
                            <li class="flex items-center">
                                <i class="fa-solid fa-bed text-base mr-2"></i>
                                <span>Habitaciones: {{ $property->bedrooms }}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fa-solid fa-shower text-lg mr-2"></i>
                                <span>Baños: {{ $property->bathrooms }}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fa-solid fa-car text-lg mr-2"></i>
                                <span>Estacionamientos: {{ $property->parkings }}</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fa-solid fa-ruler-combined text-lg mr-2"></i>
                                <span>Área: {{ $property->area }} m<sup>2</sup></span>
                            </li>
                        </ul>
                    </div>
                    <!-- Descripción -->
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Descripción:</h3>
                        <p class="text-gray-700 text-base leading-relaxed">{{ $property->description }}</p>
                    </div>
                    <!-- Dirección -->
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Direción:</h3>
                        <div class="flex items-center text-gray-700 text-base">
                            <i class="fa-solid fa-location-dot mr-2"></i>
                            <span>{{ $property->address->state }}, {{ $property->address->municipality }},
                                {{ $property->address->city }}</span>
                        </div>
                    </div>
                </div>
                <!-- Aside: Asesores -->
                <aside class="md:w-1/4 space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Asesores:</h3>
                    @foreach ($property->advisors as $advisor)
                        <div class="bg-white border border-gray-200 rounded-lg shadow p-4 lg:sticky lg:top-10">
                            <div class="flex flex-col items-center">
                                <img class="w-24 h-24 rounded-full shadow mb-4"
                                    src="{{ asset('storage/' . $advisor->picture) }}" alt="Imagen del asesor">
                                <h5 class="text-lg font-semibold text-gray-900 mb-1">
                                    {{ $advisor->person->name }} {{ $advisor->person->lastname }}
                                </h5>
                                <span class="text-sm text-gray-500 mb-4">Visual Designer</span>
                                <div class="flex flex-wrap justify-center gap-2">
                                    @php
                                        $mensaje = 'Hola, estoy interesado en este inmueble: ' . $property->title;
                                        $mensajeCodificado = rawurlencode($mensaje);
                                    @endphp
                                    <a href="{{'https://wa.me/'.$advisor->person->phone.'?text='.$mensajeCodificado}}"
                                        target="_blank"
                                        class="flex items-center px-3 py-2 text-sm font-medium text-white bg-green-600 rounded hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-800">
                                        <i class="fa-brands fa-whatsapp mr-1"></i> Contactar
                                    </a>
                                    <a href="#"
                                        class="flex items-center px-3 py-2 text-sm font-medium text-white bg-red-600 rounded border border-red-200 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-800">
                                        <i class="fa-solid fa-envelope mr-1"></i> Contactar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </aside>
            </section>

            <!-- Sección del Mapa -->
            @if ($property->longitude && $property->latitude)
                @push('style')
                    <link href="{{ asset('css/library/leaflet.css') }}" rel="stylesheet">
                @endpush
                @push('script')
                    <script src="{{ asset('js/library/leaflet.js') }}"></script>
                @endpush
                <div class="bg-white p-6 rounded-lg shadow mt-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Mapa:</h3>
                    <div class="w-full h-96 mb-6" id="map"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var latitude = @json($property->latitude);
                            var longitude = @json($property->longitude);

                            var map = L.map('map').setView([latitude, longitude], 16);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(map);

                            L.circle([latitude, longitude], {
                                color: 'red',
                                fillColor: '#f03',
                                fillOpacity: 0.5,
                                radius: 10
                            }).addTo(map);
                        });
                    </script>
                </div>
            @endif

            <!-- Propiedades Similares -->
            <div class="bg-white mt-8 p-6 rounded-lg shadow">
                <h1 class="text-2xl font-bold text-gray-900 text-center mb-6">Propiedades Similares</h1>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($similars as $similar)
                        <x-card :id="$similar->id" :title="$similar->title" :price="$similar->price" :bedrooms="$similar->bedrooms" :bathrooms="$similar->bathrooms"
                            :parkings="$similar->parkings" :area="$similar->area"></x-card>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
