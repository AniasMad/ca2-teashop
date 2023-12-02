@extends('layouts.app')

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
    <h4 class="text-2xl font-bold dark:text-white">Edit Tea</h4>
</div>
<div class="px-6 py-3">
<form action="{{ route('admin.teas.update', $tea->id) }}" method="post">
    
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tea Name</label>
        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('name') ? : $tea->name }}" required>
        @if($errors->has('name'))
        <span class="text-red-500">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
        <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('price') ? : $tea->price }}" required>
        @if($errors->has('price'))
        <span class="text-red-500">{{ $errors->first('price') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ old('description', $tea->description) }}</textarea>
        @if($errors->has('description'))
            <span class="text-red-500">{{ $errors->first('description') }}</span>
        @endif
    </div>

    <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select the brand</label>
    <select id="brand_id" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    <option value="" disabled>Choose the brand</option>
    @foreach($brands as $brand)
        <option value="{{ $brand->id }}" @if($brand->id == old('brand', $tea->brand_id)) selected @endif>{{ $brand->name }}</option>
    @endforeach
    </select>

    @if($errors->has('brand_id'))
        <span class="text-red-500">{{ $errors->first('brand_id') }}</span>
    @endif
    <div class="py-4">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
    </div>
</form>
</div>

@endsection