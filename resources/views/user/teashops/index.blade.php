@extends('layouts.app')

@section('content')

<div class="relative overflow-x-auto sm:rounded-lg py-4">
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
                    Phone number
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
                <th scope="col" class="px-6 py-3">
                    Updated at
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($teashops as $teashop)
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
                    {{ $teashop->created_at }}
                </td>
                <td class="px-6 py-4">
                    {{ $teashop->updated_at }}                  
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('user.teashops.show', $teashop->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                </td>
            </tr>
            @empty
            <h4>No teashops found</h4>
        @endforelse 
        </tbody>
    </table>
    {{ $teashops->links() }}
</div>
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('status') }}</strong>
        </div>
    @endif


@endsection