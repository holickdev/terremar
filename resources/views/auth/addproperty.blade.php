<!-- resources/views/property/create.blade.php -->
@extends('layouts.board')

@section('title', 'Agregar Propiedad')

@section('content')
    <h4 class="mb-4 text-2xl font-bold dark:text-white">Agregar Propiedad</h4>

    <form action="" method="POST" class="mx-auto">
        @csrf
        <!-- Datos de la Propiedad -->
        <h5 class="text-lg font-semibold mt-4">Datos de la Propiedad</h5>
        <div class="relative z-0 w-full mb-5 group">
            <x-float-input :type="'text'" :placeholder="'Título'" :name="'title'"></x-float-input>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <textarea name="description" id="description"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required></textarea>
            <label for="description"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600">Descripción</label>
        </div>
        <!-- Otros campos de la propiedad (precio, área, etc.) -->
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <x-float-input :type="'number'" :placeholder="'Precio'" :name="'price'"></x-float-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-float-input :type="'number'" :placeholder="'Área'" :name="'area'"></x-float-input>
            </div>
        </div>

        <!-- Datos de la Dirección -->
        <h5 class="text-lg font-semibold mt-8">Dirección de la Propiedad</h5>
        <!-- Otros campos de la dirección (municipio, parroquia, etc.) -->
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <x-float-input :type="'text'" :placeholder="'Estado'" :name="'state'"></x-float-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-float-input :type="'text'" :placeholder="'Municipio'" :name="'municipality'"></x-float-input>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <x-float-input :type="'text'" :placeholder="'Parroquia'" :name="'parish'"></x-float-input>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <x-float-input :type="'text'" :placeholder="'Punto de Referencia'" :name="'point_reference'"></x-float-input>
            </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <x-float-input :type="'text'" :placeholder="'Estado'" :name="'state'"></x-float-input>
        </div>

        <!-- Datos del Dueño -->
        <h5 class="text-lg font-semibold mt-8">Datos del Dueño</h5>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="owner_name" id="owner_name"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="owner_name"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600">Nombre
                del dueño</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="owner_lastname" id="owner_lastname"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="owner_lastname"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600">Apellido
                del dueño</label>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
    </form>
@endsection
