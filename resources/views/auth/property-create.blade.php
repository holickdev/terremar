<!-- resources/views/home.blade.php -->
@extends('layouts.board')

@section('title', 'Formulario de Dos Partes')

@push('style')
    <link href="{{ asset('css/library/select2.css') }}" rel="stylesheet" />
@endpush
@push('script')
    <script src="{{ asset('js/library/jquery.js') }}"></script>
    <script src="{{ asset('js/library/select2.js') }}"></script>
    <script src="{{ asset('js/custom/select2.js') }}"></script>
@endpush

@section('content')

    <section class="p-8">

        <h4 class="mb-4 text-2xl font-bold dark:text-white">Agregar Propiedad</h4>

        <!-- Contenedor de Alpine.js -->
        <form method="POST" action="{{ route('dashboard.property.store') }}" enctype="multipart/form-data"
            x-data="{ step: 1 }" class="relative mx-auto w-full overflow-hidden">
            @csrf
            <!-- Contenedor general que desliza ambas secciones -->
            <div class="flex transition-transform duration-700" :style="`transform: translateX(${(step - 1) * -100}%);`">

                <!-- Paso 1 -->
                <div class="w-full  flex-shrink-0">

                    <h5 class="text-lg font-semibold mb-4">Datos de la Propiedad</h5>

                    <!-- Otros campos de la propiedad (precio, área, etc.) -->
                    <div class="grid md:grid-cols-2 md:gap-6 mb-4">

                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Titulo'" :name="'title'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Tipo'" :name="'type'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'number'" :placeholder="'Precio'" :name="'price'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'number'" :placeholder="'Área'" :name="'area'"></x-float-input>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 md:gap-6 mb-4">
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'number'" :placeholder="'Habitaciones'" :name="'bedrooms'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'number'" :placeholder="'Baños'" :name="'bathrooms'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'number'" :placeholder="'Estacionamientos'" :name="'parkings'"></x-float-input>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6 mb-4">
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Clase Social'" :name="'social_class'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Negocio'" :name="'trade'"></x-float-input>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="relative z-0 w-full mb-4 group">
                            <label for="captation_date"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Periodo
                                de Captación</label>
                            <x-date-range-picker :parent="'captation_container'" :startName="'captation_start'" :startHolder="'Inicio de la Captación'" :endName="'captation_end'"
                                :endHolder="'Fin de la Captación'"></x-date-range-picker>

                        </div>
                    </div>

                    <div class="relative z-0 w-full mb-4 group">
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

                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'País'" :name="'country'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Estado'" :name="'state'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Municipio'" :name="'municipality'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Parroquia'" :name="'parish'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group col-span-2">
                            <x-float-input :type="'text'" :placeholder="'Punto de Referencia'" :name="'point_reference'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Latitud'" :name="'latitude'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Altitud'" :name="'altitude'"></x-float-input>
                        </div>
                    </div>

                    <button type="button" @click="step = 2"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Siguiente</button>
                </div>

                <!-- Paso 2 -->
                <div class="w-full  flex-shrink-0">
                    <h5 class="text-lg font-semibold mb-4">Datos del Propietario</h5>
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :type="'text'" :placeholder="'Cédula'" :name="'identification'"></x-float-input>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Nombre'" :name="'name'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Apellido'" :name="'lastname'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'mail'" :placeholder="'Correo Electrónico'" :name="'email'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'tel'" :placeholder="'Télefono'" :name="'phone'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Género'" :name="'gender'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-date-picker :placeholder="'Fecha de Nacimiento'" :name="'birthdate'"></x-date-picker>
                        </div>
                    </div>

                    <!-- Datos de la Dirección -->
                    <h5 class="text-lg font-semibold mb-4">Dirección del Propietario</h5>
                    <!-- Otros campos de la dirección (municipio, parroquia, etc.) -->
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'País'" :name="'ownerCountry'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Estado'" :name="'ownerState'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Municipio'" :name="'ownerMunicipality'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group">
                            <x-float-input :type="'text'" :placeholder="'Parroquia'" :name="'ownerParish'"></x-float-input>
                        </div>
                        <div class="relative z-0 w-full mb-4 group col-span-2">
                            <x-float-input :type="'text'" :placeholder="'Punto de Referencia'" :name="'ownerPoint_reference'"></x-float-input>
                        </div>
                    </div>

                    <button type="button" @click="step = 1"
                        class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Volver</button>
                    <button type="button" @click="step = 3"
                        class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Siguiente</button>
                </div>

                <!-- Paso 3 -->
                <div class="w-full  flex-shrink-0">
                    @if ($advisors)
                        <h5 class="text-lg font-semibold mb-4">Datos del Asesor</h5>
                        <div class="relative z-0 w-full mb-4 group">
                            {{-- <x-float-input :type="'text'" :placeholder="'Cédula'" :name="'advisorIdentification'"></x-float-input> --}}
                            <select class="js-example-basic-single" name="advisorIdentifications[]" multiple>
                                <option class="text-justify" value='{{ null }}' selected>Nombre y Apellido -
                                    Cédula
                                </option>
                                @foreach ($advisors as $advisor)
                                    <option class="text-justify" value='{{ $advisor->person->identification }}'>
                                        {{ $advisor->person->name }} {{ $advisor->person->lastname }} -
                                        {{ number_format($advisor->person->identification, 0, '', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('advisorIdentification')" class="mt-2" />
                        </div>
                    @endif

                    <h5 class="text-lg font-semibold mt-6 mb-4">Imagenes del Inmueble</h5>
                    <div class="relative z-0 w-full mb-4 group">
                        <input
                            class="block w-96 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="picture" name="uploadMedia[]" multiple accept="image/*,video/*" type="file">
                    </div>

                    <button type="button" @click="step = 2"
                        class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Volver</button>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
                </div>
            </div>
        </form>


        @if (session('success'))
            <x-modal-crud :color="'blue'" :message="session('success')" />
            <script src="{{ asset('js/custom/modal.js') }}"></script>
        @elseif ($errors->any())
            <x-modal-crud :color="'yellow'" :message="implode('<br>', $errors->all())" />
            <script src="{{ asset('js/custom/modal.js') }}"></script>
        @elseif (session('error'))
            <x-modal-crud :color="'red'" :message="session('error')" />
            <script src="{{ asset('js/custom/modal.js') }}"></script>
        @endif

    </section>

@endsection
