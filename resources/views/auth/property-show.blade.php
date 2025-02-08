@extends('layouts.board')

@section('title', 'Detalles de la Propiedad')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-6">Detalles de la Propiedad</h2>
        <div class="contendorprincipal flex flex-col bg-white border border-gray-200 rounded-lg shadow-lg p-6 mb-6">
            <!-- Información principal de la propiedad -->
            <div class="flex flex-wrap md:flex-row flex-col gap-6">
                <div class="flex-1">
                    <h3 class="text-2xl font-bold mb-2">{{ $property->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $property->trade->name }}</p>

                    <div class="mb-4">
                        <span
                            class="text-xl font-bold text-gray-800">${{ number_format($property->price, 2, ',', '.') }}</span>
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
                    <div>
                        <h4 class="text-lg font-semibold">Dirección:</h4>
                        <p class="text-gray-700">{{ $property->address->state }} > {{ $property->address->municipality }} >
                            {{ $property->address->city }}</p>
                    </div>
                </div>

                <!-- Información del propietario -->
                <div class="flex-1">
                    <h4 class="text-lg font-semibold mb-2">Propietario:</h4>
                    <ul class="text-gray-600 flex flex-col gap-2">
                        <li>Cédula: {{ $property->owner->identification }}</li>
                        <li>Nombre: {{ $property->owner->name . ' ' . $property->owner->lastname }}</li>
                        <li>Género: {{ $property->owner->gender }}</li>
                        <li>Fecha de Nacimiento: {{ $property->owner->birthdate }}</li>
                        <li>Correo Electrónico: {{ $property->owner->email }}</li>
                        <li>Teléfono: {{ $property->owner->phone }}</li>
                        <li>Dirección: {{ $property->owner->address->state }} >
                            {{ $property->owner->address->municipality }} > {{ $property->owner->address->city }}</li>
                    </ul>
                </div>

                <div class="w-full">
                    <h4 class="text-lg font-semibold">Descripción:</h4>
                    <p class="text-gray-700">{{ $property->description }}</p>
                </div>

                <div class="w-full">
                    <h4 class="text-lg font-semibold">Multimedia:</h4>
                    <x-carousel :list='$property'></x-carousel>
                </div>


            </div>

            <!-- Botones de acción -->
            <div class="flex justify-end mt-2">
                <a href="{{route('dashboard.property.edit',$property->id)}}"
                    class="ml-4 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Editar Propiedad
                </a>
                <x-modal-delete/>
            </div>
        </div>
    </div>

@endsection
