@extends('layouts.board')

@section('title', 'WF1')

@section('content')
    <x-crud-header :title="$title" />
    <section class="contendorprincipal flex flex-col bg-white border border-gray-200 rounded-lg shadow-lg m-6 p-6 mb-6">
        <div>
            <img src="{{ asset('storage/' . $blog->picture) }}" alt="">
        </div>
        <h2 class="mb-4 text-xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-3xl dark:text-white">
            {{ $blog->title }}</h1>

        <section class="p-2">
            {!! $blog->body !!}
        </section>

        <div class="flex justify-end mt-2">
            <a href="{{route('dashboard.blog.edit',$blog->title)}}"
                class="ml-4 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Editar Propiedad
            </a>
            <x-modal-delete/>
        </div>

@endsection
