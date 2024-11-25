<!-- resources/views/home.blade.php -->
@extends('layouts.board')

@section('title', 'Formulario de Dos Partes')

@section('content')
    <h4 class="mb-1 text-2xl font-bold dark:text-white">Agregar Propiedad</h4>

    <!-- Contenedor de Alpine.js -->
    <div x-data="{ step: 1 }" class="relative mx-auto w-full overflow-hidden">

        <!-- Contenedor general que desliza ambas secciones -->
        <div class="flex transition-transform duration-700" :style="`transform: translateX(${(step - 1) * -100}%);`">

            <!-- Paso 1 -->
            <div class="w-full p-4 flex-shrink-0">

                <h5 class="text-lg font-semibold mb-4">Datos de la Propiedad</h5>
                <div class="relative z-0 w-full mb-5 group">
                    <x-float-input :type="'text'" :placeholder="'Título'" :name="'title'"></x-float-input>
                </div>

                <!-- Otros campos de la propiedad (precio, área, etc.) -->
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'number'" :placeholder="'Precio'" :name="'price'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'number'" :placeholder="'Área'" :name="'area'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'text'" :placeholder="'Clase'" :name="'class'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="captation_date"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Periodo de Captación</label>
                        <x-date-range-picker :parent="'captation_container'" :startName="'start_captation'" :startHolder="'Inicio de la Captación'" :endName="'end_captation'" :endHolder="'Fin de la Captación'"></x-date-range-picker>
                    </div>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <textarea name="description" id="description"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required></textarea>
                    <label for="description"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descripción</label>
                </div>

                <!-- Datos de la Dirección -->
                <h5 class="text-lg font-semibold mt-6 mb-4">Dirección de la Propiedad</h5>
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

                <button type="button" @click="step = 2"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Siguiente</button>
            </div>

            <!-- Paso 2 -->
            <div class="w-full p-4 flex-shrink-0">
                <h5 class="text-lg font-semibold mb-4">Datos del Propietario</h5>
                <div class="relative z-0 w-full mb-5 group">
                    <x-float-input :type="'text'" :placeholder="'Cédula'" :name="'identification'"></x-float-input>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'text'" :placeholder="'Nombre'" :name="'name'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'text'" :placeholder="'Apellido'" :name="'lastname'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'mail'" :placeholder="'Correo Electrónico'" :name="'email'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'tel'" :placeholder="'Télefono'" :name="'phone'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'text'" :placeholder="'Género'" :name="'gender'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <x-date-picker :placeholder="'Fecha de Nacimiento'" :name="'birthdate'"></x-date-picker>
                    </div>
                </div>

                <!-- Datos de la Dirección -->
                <h5 class="text-lg font-semibold mt-6 mb-4">Dirección de la Propiedad</h5>
                <!-- Otros campos de la dirección (municipio, parroquia, etc.) -->
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'text'" :placeholder="'Estado'" :name="'stateOwner'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'text'" :placeholder="'Municipio'" :name="'municipalityOwner'"></x-float-input>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'text'" :placeholder="'Parroquia'" :name="'parishOwner'"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <x-float-input :type="'text'" :placeholder="'Punto de Referencia'" :name="'point_referenceOwner'"></x-float-input>
                    </div>
                </div>

                <button type="button" @click="step = 1"
                    class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Volver</button>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
            </div>
        </div>
    </div>
@endsection
