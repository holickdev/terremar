@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/library/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/library/solid.css') }}" />
@endpush

@section('content')

    <div class="mx-auto max-w-2xl py-16 px-6 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8">
        <h1 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 text-center">Terrenos Disponibles</h1>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

            @foreach ($properties as $property)
                <x-card
                    :id="$property->id"
                    :title="$property->title"
                    :price="$property->price"
                    :bedrooms="$property->bedrooms"
                    :bathrooms="$property->bathrooms"
                    :parkings="$property->parkings"
                    :area="$property->area"
                ></x-card>
            @endforeach

        </div>

        <!-- Paginación -->
        <div class="mt-8">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
