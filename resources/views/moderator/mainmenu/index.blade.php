

@extends('layouts.moderator')

@section('content')

<div class="px-10 py-3">
    <h2 class="text-2xl font-bold dark:text-white">{{__('Teashops and teas')}}</h2>
</div>
<div class="flex flex-wrap mx-4 px-10">
    @foreach($teashops as $teashop)
        <div class="w-full md:w-1/4 px-4 mb-4">
            <div class="max-w-sm h-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                <a href="{{ route('moderator.mainmenu.show', $teashop->id) }}">
                    <img class="rounded-t-lg object-cover h-60 w-full" src="{{ asset("storage/images/" . $teashop->image) }}" alt="Teashop image" />
                </a>
                <div class="p-5 flex flex-col justify-between">
                    <a href="{{ route('moderator.mainmenu.show', $teashop->id) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ Illuminate\Support\Str::limit($teashop->name, $limit = 20, $end = '...') }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Illuminate\Support\Str::limit($teashop->address, $limit = 30, $end = '...') }}</p>
                    <a href="{{ route('moderator.mainmenu.show', $teashop->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{__('Enter the shop')}}
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>



           

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('status') }}</strong>
        </div>
    @endif

@endsection
