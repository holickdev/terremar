@extends('layouts.board')

@section('title', 'WF1')

@section('content')
    <section>
        <x-crud-header :title="$title" :action="'Agregar Propiedad'"/>
        <table id="search-table" >
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
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            AREA
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            PRECIO
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            H
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            B
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            E
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                        data-type="date" data-format="YYYY/DD/MM">
                        <span class="flex items-center">
                            FECHA DE CAPTACION
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @foreach ($properties as $property)
                    <tr class="">
                    <a>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="">{{ $property->title }}</td> </a>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="">{{ $property->type }}</td> </a>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="">{{ $property->price }}</td> </a>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="">{{ $property->area }}</td> </a>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="">{{ $property->bedrooms }}</td> </a>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="">{{ $property->bathrooms }}</td> </a>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="">{{ $property->parkings }}</td> </a>
                        <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="">{{ $property->captation_start }}</td> </a>
                        {{-- <td class="p-2 space-x-2 whitespace-nowrap">
                            <button type="button" id="updateProductButton"
                                data-drawer-target="drawer-update-product-default"
                                data-drawer-show="drawer-update-product-default"
                                aria-controls="drawer-update-product-default" data-drawer-placement="right"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Update
                            </button>
                            <button type="button" id="deleteProductButton"
                                data-drawer-target="drawer-delete-product-default"
                                data-drawer-show="drawer-delete-product-default"
                                aria-controls="drawer-delete-product-default" data-drawer-placement="right"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Delete item
                            </button>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>



    @endsection
