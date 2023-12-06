

@extends('layouts.app')

@section('content')

<div class="px-6 py-3">
    <h4 class="text-2xl font-bold dark:text-white">Teashops and teas</h4>
</div>

<div class="px-6 py-3">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Teashop Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($teashops as $teashop)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $teashop->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $teashop->address }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $teashop->phone }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('mainmenu.show', $teashop->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Open the Shop</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('status') }}</strong>
        </div>
    @endif

@endsection
