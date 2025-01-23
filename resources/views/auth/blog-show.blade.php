@extends('layouts.board')

@section('title', 'WF1')

@section('content')
    <section class="p-4">
        <h2 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Blog</h1>
        <div>
            <img src="{{ asset('storage/' . $blog->picture) }}" alt="">
        </div>
        <h2 class="mb-4 text-xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-3xl dark:text-white">{{$blog->title}}</h1>

        <section class="p-2">
            {!! $blog->body !!}
        </section>

    @endsection
