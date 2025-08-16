@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')
<div class="mx-auto px-6 ">
    <!-- Introducción -->
    <div style="min-height:calc(100dvh - 5rem)" class="py-16 lg:px-20 lg:py-24 flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-5/12 text-center lg:text-left">
            <h1 class="text-4xl font-extrabold text-gray-900">Sobre Nosotros</h1>
            <p class="mt-6 text-lg text-gray-600 2xl:text-2xl">
                Nos dedicamos a brindar un servicio inmobiliario de calidad, acompañando a nuestros clientes con
                transparencia y profesionalismo en cada paso de su compra, venta o alquiler.
            </p>
        </div>
        <div class="lg:w-7/12">
            <img class="w-full object-cover aspect-[3/4] lg:aspect-[16/9] rounded-lg shadow-lg" src="{{ asset('storage/assets/fictional-team-picture.jpg')}}" alt="Equipo de trabajo">
        </div>
    </div>

    <!-- Misión, Visión y Valores -->
    <div class="py-16 grid gap-12 lg:grid-cols-2">
        <!-- Misión -->
        <div class="p-8 border-l-4 border-blue-600">
            <h2 class="text-2xl font-bold text-gray-900">Nuestra Misión</h2>
            <p class="mt-4 text-gray-600">
                Ofrecer un servicio inmobiliario de calidad, orientándonos a la satisfacción del cliente en cada etapa del proceso.
                Brindamos asesoramiento transparente y profesional, garantizando confianza en cada transacción.
            </p>
        </div>

        <!-- Visión -->
        <div class="p-8 border-l-4 border-blue-600">
            <h2 class="text-2xl font-bold text-gray-900">Nuestra Visión</h2>
            <p class="mt-4 text-gray-600">
                Ser líderes en el mercado inmobiliario, reconocidos por nuestra reputación y servicio al cliente.
                Expandir nuestra presencia a nivel regional y nacional, ofreciendo más propiedades y servicios.
            </p>
        </div>
    </div>

    <!-- Valores -->
    <div class="mt-16">
        <h2 class="text-3xl font-bold text-gray-900 text-center">Nuestros Valores</h2>
        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h3 class="text-xl font-semibold text-gray-800">Innovación</h3>
                <p class="mt-2 text-gray-600">Buscamos constantemente nuevas formas de mejorar y adaptarnos al mercado.</p>
            </div>
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h3 class="text-xl font-semibold text-gray-800">Transparencia</h3>
                <p class="mt-2 text-gray-600">Actuamos con honestidad y claridad en todas nuestras operaciones.</p>
            </div>
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h3 class="text-xl font-semibold text-gray-800">Compromiso</h3>
                <p class="mt-2 text-gray-600">Nos comprometemos a superar las expectativas de nuestros clientes.</p>
            </div>
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h3 class="text-xl font-semibold text-gray-800">Profesionalismo</h3>
                <p class="mt-2 text-gray-600">Operamos con integridad, ética y excelencia en cada gestión.</p>
            </div>
            <div class="p-6 bg-white shadow-md rounded-lg">
                <h3 class="text-xl font-semibold text-gray-800">Colaboración</h3>
                <p class="mt-2 text-gray-600">Fomentamos el trabajo en equipo y el apoyo mutuo para el éxito.</p>
            </div>
        </div>
    </div>

    <!-- Nuestro equipo -->
    <div class="my-16">
        <h2 class="text-3xl font-bold text-gray-900 text-center">Nuestro Equipo</h2>
        <div class="mt-8 grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">
            <div class="flex flex-col items-center text-center p-6 bg-white shadow-md rounded-lg">
                <img class="w-24 h-24 rounded-full object-cover" src="https://i.ibb.co/FYTKDG6/Rectangle-118-2.png" alt="Arnoldo">
                <p class="mt-4 text-lg font-medium text-gray-800">Arnoldo García</p>
            </div>
            {{-- <div class="flex flex-col items-center text-center p-6 bg-white shadow-md rounded-lg">
                <img class="w-24 h-24 rounded-full object-cover" src="https://i.ibb.co/fGmxhVy/Rectangle-119.png" alt="Olivia">
                <p class="mt-4 text-lg font-medium text-gray-800">Olivia</p>
            </div>
            <div class="flex flex-col items-center text-center p-6 bg-white shadow-md rounded-lg">
                <img class="w-24 h-24 rounded-full object-cover" src="https://i.ibb.co/Pc6XVVC/Rectangle-120.png" alt="Liam">
                <p class="mt-4 text-lg font-medium text-gray-800">Liam</p>
            </div>
            <div class="flex flex-col items-center text-center p-6 bg-white shadow-md rounded-lg">
                <img class="w-24 h-24 rounded-full object-cover" src="https://i.ibb.co/7nSJPXQ/Rectangle-121.png" alt="Elijah">
                <p class="mt-4 text-lg font-medium text-gray-800">Elijah</p>
            </div> --}}
        </div>
    </div>
</div>
@endsection
