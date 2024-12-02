@extends('layouts.board')

@section('title', 'WF1')

@section('content')
    <section>
        <x-crud-header :title="$title" :action="$action"/>
        <table id="search-table" >
            <thead class="bg-white dark:bg-gray-700">
                <tr class="flex">
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            CEDULA
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            NOMBRE
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            APELLIDO
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            EMAIL
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            TELEFONO
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            C
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            A
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            T
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="p-2 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        <span class="flex items-center">
                            O
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
                @foreach ($owners as $owner)
                    <a>
                        <tr class="">
                            <a>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{number_format($owner->identification, 0, '', '.')}}</td>
                                <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="">{{ $owner->name }}</td> </a>
                                <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="">{{$owner->lastname }}</td> </a>
                                <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="">{{ $owner->email }}</td> </a>
                                <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="">{{ $owner->phone }}</td> </a>
                                <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="">{{ $owner->houses }}</td> </a>
                                <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="">{{ $owner->apartments }}</td> </a>
                                <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="">{{ $owner->terrains }}</td> </a>
                                <td class="p-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="">{{ $owner->others }}</td>
                            </a>
                        </tr>
                    </a>
                @endforeach
            </tbody>
        </table>



    @endsection
