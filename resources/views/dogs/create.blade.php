<x-app-layout>

    <form method="POST" action="{{ route('dogs.store') }}" enctype="multipart/form-data" class=" mx-auto w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
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
