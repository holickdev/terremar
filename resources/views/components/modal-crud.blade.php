@props([
    'color' => 'blue',
    'message' => 'Hubo un error de capa 8, contacte con el administrador.'
])

<div id="popup-modal" data-modal-target="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <i class="fa-regular fa-circle-check text-6xl mb-3 text-{{$color}}-400"></i>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ $message }}
                </h3>
                <button data-modal-hide="popup-modal" type="button"
                    class="w-full flex justify-center font-bold text-white bg-{{$color}}-400 hover:bg-{{$color}}-600 focus:ring-4 focus:outline-none focus:ring-{{$color}}-700 dark:focus:ring-{{$color}}-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Continuar
                </button>
            </div>
        </div>
    </div>
</div>
