@extends('layouts.board')

@section('title', 'Actualizar Asesor')

@section('content')

    <section class="dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Actualizar Asesor</h2>
            <form method="POST" action="{{ route('update_profile', $profile->id) }}">
                @csrf
                @method('PUT') <!-- Método HTTP para actualización -->

                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">

                    <!-- Cédula -->
                    <div class="sm:col-span-2">
                        <label for="identification"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cédula</label>
                        <input  type="text" name="identification" id="identification"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $profile->person->identification }}" required>
                    </div>

                    <!-- Nombre -->
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input  type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $profile->person->name }}" required>
                    </div>

                    <!-- Apellido -->
                    <div>
                        <label for="lastname"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                        <input  type="text" name="lastname" id="lastname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $profile->person->lastname }}" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input  type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $profile->email }}" required>
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                        <input  type="tel" name="phone" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $profile->person->phone }}" required>
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div>
                        <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                            Nacimiento</label>
                        <input  type="date" name="birthdate" id="birthdate"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            value="{{ $profile->person->birthdate }}" required>
                    </div>

                    <!-- Género -->
                    <div>
                        <label for="gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Género</label>
                        <select  name="gender" id="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="value1" {{ $profile->person->gender == 'value1' ? 'selected' : '' }}>Masculino
                            </option>
                            <option value="value2" {{ $profile->person->gender == 'value2' ? 'selected' : '' }}>Femenino
                            </option>
                            <option value="value3" {{ $profile->person->gender == 'value3' ? 'selected' : '' }}>Otros
                            </option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                        <buttom type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Guardar Cambios
                        </buttom>
                        <a href="{{ route('advisor.show') }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Cancelar
                        </a>
                </div>
            </form>
        </div>

        @if (session('success'))
            <x-modal-crud :message="session('success')" />
            <script src="{{ asset('js/custom/modal.js') }}"></script>
        @elseif (session('error'))
            <x-modal-crud :message="session('error')" />
            <script src="{{ asset('js/custom/modal.js') }}"></script>
        @endif

    </section>

@endsection
