@extends('layouts.board')

@section('title', 'Asesor')

@section('content')

    <section class="dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                Datos del Asesor</h2>
            <form method="" action="">
                @csrf <!-- Método HTTP para actualización -->

                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">

                    <!-- resources/views/components/advisor-picture-upload.blade.php -->
                    <div class="relative w-24 h-24">
                        <label class="group cursor-pointer">
                            <input disabled type="file" class="hidden" name="picture" />
                            <img src="{{ asset('storage/' . $advisor->picture ) ?? '' }}" alt="advisor Picture"
                                class="w-full h-full object-cover rounded-full border border-gray-300">
                        </label>
                    </div>


                    <!-- Cédula -->
                    <div class="sm:col-span-2">
                        <label for="identification"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cédula</label>
                        <input disabled type="text" name="identification" id="identification"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $advisor->person->identification }}" required>
                    </div>

                    <!-- Nombre -->
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input disabled type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $advisor->person->name }}" required>
                    </div>

                    <!-- Apellido -->
                    <div>
                        <label for="lastname"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                        <input disabled type="text" name="lastname" id="lastname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $advisor->person->lastname }}" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input disabled type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $advisor->email }}" required>
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                        <input disabled type="tel" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $advisor->person->phone }}" required>
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div>
                        <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                            Nacimiento</label>
                        <input disabled type="date" name="birthdate" id="birthdate"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $advisor->person->birthdate }}" required>
                    </div>

                    <!-- Género -->
                    <div>
                        <label for="gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Género</label>
                        <select disabled name="gender" id="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="value1" {{ $advisor->person->gender == 'value1' ? 'selected' : '' }}>Masculino
                            </option>
                            <option value="value2" {{ $advisor->person->gender == 'value2' ? 'selected' : '' }}>Femenino
                            </option>
                            <option value="value3" {{ $advisor->person->gender == 'value3' ? 'selected' : '' }}>Otros
                            </option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('dashboard.advisor.edit', $advisor->id) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Actualizar Datos
                        </a>
                    {{-- <a href="{{ route('advisor.index') }}" class="text-gray-700 hover:underline">Cancelar</a> --}}
                </div>
            </form>
        </div>

        @if (session('success'))
            <x-modal-crud :color="'green'" :message="session('success')" />
            <script src="{{ asset('js/custom/modal.js') }}"></script>
        @elseif (session('error'))
            <x-modal-crud :color="'red'" :message="session('error')" />
            <script src="{{ asset('js/custom/modal.js') }}"></script>
        @endif

    </section>

@endsection
