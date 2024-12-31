<!-- resources/views/home.blade.php -->
@extends('layouts.board')

@section('title', 'WF1') <!-- Opcional: si quisieras personalizar el título en el head -->

@section('content')
    <section class="w-full p-8">

        <h1 class="text-2xl font-bold dark:text-white">Registrar Asesores</h1>
        <form class="p-8 w-75" method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mt-4">
                <x-input-label for="identification" :value="__('Cédula')" />
                <x-text-input id="identification" class="block mt-1 w-full" type="text" name="identification"
                    :value="old('identification')" required autofocus autocomplete="identification" />
                <x-input-error :messages="$errors->get('identification')" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            {{-- LastName --}}
            <div class="mt-4">
                <x-input-label for="lastname" :value="__('Last Name')" />
                <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('last_name')"
                    required autofocus autocomplete="lastname" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')"
                    required autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- birthday -->
            <div class="mt-4">
                <x-input-label for="birthdate" :value="__('Birthdate')" />
                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')"
                    required autofocus autocomplete="birthdate" />
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <x-select-input id="gender" class="block mt-1 w-full" name="gender" :value="old('gender')" required
                    autofocus autocomplete="gender" :options="[
                        'value1' => 'Masculino',
                        'value2' => 'Femenino',
                        'value3' => 'Otros',
                    ]" :disabled="false" />
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </section>


    @if (session('success'))
        <x-modal-crud :message="session('success')" />
        <script src="{{ asset('js/custom/modal.js') }}"></script>
    @endif



@endsection
