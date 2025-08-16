<!-- resources/views/home.blade.php -->
@extends('layouts.board')

@section('title', 'WF1') <!-- Opcional: si quisieras personalizar el título en el head -->

@section('content')
    <x-crud-header :title="$title" :action="$action" />

    <section class="mx-auto max-w-7xl p-4 flex flex-col gap-6 lg:flex-row lg:gap-8 ">

        <!-- Tarjeta 1 -->
        <div class="flex-1 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between items-start w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Propiedades</h5>
                    </div>
                </div>
            </div>
            <!-- Line Chart -->
            <div class="py-12" id="pie-chart"></div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="flex-1 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between mb-3">
                <div class="flex items-center">
                    <div class="flex justify-center items-center">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Captaciones</h5>
                    </div>
                </div>
            </div>

            <!-- Radial Chart -->
            <div class="py-1" id="radial-chart"></div>

            <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                <div class="grid grid-cols-3 gap-3 mb-2">
                    <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">
                            {{ $percent->uncaptated }}
                        </dt>
                        <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">Sin Captar</dd>
                    </dl>
                    <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">
                            {{ $percent->discaptated }}
                        </dt>
                        <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">Descaptado</dd>
                    </dl>
                    <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">
                            {{ $percent->captated }}
                        </dt>
                        <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Captado</dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="flex-1 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between mb-3">
                <div class="flex justify-center items-center">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Liquidez</h5>
                </div>
                <div>
                    <button type="button" data-tooltip-target="data-tooltip" data-tooltip-placement="bottom"
                        class="hidden sm:inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 16 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                        </svg>
                        <span class="sr-only">Download data</span>
                    </button>
                    <div id="data-tooltip" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Download CSV
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>

            <!-- Donut Chart -->
            <div class="py-6" id="donut-chart"></div>
        </div>
    </section>


    <script src="{{ asset('js/library/flowbite-charts.js') }}"></script>

    <script>
        const getChartOptions = () => {
            return {
                series: [
                    {{ round(($count->houses * 100) / $count->total, 2) }},
                    {{ round(($count->apartments * 100) / $count->total, 2) }},
                    {{ round(($count->terrains * 100) / $count->total, 2) }},
                    {{ round(($count->others * 100) / $count->total, 2) }},
                ],
                colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                chart: {
                    height: 300,
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -25
                        }
                    },
                },
                labels: ["Casas", "Apartamentos", "Terrenos", "Otros"],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "%"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "%"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
            chart.render();
        }
    </script>

    <script>
        const getRadialChartOptions = () => {
            return {
                series: [
                    {{ round(($percent->captated * 100) / $percent->total, 2) }},
                    {{ round(($percent->discaptated * 100) / $percent->total, 2) }},
                    {{ round(($percent->uncaptated * 100) / $percent->total, 2) }},
                ],
                colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
                chart: {
                    height: "300px",
                    width: "100%",
                    type: "radialBar",
                    sparkline: {
                        enabled: true,
                    },
                },
                plotOptions: {
                    radialBar: {
                        track: {
                            background: '#E5E7EB',
                        },
                        dataLabels: {
                            show: false,
                        },
                        hollow: {
                            margin: 0,
                            size: "32%",
                        }
                    },
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -23,
                        bottom: -20,
                    },
                },
                labels: ["Done", "In progress", "To do"],
                legend: {
                    show: false,
                    position: "top",
                    fontFamily: "Inter, sans-serif",
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function(value) {
                            return value + '%';
                        }
                    }
                }
            }
        }

        if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.querySelector("#radial-chart"), getRadialChartOptions());
            chart.render();
        }
    </script>

    <script>
        const getDonutChartOptions = () => {
            return {
                series: [
                    {{ round($liquid->houses / 1000000, 2) }},
                    {{ round($liquid->apartments / 1000000, 2) }},
                    {{ round($liquid->terrains / 1000000, 2) }},
                    {{ round($liquid->others / 1000000, 2) }}
                ],
                colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                chart: {
                    height: 300,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Liquidez Total",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                        return '$' + sum + 'M'
                                    },
                                },
                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value + "M"
                                    },
                                },
                            },
                            size: "80%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Casas", "Apartamentos", "Terrenos", "Otros"],
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "k"
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "k"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart"), getDonutChartOptions());
            chart.render();
        }
    </script>

@endsection
