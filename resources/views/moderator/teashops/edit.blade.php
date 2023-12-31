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
    <h4 class="text-2xl font-bold dark:text-white">{{__('Edit Teashop')}}</h4>
</div>
<div class="px-6 py-3">
<form enctype="multipart/form-data" action="{{ route('moderator.teashops.update', $teashop->id) }}" method="post">
    
    @csrf
    @method('PUT')
    <img width="150" class="mb-4" src="{{ asset("storage/images/" . $teashop->image) }}" alt="Current Image">
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Teashop Name')}}</label>
        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('name') ? : $teashop->name }}" required>
        @if($errors->has('name'))
        <span class="text-red-500">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Address')}}</label>
        <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('address') ? : $teashop->address }}" required>
        @if($errors->has('address'))
        <span class="text-red-500">{{ $errors->first('address') }}</span>
        @endif
    </div>
    <div class="mb-6">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Phone Number')}}</label>
        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('phone') ? : $teashop->phone }}" required>
        @if($errors->has('phone'))
        <span class="text-red-500">{{ $errors->first('phone') }}</span>
        @endif
    </div>

    <div>
    <div class="px-6 py-3">
        <h4 class="text-2xl font-bold dark:text-white">{{__('Add new tea')}}</h4>
    </div>

    <div class="px-6 py-3">
        <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('Select an option')}}</label>
        <select name="teas[]" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled>{{__('Choose the tea')}}</option>
            @foreach($teas as $tea)
                <option value="{{ $tea->id }}">{{ $tea->name }}</option>
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
    </div>
</div>


    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__('Edit')}}</button>
</form>
</div>

@endsection