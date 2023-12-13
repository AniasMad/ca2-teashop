@extends('layouts.moderator')

@section('content')

<div class="px-8 py-3 pt-5">
    <h4 class="text-2xl font-bold dark:text-white">{{ $teashop->name }}</h4>
</div>

<div class="px-8 py-3">
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @forelse ($teashop->teas as $tea)
        <div class="group relative">
            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                <img src="{{ asset("storage/images/" . $tea->image) }}" alt="{{ $tea->name }}" class="h-80 w-full object-cover object-center">
            </div>
            <div class="mt-4 flex flex-col">
                <div class="text-sm pl-2 text-gray-400">{{ $tea->name }}</div>
                <div class="text-lg pl-2 font-medium text-gray-50 relative">
                    {{ $tea->price }}€
                </div>
                <div class="mt-2">
                    <form method="POST" action="{{ route('addToFavourites') }}">
                        @csrf
                        <input type="hidden" name="tea_id" value="{{ $tea->id }}">
                        <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">{{__('Add to favourites')}}</button>
                    </form>
                </div>
            </div>
        </div>

        @empty
        <h4 class="text-2xl font-bold dark:text-white">{{__('No teas available at the moment.')}}</h4>
        @endforelse
    </div>
</div>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('status') }}</strong>
        </div>
    @endif

@endsection