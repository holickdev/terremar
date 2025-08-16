@extends('layouts.board')

@section('title', 'WF1')

@section('content')
    <section>
        <x-crud-header :title="$title" :action="$action" />
        <table id="search-table">
            <thead class="bg-white dark:bg-gray-700">
                <tr class="flex">
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            TITULO
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            TIPO
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            AREA
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            PRECIO
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            H
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            B
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            E
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        data-type="date" data-format="YYYY/DD/MM">
                        <span class="flex items-center">
                            FECHA DE CAPTACION
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @foreach ($properties as $property)
                    <tr onclick="window.location='{{ route('dashboard.property.show', $property->id) }}'"
                        class="cursor-pointer">
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $property->title }}</td>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $property->type->name }}</td>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $property->price }}</td>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $property->area }}</td>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $property->bedrooms }}</td>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $property->bathrooms }}</td>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $property->parkings }}</td>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $property->captation_start }} - {{ $property->captation_end }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
