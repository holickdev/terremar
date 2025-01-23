@extends('layouts.board')

@section('title', 'Actualizar Asesor')

@section('content')

<form action="{{ route('contact.send') }}" method="POST">
    @csrf
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>

</form>

@if ((session('success'))) <p style="color: green;">{{ session('success') }}</p> @endif

@endsection
