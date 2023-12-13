@extends('layouts.moderator')

@section('content')

<div class="px-6 py-3">
    <h4 class="text-2xl font-bold dark:text-white">{{__('Show Teas')}}</h4>
</div>
<div class="px-6 py-3">
    <!-- Display fields -->
    <img width="150" src="{{ asset("storage/images/" . $tea->image) }}" />
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Tea name')}}</label>
    <input type="text" id="name" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $tea->name }}" disabled>
    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Brand')}}</label>
    <input type="text" id="brand" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $tea->brand->name }}" disabled>
    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Price')}}</label>
    <input type="text" id="price" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $tea->price }}" disabled>
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Description')}}</label>
    <textarea id="description" rows="4" aria-label="disabled input" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>{{ $tea->description }}</textarea>
    <!-- Buttons -->
    <div class="py-3">
    <a href="{{ route('moderator.teas.edit', $tea->id) }}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__('Edit')}}</button></a>

<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

@endsection