<x-guest-layout>
    @if (session('message'))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <form method="POST" action="{{ route('dogs.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="" name="name" required autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="description" name="description" required autocomplete="new-description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Image -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            <input id="image" class="block mt-1 w-full" type="file" name="image" required autocomplete="new-image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="audio" :value="__('Audio')" />
            <input id="audio" class="block mt-1 w-full" type="file" name="audio" accept="audio/*" required autocomplete="new-audio" />
            <x-input-error :messages="$errors->get('audio')" class="mt-2" />
        </div>


        <!-- podcast path -->
        {{--        <div class="mt-4">--}}
        {{--            <x-input-label for="description" :value="__('podcast')" />--}}
        {{--            <input id="podcast" class="block mt-1 w-full" type="file" name="podcast" required autocomplete="new-podcast" />--}}
        {{--            <x-input-error :messages="$errors->get('podcast')" class="mt-2" />--}}
        {{--        </div>--}}



        <x-primary-button class="ml-4">
            {{ __('Edit podcast') }}
        </x-primary-button>
    </form>
</x-guest-layout>
