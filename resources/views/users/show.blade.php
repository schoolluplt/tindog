<x-app-layout>

    <section class="">
        <div class="ml-6 mr-6 w-3/4 h-full p-6 lg:px-8 mt-4 bg-white shadow-sm md:rounded-lg">
            <img class="" width="" height="" src="./public/img/user.png" alt="">
            <div>
                <p class=""{{$user->description}}></p>
            </div>
            <div class="">
                <h1>{{$user->name}}</h1>
                <p class="text-gray-400 text-xs mb-6">{{$user->email}}</p>
            </div>
            <div class="flex space-x-5">
                <x-primary-link class="mb-4" type="submit" :href="route('profile.edit')">Edit Account</x-primary-link>
                <form action="{{route('dogs.create')}}" method="GET">
                    @csrf
                    @method('get')

                        <x-primary-button type="submit">New dog account</x-primary-button>
                </form>
            </div>
        </div>

        <div class="ml-6 mb-6">
            @foreach($user->dogs as $dog)
                <div class="w-fit  p-6 gap-x-8 gap-y-20 px-6  mt-4 bg-white overflow-hidden shadow-sm md:rounded-lg md:flex md:items-center ">
                    <img class="" width="50" height="" src="{{ Storage::url($dog->image)}}" alt="Dog">
                    <a href="{{route('dogs.show', $dog)}}"> {{$dog->name}}</a>
                    <p class="text-gray-400 text-xs">{{$dog->created_at}}</p>
                    @can('edit-dogs', $dog)
                        <x-primary-link :href="route('dogs.edit', $dog)" class="">Edit</x-primary-link>
                    @endcan
                </div>
            @endforeach
        </div>
    </section>

    <h2>{{ session('message') }}
    </h2>

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
