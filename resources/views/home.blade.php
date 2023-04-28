<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!--  Countdown -->
        <div class="absolute bottom-0 right-0">
            <div class="w-screen sm:max-w-screen mt-6 shadow-md overflow-hidden sm:rounded-lg  bg-gradient-to-r from-red-500 to-pink-500 opacity-95 flex items-center justify-center">
                <div id="countdown" class="w-2/4 text-white">
                    <ul class="flex items-center justify-center">
                        <li class="w-1/4 p-6 flex flex-col justify-evenly items-center text-xl uppercase "><span class="font-semibold text-xl" id="days"></span>Days</li>
                        <li class="w-1/4 p-6 flex flex-col justify-evenly items-center text-xl uppercase "><span class="font-semibold text-xl" id="hours"></span>Hours</li>
                        <li class="w-1/4 p-6 flex flex-col justify-evenly items-center text-xl uppercase "><span class="font-semibold text-xl" id="minutes"></span>Minutes</li>
                        <li class="w-1/4 p-6 flex flex-col justify-evenly items-center text-xl uppercase "><span class="font-semibold text-xl" id="seconds"></span>Secondes</li>
                    </ul>
                </div>
            </div>
        </div>


    <div class="card absolute bottom-40 left-24 w-full sm:max-w-md mt-6 px-6 py-4 bg-gradient-to-r from-red-500 to-pink-500 shadow-md overflow-hidden sm:rounded-lg ">
        <div class="card-body">
            <h5 class="card-title text-xl uppercase pb-6">Tinder, pour vos chiens.</h5>
            <p class="card-text">We are excited to announce the launch of "Tindogs", the dog dating app that brings canine companionship to the digital age. This app is designed to connect dog owners with compatible playmates for their furry friends, making it easier than ever to find suitable companions for your dog. With features such as an intuitive interface, a messaging system for arranging playdates, and a community of like-minded dog owners, "Tindog" is the perfect solution for those who want to socialize their dogs and create meaningful connections. Join the pack today and start swiping!</p>
            <x-primary-link class="mt-6">Register</x-primary-link>
        </div>
    </div>
    <!--  App mockup -->
    <div class="absolute w-48 bottom-40 right-40 card absolute bottom-40 sm:max-w-md overflow-hidden sm:rounded-lg ">
        <div class="card-body">
            <video  src="{{URL::asset("/video/tindog-video.mov")}}" controls autoplay loop>
            </video>
        </div>

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
