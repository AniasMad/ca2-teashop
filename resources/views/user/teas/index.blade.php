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
                    {{__('Brand')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('Price')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('Description')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('Created at')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('Updated at')}}
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
                    {{ $tea->brand->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $tea->price }}
                </td>
                <td class="px-6 py-4">
                    {{ $tea->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $tea->created_at }}
                </td>
                <td class="px-6 py-4">
                    {{ $tea->updated_at }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('user.teas.show', $tea->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{__('Show')}}</a>
                </td>
            </tr>
            @empty
            <h4>{{__('No teas found')}}</h4>
        @endforelse 
        </tbody>
    </table>
</div>
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('status') }}</strong>
        </div>
    @endif

@endsection