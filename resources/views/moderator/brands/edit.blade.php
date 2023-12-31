@extends('layouts.moderator')

@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<!-- Create Post Form -->
<div class="px-6 py-3">
    <h4 class="text-2xl font-bold dark:text-white">{{__('Edit Brand')}}</h4>
</div>
<div class="px-6 py-3">
<form action="{{ route('moderator.brands.update', $brand->id) }}" method="post">
    
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Brand Name')}}</label>
        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('name') ? : $brand->name }}" required>
        @if($errors->has('name'))
        <span class="text-red-500">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Address')}}</label>
        <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('address') ? : $brand->address }}" required>
        @if($errors->has('address'))
        <span class="text-red-500">{{ $errors->first('address') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Phone Number')}}</label>
        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('phone') ? : $brand->phone }}" required>
        @if($errors->has('phone'))
        <span class="text-red-500">{{ $errors->first('phone') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Country')}}</label>
        <input type="text" name="country" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('country') ? : $brand->country }}" required>
        @if($errors->has('country'))
        <span class="text-red-500">{{ $errors->first('country') }}</span>
        @endif
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__('Edit')}}</button>
</form>
</div>

@endsection