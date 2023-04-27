<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$podcast->name}}
        </h2>
    </x-slot>

    <h2>{{ session('message') }}</h2>
    <br>
    <div class="mx-auto max-w-7xl gap-y-20 px-6 lg:px-8 max-w-7xl sm:px-6 lg:px-8 mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg inline-flex">
        <div class="inline-flex items-middle p-6 flex-between">
            <img class="h-16 w-16 rounded-full" src="{{ Storage::url($podcast->image)}}" alt="">
            <div class="ml-4">
                <h1 >{{$podcast->name}}</h1>
                <h2 class="text-gray-400 text-xs">{{$podcast->user->name}}</h2>
            </div>
            <p class="ml-4 text-gray-600">{{$podcast->description}}</p>
            <div class="ml-4 bg-white ">
                <audio controls src="{{ Storage::url($podcast->audio )}}" class="">
                    <source src="{{Storage::url($podcast->audio)}}" class="ml-2">
                </audio>
            </div>
            <x-primary-link :href="route('users.show', $podcast->user)" class="ml-4">
                User page
            </x-primary-link>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif

</x-app-layout>
