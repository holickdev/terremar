@props(['url'])

<nav class="flex mb-5" aria-label="Breadcrumb" x-data="{{$url ?? "breadcrumb()" }}">
    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
        <!-- Generar las partes del breadcrumb -->
        <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                        </path>
                                    </svg>
        <template x-for="(part, index) in parts" :key="index">
            <li>
                <div class="flex items-center" x-show="index < parts.length - 1">
                    <a :href="part.url"
                        class="text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                        <span x-text="part.label"></span>
                    </a>
                    <svg class="w-6 h-6 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="text-gray-400 dark:text-gray-500" x-show="index === parts.length - 1" x-text="part.label"></span>
            </li>
        </template>
    </ol>
</nav>

<script>
    function breadcrumb() {
        return {
            parts: [], // Aquí se almacenan las partes del breadcrumb
            init() {
                const url = window.location.pathname; // Captura la ruta actual
                const segments = url.split('/').filter(segment => segment !== ''); // Divide en segmentos y elimina vacíos

                // Genera un array con etiquetas y URLs
                this.parts = segments.map((segment, index) => {
                    return {
                        label: segment.charAt(0).toUpperCase() + segment.slice(1), // Capitaliza cada parte
                        url: '/' + segments.slice(0, index + 1).join('/'), // Reconstruye la URL parcial
                    };
                });

                // Agrega el elemento "Home" al inicio del breadcrumb
                this.parts.unshift({ label: 'Home', url: '/' });
            }
        };
    }
</script>
