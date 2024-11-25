<!-- resources/views/home.blade.php -->
@extends('layouts.app')

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
                        :title="$property->title"
                        :price="$property->price"
                        :bedrooms="$property->bedrooms"
                        :bathrooms="$property->bathrooms"
                        :parkings="$property->parkings"
                        :area="$property->area"
                    ></x-card>
                @endforeach

            </div>
        </div>
    </div>

@endsection
