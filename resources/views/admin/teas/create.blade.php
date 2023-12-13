@extends('layouts.admin')

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
    <h4 class="text-2xl font-bold dark:text-white">{{ __('Create Tea') }}</h4>
</div>
<div class="px-6 py-3">
<form enctype="multipart/form-data" action="{{ route('admin.teas.store') }}" method="post">
    
    @csrf
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Tea Name') }}</label>
        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('name')}}" required>
        @if($errors->has('name'))
        <span class="text-red-500">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Price') }}</label>
        <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('price')}}" required>
        @if($errors->has('price'))
        <span class="text-red-500">{{ $errors->first('price') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Description') }}</label>
        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ old('description') }}</textarea>
        @if($errors->has('description'))
            <span class="text-red-500">{{ $errors->first('description') }}</span>
        @endif
    </div>

    <label for="brand_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Select the brand') }}</label>
    <select id="brand_id" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    <option value="" disabled>{{ __('Choose the brand') }}</option>
    @foreach(\App\Models\Brand::all() as $brand)
        <option value="{{ $brand->id }}" @if($brand->id == old('brand')) selected @endif>{{ $brand->name }}</option>
    @endforeach
    </select>
    <input
        type="file"
        name="image"
        placeholder="Image"
        class="w-full mt-6"
        field="image"
        />
    @if($errors->has('image'))
        <span class="text-red-500">{{ $errors->first('image') }}</span>
    @endif

    @if($errors->has('brand_id'))
        <span class="text-red-500">{{ $errors->first('brand_id') }}</span>
    @endif
    </div>
    <div class="px-6 py-4">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Create') }}</button>
    </div>
</form>
</div>

@endsection