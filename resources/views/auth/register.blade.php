<x-guest-layout>
    @section('title')
    <title>JACAH | Register</title>
    @endsection
    @section('mess')
    <h2 style="font-size: 50px;" class="text-white font-bold">
        Sign up for your first account
    </h2>
    @endsection
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <!-- picture -->
        <x-picture-input />

        <!-- Name -->
        <div class="mt-4 flex gap-5">
            <div style="width:50%;">
                <x-input-label for="name" :value="__('Firstname')" />
                <div class="flex">
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="name" />
                </div>
                <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
            </div>
            <div style="width:50%;">
                <x-input-label for="name" :value="__('Lastname')" />
                <div class="flex">
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="name" />
                </div>
                <x-input-error :messages=" $errors->get('lastname')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <div class="flex">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <div class="flex">
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
            </div>

            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="flex">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="flex">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="flex items-center justify-center corsur-pointer h-10 w-100 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700">
                {{ __('Sign up') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-2">
            <a href="{{ route('login') }}" class="cursor-pointer underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-guest-layout>