{{-- resources/views/components/dropdown.blade.php --}}
@props([
    'options' => [],
    'icon' => null,
])

@php
    $baseClass = 'inline-flex items-center justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold shadow-sm text-gray-300 hover:bg-gray-700 hover:text-white';
    $iconClass = 'relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800';
@endphp

<div x-data="{ open: false }" class="relative inline-block text-left">
    <!-- Botón que abre/cierra el menú -->
    <div>
        <button @click="open = !open" @click.away="open = false" type="button"
            class="{{ $icon ? $iconClass : $baseClass }}" id="menu-button"
            aria-expanded="true" aria-haspopup="true">

            @if ($icon)
                <img src="{{ $icon }}" class="h-8 w-8 rounded-full" alt="icono">
            @else
                {{ $slot }}
                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
            @endif
        </button>
    </div>

    <!-- Menú desplegable -->
    <div x-show="open" @click.away="open = false"
        class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95">
        <div class="py-1" role="none">
            @foreach ($options as $option)
                <a href="{{ $option['url'] ?? '#' }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    role="menuitem" tabindex="-1">
                    {{ $option['label'] }}
                </a>
            @endforeach

            {{-- Slot nombrado para contenido adicional --}}
            @isset($extra)
                <div class="border-t border-gray-100"></div>
                {{ $extra }}
            @endisset
        </div>
    </div>
</div>
