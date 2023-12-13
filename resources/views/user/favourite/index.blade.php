
@extends('layouts.app')

@section('content')

<div class="relative overflow-x-auto sm:rounded-lg py-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{__('Tea Name')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('Action')}}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($teas as $tea)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tea->name }}
                </th>
                <td class="px-6 py-4">
                <form action="{{ route('removeFromFavourites') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="tea_id" value="{{ $tea->id }}">
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{__('Delete')}}</button>
                </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2">{{__('No favourite teas found')}}</td>
            </tr>
            @endforelse 
        </tbody>
    </table>
</div>
@if (session('status'))
    <!-- display status if available -->
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{{ session('status') }}</strong>
    </div>
@endif
@endsection
