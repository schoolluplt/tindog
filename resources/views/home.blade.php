<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!--  Countdown -->
        <div class="absolute bottom-0 right-0">
            <div class="w-screen sm:max-w-screen mt-6  shadow-md overflow-hidden sm:rounded-lg  bg-gradient-to-r from-red-500 to-pink-500 opacity-95">
                <h1 id="headline" class="flex justify-center pt-5 uppercase ">TINDOG</h1>
                <div id="countdown">
                    <ul class="flex items-center justify-between">
                        <li class="w-1/4 p-6 flex flex-col justify-evenly items-center"><span class="font-semibold text-xl" id="days"></span>Jours</li>
                        <li class="w-1/4 p-6 flex flex-col justify-evenly items-center"><span class="font-semibold text-xl" id="hours"></span>Heures</li>
                        <li class="w-1/4 p-6 flex flex-col justify-evenly items-center"><span class="font-semibold text-xl" id="minutes"></span>Minutes</li>
                        <li class="w-1/4 p-6 flex flex-col justify-evenly items-center"><span class="font-semibold text-xl" id="seconds"></span>Secondes</li>
                    </ul>
                </div>
            </div>
        </div>



    <!--  App mockup -->
    <div class="absolute w-48 bottom-60 right-40 opacity-100 bg-black w-3/4 ">
        <video  src="{{URL::asset("/video/tindog-video.mov")}}" controls autoplay loop>
        </video>
    </div>
    <form method="POST" action="{{ route('register') }}" id="register" >
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
