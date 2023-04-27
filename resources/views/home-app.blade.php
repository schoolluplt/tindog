<x-app-layout>


    <h2>{{ session('message') }}</h2>
    <video  src="{{URL::asset("/video/tindog-video.mov")}}" controls>
    </video>
    <x-primary-link :href={{"#register"}}></x-primary-link>
    <form method="POST" action="{{ route('dogs.store') }}" enctype="multipart/form-data" class="w-full sm:max-w-md px-6 py-4 bg-gradient-to-r from-red-500 to-pink-500 shadow-md overflow-hidden sm:rounded-lg opacity-75">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="" name="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Image -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Profile Picture')" />
            <input id="image" class="block mt-1 w-full" type="file" name="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Create account') }}
        </x-primary-button>
    </form>
</x-app-layout>
