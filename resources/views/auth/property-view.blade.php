@extends('layouts.app')

@section('title', 'Detalles de la Propiedad')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-6">Detalles de la Propiedad</h2>

        <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 mb-6">
            <h3 class="text-2xl font-bold mb-2">{{ $property->title }}</h3>
            <p class="text-gray-600 mb-4">{{ $property->trade }}</p>

            <div class="mb-4">
                <span class="text-xl font-bold text-gray-800">${{ number_format($property->price, 2, ',', '.') }}</span>
            </div>

            <div class="mb-4">
                <h4 class="text-lg font-semibold">Detalles:</h4>
                <ul class="text-gray-600">
                    <li>Habitaciones: {{ $property->bedrooms }}</li>
                    <li>Baños: {{ $property->bathrooms }}</li>
                    <li>Estacionamientos: {{ $property->parkings }}</li>
                    <li>Área: {{ $property->area }} m²</li>
                </ul>
            </div>

            <div class="mb-4">
                <h4 class="text-lg font-semibold">Descripción:</h4>
                <p class="text-gray-700">{{ $property->description }}</p>
            </div>

            <div class="mb-4">
                <h4 class="text-lg font-semibold">Dirección:</h4>
                <p class="text-gray-700">{{ $property->address->state }} > {{ $property->address->municipality }} > {{ $property->address->parish }}</p>
            </div>

            <div class="flex justify-end">
                <a href="" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Editar Propiedad</a>
                <form action="" method="POST" class="ml-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Eliminar Propiedad</button>
                </form>
            </div>
        </div>

        {{-- <div class="bg-white p-6">
            <h3 class="text-2xl font-bold mb-4">Propiedades Similares</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($similars as $similar)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-4">
                        <h4 class="text-xl font-semibold">{{ $similar->title }}</h4>
                        <p class="text-gray-600">Precio: ${{ number_format($similar->price, 2, ',', '.') }}</p>
                        <p class="text-gray-600">Habitaciones: {{ $similar->bedrooms }}</p>
                        <a href="{{ route('admin.properties.show', $similar->id) }}" class="text-blue-600 hover:underline">Ver más</a>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>

@endsection
