@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
<div>
    <div class="px-6 py-3">
        <h4 class="text-2xl font-bold dark:text-white">{{__('Show Teashop')}}</h4>
    </div>
    <div class="px-6 py-3">
        <!-- Display fields -->
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Teashop name')}}</label>
        <input type="text" id="name" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $teashop->name }}" disabled>
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Address')}}</label>
        <input type="text" id="address" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $teashop->address }}" disabled>
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Phone Number')}}</label>
        <input type="text" id="phone" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $teashop->phone }}" disabled>
    </div>
</div>

</div>


@endsection