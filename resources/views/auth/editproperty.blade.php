<!-- resources/views/home.blade.php -->
@extends('layouts.board')

@section('title', 'Formulario de Dos Partes')

@section('content')

    <h4 class="mb-1 text-2xl font-bold dark:text-white">Editar Propiedad</h4>

    <!-- Contenedor de Alpine.js -->
    <form method="POST" action="{{route('update_property', $property->id)}}" x-data="{ step: 1 }" class="relative mx-auto w-full overflow-hidden">
        @csrf
        @method('PUT')
        <!-- Contenedor general que desliza ambas secciones -->
        <div class="flex transition-transform duration-700" :style="`transform: translateX(${(step - 1) * -100}%);`">

            <!-- Paso 1 -->
            <div class="w-full p-4 flex-shrink-0">

                <h5 class="text-lg font-semibold mb-4">Datos de la Propiedad</h5>

                <!-- Otros campos de la propiedad (precio, área, etc.) -->
                <div class="grid md:grid-cols-2 md:gap-6 mb-4">

                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Titulo'" :name="'title'"
                            value="{{ $property->title }}"></x-float-input>
                    </div>

                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Tipo'" :name="'type'"
                            value="{{ $property->type }}"></x-float-input>
                    </div>

                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'number'" :placeholder="'Precio'" :name="'price'"
                            value="{{ $property->price }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'number'" :placeholder="'Área'" :name="'area'"
                            value="{{ $property->area }}"></x-float-input>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 md:gap-6 mb-4">
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'number'" :placeholder="'Habitaciones'" :name="'bedrooms'"
                            value="{{ $property->bedrooms }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'number'" :placeholder="'Baños'" :name="'bathrooms'"
                            value="{{ $property->bathrooms }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'number'" :placeholder="'Estacionamientos'" :name="'parkings'"
                            value="{{ $property->parkings }}"></x-float-input>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6 mb-4">
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Clase'" :name="'class'"
                            value="{{ $property->social_class }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Negocio'" :name="'trade'"
                            value="{{ $property->trade }}"></x-float-input>
                    </div>
                    
                </div>
                <div class="relative z-0 w-full mb-4 group">
                    <label for="captation_date"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Periodo
                        de Captación</label>
                    <x-date-range-picker :parent="'captation_container'" :start_value="$property->captation_start ?? ''" :startName="'captation_start'" :startHolder="'Inicio de la Captación'"
                        :end_value="$property->captation_end ?? ''" :endName="'captation_end'" :endHolder="'Fin de la Captación'"></x-date-range-picker>
                </div>

                <div class="relative z-0 w-full mb-4 group">
                    <textarea name="description" id="description"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required>{{ $property->description }}</textarea>
                    <label for="description"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descripción</label>
                </div>

                <!-- Datos de la Dirección -->
                <h5 class="text-lg font-semibold mt-6 mb-4">Dirección de la Propiedad</h5>
                <!-- Otros campos de la dirección (municipio, parroquia, etc.) -->
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Estado'" :name="'state'"
                            value="{{ $property->address->state }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Municipio'" :name="'municipality'"
                            value="{{ $property->address->municipality }}"></x-float-input>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Parroquia'" :name="'parish'"
                            value="{{ $property->address->parish }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Punto de Referencia'" :name="'point_reference'"
                            value="{{ $property->address->point_reference }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Latitud'" :name="'latitude'"
                            value="{{ $property->latitude }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Altitud'" :name="'longitude'"
                            value="{{ $property->longitude }}"></x-float-input>
                    </div>
                </div>
                <button type="button" @click="step = 2"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Siguiente</button>
            </div>

            <!-- Paso 2 -->
            <div class="w-full p-4 flex-shrink-0">
                <h5 class="text-lg font-semibold mb-4">Datos del Propietario</h5>
                <div class="relative z-0 w-full mb-4 group">
                    <x-float-input :type="'text'" :placeholder="'Cédula'" :name="'identification'"
                        value="{{ $property->owner->identification }}"></x-float-input>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Nombre'" :name="'name'"
                            value="{{ $property->owner->name }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Apellido'" :name="'lastname'"
                            value="{{ $property->owner->lastname }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'mail'" :placeholder="'Correo Electrónico'" :name="'email'"
                            value="{{ $property->owner->email }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'tel'" :placeholder="'Télefono'" :name="'phone'"
                            value="{{ $property->owner->phone }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Género'" :name="'gender'"
                            value="{{ $property->owner->gender }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-date-picker :placeholder="'Fecha de Nacimiento'" :name="'birthdate'"
                            date_value="{{$property->owner->birthdate}}"></x-date-picker>
                    </div>
                </div>

                <!-- Datos de la Dirección -->
                <h5 class="text-lg font-semibold mt-6 mb-4">Dirección del Propietario</h5>
                <!-- Otros campos de la dirección (municipio, parroquia, etc.) -->
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Estado'" :name="'ownerState'"
                            value="{{ $property->owner->address->state }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Municipio'" :name="'ownerMunicipality'"
                            value="{{ $property->owner->address->municipality }}"></x-float-input>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Parroquia'" :name="'ownerParish'"
                            value="{{ $property->owner->address->parish }}"></x-float-input>
                    </div>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Punto de Referencia'" :name="'ownerPoint_reference'"
                            value="{{ $property->owner->address->point_reference }}"></x-float-input>
                    </div>
                </div>

                <button type="button" @click="step = 1"
                    class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Volver</button>
                <button type="button" @click="step = 3"
                    class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Volver</button>

            </div>

            <!-- Paso 2 -->
            <div class="w-full p-4 flex-shrink-0">
                <h5 class="text-lg font-semibold mb-4">Datos del Asesor</h5>
                <div class="relative z-0 w-full mb-4 group">
                    {{-- <x-float-input :type="'text'" :placeholder="'Cédula'" :name="'advisorIdentification'"></x-float-input> --}}
                    <select class="js-example-basic-single" name="advisorIdentification"
                        value="{{ $property->advisors[0]->person->identification }}">
                        <option class="text-justify" value='{{ null }}'>Nombre y Apellido - Cédula</option>
                        @foreach ($property->advisors as $advisor)
                            <option class="text-justify" value='{{ $advisor->person->identification }}'>
                                {{ $advisor->person->name }} {{ $advisor->person->lastname }} -
                                {{ number_format($advisor->person->identification, 0, '', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <h5 class="text-lg font-semibold mb-4">Imagenes del Inmueble</h5>
                <div class="relative z-0 w-full mb-4 group">
                    <input
                        class="block w-96 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="picture" name="media[]" multiple accept="image/*,video/*" type="file">
                </div>

                <button type="button" @click="step = 2"
                    class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Volver</button>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
            </div>
        </div>
    </form>
    @if (session('success'))
        <x-modal-crud :message="session('success')" />
        <script src="{{ asset('js/custom/modal.js') }}"></script>
    @endif
@endsection
