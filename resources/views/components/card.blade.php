@props(['title','price', 'bedrooms', 'bathrooms', 'parkings', 'area'])


<div class="group relative tracking-wide">
    <div
        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
        <img src="https://www.ingeom.es/images/easyblog_articles/117/como-elegir-un-buen-terreno-para-construir.jpg"
            alt="Front of men&#039;s Basic Tee in black."
            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
    </div>
    <div class="my-4">
        <div class="space-y-5">
            <h3 class="text-base font-bold text-gray-700">
                <a href="#">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {{ $title }}
                </a>
            </h3>
            <span class="tracking-normal mt-1 text-sm text-gray-500 w-full flex justify-between">
                <span class="inline-flex justify-between"><i class="mr-2 text-lg fa-solid fa-bed"></i>
                    <p>{{$bedrooms}}</p>
                </span>
                <span class="inline-flex justify-between"><i class="mr-2 text-lg fa-solid fa-shower"></i>
                    <p>{{$bathrooms}}</p>
                </span>
                <span class="inline-flex justify-between"><i class="mr-2 text-lg fa-solid fa-car"></i>
                    <p>{{$parkings}}</p>
                </span>
                <span class="inline-flex justify-between"><i class="mr-2 text-lg fa-solid fa-ruler-combined"></i>
                    <p>{{$area}} m<sup>2</sup></p>
                </span>
            </span>
            <h4 class="font-medium text-gray-900">$ {{ $price }}</h4>
        </div>
    </div>
</div>
