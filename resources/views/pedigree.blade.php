@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">Family Pedigree Chart</h1>
        <p class="text-lg text-center mb-10">Simple concept using Tailwind CSS</p>
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th class="border-b-2 py-2">Home Person</th>
                        <th class="border-b-2 py-2">Parents</th>
                        <th class="border-b-2 py-2">Grandparents</th>
                        <th class="border-b-2 py-2">Great Grandparents</th>
                        <th class="border-b-2 py-2">Great-Great Grandparents</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="16" class="border py-4 text-center">Home Person</td>
                        <td rowspan="8" class="border py-4 text-center">Father</td>
                        <td rowspan="4" class="border py-4 text-center">Grandfather</td>
                        <td rowspan="2" class="border py-4 text-center">Great Grandfather</td>
                        <td class="border py-4 text-center">Great-Great Grandfather</td>
                    </tr>
                    <tr>
                        <td class="border py-4 text-center">Great-Great Grandmother</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="border py-4 text-center">Great Grandmother</td>
                        <td class="border py-4 text-center">Great-Great Grandfather</td>
                    </tr>
                    <tr>
                        <td class="border py-4 text-center">Great-Great Grandmother</td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="border py-4 text-center">Grandmother</td>
                        <td rowspan="2" class="border py-4 text-center">Great Grandfather</td>
                        <td class="border py-4 text-center">Great-Great Grandfather</td>
                    </tr>
                    <tr>
                        <td class="border py-4 text-center">Great-Great Grandmother</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="border py-4 text-center">Great Grandmother</td>
                        <td class="border py-4 text-center">Great-Great Grandfather</td>
                    </tr>
                    <tr>
                        <td class="border py-4 text-center">Great-Great Grandmother</td>
                    </tr>
                    <tr>
                        <td rowspan="8" class="border py-4 text-center">Mother</td>
                        <td rowspan="4" class="border py-4 text-center">Grandfather</td>
                        <td rowspan="2" class="border py-4 text-center">Great Grandfather</td>
                        <td class="border py-4 text-center">Great-Great Grandfather</td>
                    </tr>
                    <tr>
                        <td class="border py-4 text-center">Great-Great Grandmother</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="border py-4 text-center">Great Grandmother</td>
                        <td class="border py-4 text-center">Great-Great Grandfather</td>
                    </tr>
                    <tr>
                        <td class="border py-4 text-center">Great-Great Grandmother</td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="border py-4 text-center">Grandmother</td>
                        <td rowspan="2" class="border py-4 text-center">Great Grandfather</td>
                        <td class="border py-4 text-center">Great-Great Grandfather</td>
                    </tr>
                    <tr>
                        <td class="border py-4 text-center">Great-Great Grandmother</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="border py-4 text-center">Great Grandmother</td>
                        <td class="border py-4 text-center">Great-Great Grandfather</td>
                    </tr>
                    <tr>
                        <td class="border py-4 text-center">Great-Great Grandmother</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
