<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Podcasts') }}
        </h2>
    </x-slot>
    <h2>{{ session('status') }}</h2>

    <div>
        <ul class="overflow-hidden shadow-sm sm:rounded-lg  mx-auto max-w-7xl px-6 lg:px-8 flex flex-wrap">
            @foreach($dogs as $dog)
                <li class="bg-white shadow-sm sm:rounded-lg ml-4 mt-4 p-6">
                    <img class="h-16 w-16 sm:rounded-lg" src="{{ Storage::url($dog->image)}}" alt="">
                    <div>
                        <h3 class="text-base font-semibold tracking-tight text-gray-900"><a href="{{route('dogs.show', $dog)}}"> {{$dog->name}}</a></h3>
                        <p class="text-gray-400 text-xs">{{$dog->description}}</p>
                        @can('edit-dogs', $dog)
                            <div class="flex items-center">
                                <form action="{{route('dogs.destroy', $dog)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button type="submit">Delete</x-primary-button>
                                </form>
                                <x-primary-link :href="route('dogs.edit', $dog)" class="ml-4">Edit</x-primary-link>
                            </div>
                        @endcan
                    </div>
                </li>
            @endforeach
            <ul/>
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

