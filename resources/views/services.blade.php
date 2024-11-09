<!-- resources/views/home.blade.php -->
@extends('layouts.app')


@php
    // $cantidad = 30;

    $properties = [
        [
            'title' => 'Terreno en Venta - Playa Caribe',
            'price' => '217.500',
            'rooms' => 4,
            'baths' => 3,
            'garage' => 1,
            'area' => '9.999.999,99'
        ],
        [
            'title' => 'Casa en Venta - Pampatar',
            'price' => '320.000',
            'rooms' => 5,
            'baths' => 4,
            'garage' => 2,
            'area' => '500'
        ],
        [
            'title' => 'Apartamento en Venta - La Asunción',
            'price' => '150.000',
            'rooms' => 3,
            'baths' => 2,
            'garage' => 1,
            'area' => '120'
        ],
        [
            'title' => 'Finca en Venta - El Valle',
            'price' => '450.000',
            'rooms' => 6,
            'baths' => 5,
            'garage' => 3,
            'area' => '1200'
        ],
        [
            'title' => 'Terreno en Venta - Costa Azul',
            'price' => '290.000',
            'rooms' => 0,
            'baths' => 0,
            'garage' => 0,
            'area' => '2000'
        ],
        // Agrega más propiedades aquí si es necesario
    ];
@endphp

@section('content')
    <!--
          This example requires some changes to your config:

          ```
          // tailwind.config.js
          module.exports = {
            // ...
            plugins: [
              // ...
              require('@tailwindcss/aspect-ratio'),
            ],
          }
          ```
        -->

    <!-- Importa Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
            <h1 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 text-center">Propiedades en Venta</h1>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @foreach ($properties as $property)
                    <x-card
                        :title="$property['title']"
                        :price="$property['price']"
                        :rooms="$property['rooms']"
                        :baths="$property['baths']"
                        :garage="$property['garage']"
                        :area="$property['area']"
                    ></x-card>
                @endforeach

            </div>
        </div>
    </div>

@endsection
