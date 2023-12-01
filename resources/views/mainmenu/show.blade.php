@extends('layouts.app')

@section('content')

<div class="px-6 py-3">
    <h4 class="text-2xl font-bold dark:text-white">{{ $teashop->name }}</h4>
</div>
<div class="px-6 py-3">
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tea Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Country of origin
                </th>
                <th scope="col" class="px-6 py-3">
                    Brand
                </th>
                <th scope="col" class="px-6 py-3">
                    price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teashop->teas as $tea)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tea->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $tea->brand->country }}
                </td>
                <td class="px-6 py-4">
                    {{ $tea->brand->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $tea->price }}€
                </td>
                <td class="px-6 py-4">
                <form method="POST" action="{{ route('addToFavourites') }}">
                    @csrf
                    <input type="hidden" name="tea_id" value="{{ $tea->id }}">
                    <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Add to favourites</button>
                </form>

                </td>
            </tr>
            @empty
            <h4 class="text-2xl font-bold dark:text-white">No teas available at the moment.</h4>
        @endforelse 
        </tbody>
    </table>
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('status') }}</strong>
        </div>
    @endif
@endsection