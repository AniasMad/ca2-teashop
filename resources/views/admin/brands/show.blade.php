@extends('layouts.app')

@section('content')

<div class="px-6 py-3">
    <h4 class="text-2xl font-bold dark:text-white">Show Brand</h4>
</div>
<div class="px-6 py-3">
    <!-- Display fields -->
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand name</label>
    <input type="text" id="name" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $brand->name }}" disabled>
    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
    <input type="text" id="address" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $brand->address }}" disabled>
    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
    <input type="text" id="phone" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $brand->phone }}" disabled>
    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
    <input type="text" id="country" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $brand->country }}" disabled>
    
    <!-- Buttons -->
    <a href="{{ route('admin.brands.edit', $brand->id) }}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button></a>
    <form method="POST" action="{{ route('admin.brands.destroy', $brand->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
    </form>
</div>


@endsection