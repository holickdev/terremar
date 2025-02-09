@extends('layouts.board')

@section('title', 'Actualizar Asesor')

@section('content')

    <section class="dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                Actualizar Datos</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">

                    <!-- Foto del Asesor -->
                    <div class="relative w-24 h-24">
                        <label class="group cursor-pointer">
                            <input type="file" disabled class="hidden" name="picture" />
                            <img src="{{ asset('storage/' . $advisor->picture) ?? '' }}" alt="advisor Picture"
                                class="w-full h-full object-cover rounded-full border border-gray-300">
                            {{-- <div
                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 rounded-full opacity-0 group-hover:opacity-100 transition">
                                <i class="fa-solid fa-pencil w-6 h-6 text-white"></i>
                            </div> --}}
                        </label>
                        <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                    </div>

                    <!-- Cédula -->
                    <div class="relative z-0 w-full mb-4 group sm:col-span-2">
                        <x-float-input :disabled="true" :placeholder="'Cédula'" :name="'identification'" :type="'text'" :value="$advisor->person->identification" />
                    </div>

                    <!-- Nombre -->
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :disabled="true" :placeholder="'Nombre'" :name="'name'" :type="'text'" :value="$advisor->person->name" />
                    </div>

                    <!-- Apellido -->
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :disabled="true" :placeholder="'Apellido'" :name="'lastname'" :type="'text'" :value="$advisor->person->lastname" />
                    </div>

                    <!-- Email -->
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :disabled="true" :placeholder="'Email'" :name="'email'" :type="'email'" :value="$advisor->email" />
                    </div>

                    <!-- Teléfono -->
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :disabled="true" :placeholder="'Teléfono'" :name="'phone'" :type="'tel'" :value="$advisor->person->phone" />
                    </div>

                    <!-- Fecha de Nacimiento -->
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-input :disabled="true" :placeholder="'Fecha de Nacimiento'" :name="'birthdate'" :type="'date'" :value="$advisor->person->birthdate" />
                    </div>

                    <!-- Género -->
                    <div class="relative z-0 w-full mb-4 group">
                        <x-float-select :name="'gender'" :placeholder="'Género'" :disabled="true"
                            :options="$gender" :selected="$advisor->person->gender" > </x-float-select>
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('dashboard.advisor.edit', $advisor->id) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Editar Datos
                    </a>
                    <a href="{{ route('dashboard.advisor.property', $advisor->id) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Ver Propiedades
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
