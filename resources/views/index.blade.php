<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'WF1') <!-- Opcional: si quisieras personalizar el título en el head -->

@section('content')
        <section class="md:h-100 mdbg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-16 ">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    Tu nueva propiedad te espera</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    Descubre las propiedades y terrenos disponibles. De acorde a tus gustos. De acorde a tus necesidades.
                    Descubre Terremar
                </p>
                <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <div class="lg:w-screen">
                        <div class="flex flex-col">

                            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-lg">
                                <form action="{{ route('property.index') }}">

                                    <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                                        <div class="flex flex-col">
                                            <x-select-input :name="'trade'" :placeholder="'Negocios'" :options="$trades" />
                                        </div>

                                        <div class="flex flex-col">
                                            <x-select-input :name="'type'" :placeholder="'Tipo'" :options="$types" />
                                        </div>

                                        <div class="flex flex-col">
                                            <x-select-input :name="'municipality'" :placeholder="'Municipio'" :options="$municipalities" />
                                        </div>
                                        <div class="md:col-start-3 flex flex-col mt-3 grid w-full grid-cols-2 justify-end gap-3">
                                            <button
                                                class="rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-700 outline-none hover:opacity-80 focus:ring">Limpiar</button>
                                            <button
                                                class="rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Buscar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </section>

        {{--
        <div class="relative overflow-hidden bg-white">
            <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-30">
                <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-4 lg:px-6">
                    <div class="sm:max-w-xl">
                        <h1 class="text-xl font-bold tracking-tight text-gray-900 sm:text-6xl">Inmuebles ideales para cada
                            etapa<br>de tu vida</h1>
                        <p class="mt-10 text-xl text-gray-500">Adquiere un inmueble de forma cómoda y segura con Terremar.
                            ¿Que esperas para hacer tu próxima gran inversión?</p>
                    </div>
                    <div>
                        <div class="mt-10">
                            <!-- Decorative image grid -->
                            <div aria-hidden="true"
                                class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                                <div
                                    class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                                    <div class="flex items-center space-x-6 lg:space-x-8">
                                        <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                                <img src="https://definicion.de/wp-content/uploads/2010/12/casa.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="https://www.nocnok.com/hubfs/Edificios.jpg" alt=""
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                        </div>
                                        <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="https://davivienda-bienes-cms.s3.us-east-1.amazonaws.com/istockphoto_147205632_1024x1024_7dafb8d6c9.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="https://img.freepik.com/fotos-premium/primeras-horas-noche-gran-casa-contemporanea-madera-hormigon_410516-15211.jpg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="https://avaterra.mx/blog/wp-content/uploads/2021/11/post_thumbnail-2ce5e0449b394f26ee8ba0bdd1b66efc.jpeg"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                        </div>
                                        <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="https://imgar.zonapropcdn.com/avisos/1/00/54/52/29/22/360x266/1933814633.jpg?isFirstImage=true"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                                <img src="https://imgar.zonapropcdn.com/avisos/1/00/53/12/54/85/360x266/1936048875.jpg?isFirstImage=true"
                                                    alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('property') }}"
                                class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-bold text-center font-large text-white hover:bg-indigo-700">Ver
                                Ofertas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="bg-gray-900 text-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <p class="mt-2 text-pretty text-4xl font-semibold tracking-tight sm:text-5xl lg:text-balance">
                        Encuentra el lugar donde comienza tu historia</p>
                    <p class="mt-6 text-lg/8 text-gray-400">Descubre propiedades que se ajustan a tus necesidades. Ya sea
                        para tu
                        hogar o inversión, estamos aquí para ayudarte a tomar la mejor decisión.</p>
                </div>
                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                        <div class="relative pl-16">
                            <dt class="text-base/7 font-semibold text-gray-300">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 13.5l3.75-3.75 3.75 3.75M12 6.75v10.5" />
                                    </svg>
                                </div>
                                Compra con confianza
                            </dt>
                            <dd class="mt-2 text-base/7 text-gray-400">Ofrecemos asesoramiento profesional para ayudarte a
                                encontrar la propiedad que mejor se adapte a tu estilo de vida y presupuesto.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base/7 font-semibold text-gray-200">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 4.5l8.25 8.25 8.25-8.25M12 3v18" />
                                    </svg>
                                </div>
                                Propiedades verificadas
                            </dt>
                            <dd class="mt-2 text-base/7 text-gray-400">Cada inmueble es revisado cuidadosamente para
                                garantizar
                                la transparencia y calidad en cada transacción.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base/7 font-semibold text-gray-200">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 8.25l4.5 4.5H7.5l4.5-4.5z" />
                                    </svg>
                                </div>
                                Asesoramiento personalizado
                            </dt>
                            <dd class="mt-2 text-base/7 text-gray-400">Nuestro equipo está listo para brindarte el mejor
                                soporte
                                en cada paso del proceso, desde la búsqueda hasta el cierre.</dd>
                        </div>
                        <div class="relative pl-16">
                            <dt class="text-base/7 font-semibold text-gray-200">
                                <div
                                    class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5V19.5M6.75 15.75L12 10.5l5.25 5.25" />
                                    </svg>
                                </div>
                                Soluciones rápidas
                            </dt>
                            <dd class="mt-2 text-base/7 text-gray-400">Te ayudamos a resolver trámites legales y
                                financieros
                                para que tengas una experiencia sin complicaciones.</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Contact sales</h2>
                <p class="mt-2 text-lg/8 text-gray-600">Aute magna irure deserunt veniam aliqua magna enim voluptate.</p>
            </div>
            <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div>
                        <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">First name</label>
                        <div class="mt-2.5">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Last name</label>
                        <div class="mt-2.5">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
                        <div class="mt-2.5">
                            <input type="email" name="email" id="email" autocomplete="email"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone-number" class="block text-sm/6 font-semibold text-gray-900">Phone number</label>
                        <div class="relative mt-2.5">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <label for="country" class="sr-only">Country</label>
                                <select id="country" name="country"
                                    class="h-full rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                                    <option>US</option>
                                    <option>CA</option>
                                    <option>EU</option>
                                </select>
                                <svg class="pointer-events-none absolute right-3 top-0 h-full w-5 text-gray-400"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="tel" name="phone-number" id="phone-number" autocomplete="tel"
                                class="block w-full rounded-md border-0 px-3.5 py-2 pl-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm/6 font-semibold text-gray-900">Message</label>
                        <div class="mt-2.5">
                            <textarea name="message" id="message" rows="4"
                                class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                        </div>
                    </div>
                    <div class="flex gap-x-4 sm:col-span-2">
                        <div class="flex h-6 items-center">
                            <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                            <button type="button"
                                class="flex w-8 flex-none cursor-pointer rounded-full bg-gray-200 p-px ring-1 ring-inset ring-gray-900/5 transition-colors duration-200 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                role="switch" aria-checked="false" aria-labelledby="switch-1-label">
                                <span class="sr-only">Agree to policies</span>
                                <!-- Enabled: "translate-x-3.5", Not Enabled: "translate-x-0" -->
                                <span aria-hidden="true"
                                    class="h-4 w-4 translate-x-0 transform rounded-full bg-white shadow-sm ring-1 ring-gray-900/5 transition duration-200 ease-in-out"></span>
                            </button>
                        </div>
                        <label class="text-sm/6 text-gray-600" id="switch-1-label">
                            By selecting this, you agree to our
                            <a href="#" class="font-semibold text-indigo-600">privacypolicy</a>.
                        </label>
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit"
                        class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Let's
                        talk</button>
                </div>
            </form>
        </div>
@endsection
