<x-guest-layout>
    @section('mess')
    <h2 style="font-size: 50px;" class="font-bold text-white">
        Sign in to your account
    </h2>
    <p class="text-white">To continue reservation you must login your account!</p>
    @endsection
    <ul>
        <li class="text-red-600">
            <p class="text-red-600">You must login to Continue Reservation</p>
        </li>
    </ul>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div style="background-color: transparent; display:flex;">
                <x-text-input id="password" class="block mt-1 w-full" style="padding-right:40px;" type="password" name="password" required autocomplete="current-password" />
                <div id="viewBtn" style="position: absolute; transform:translate(370px, 25px); color: #4e4c4c91;">
                    <svg id="isOpen" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                        <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                    </svg>
                    <svg id="isClose" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" style="display:none;">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                    </svg>
                </div>
                <script>
                    const open = document.getElementById('isOpen');
                    const close = document.getElementById('isClose');
                    const input = document.getElementById('password');
                    var display = 'password';
                    open.addEventListener('click', function() {
                        if (display === 'password') {
                            input.type = 'text';
                            display = 'text';
                            open.style.display = 'none';
                            close.style.display = 'flex';
                        }
                    })
                    close.addEventListener('click', function() {
                        if (display === 'text') {
                            input.type = 'password';
                            display = 'password';
                            close.style.display = 'none';
                            open.style.display = 'flex';
                        }
                    })
                </script>

            </div>


            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <!-- <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label> -->
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 opacity-25 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Forgot your password?') }}
            </a>
            @endif

        </div>

        <div class="mt-4 flex items-end justify-end">
            <x-primary-button class="w-100 h-10 flex sm:justify-center items-center bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-end mt-4 sm:justify-center items-center opacity-25">
            {{ __('Do not have an account?') }}
            <a class="cursor-pointer ml-4 underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                {{ __('Sign up') }}
            </a>

        </div>
        <div class="mt-8">
            <h4 class="line" style=" width: 100%;
                text-align: center;
                border-bottom: 1px solid #4e4c4c91;
                line-height: 0.1em;
                margin: 10px 0 20px;"><span style="background: #fff;
                padding: 0 10px;">or</span></h4>
        </div>
        <div class="flex items-center justify-center mt-4" style="">
            <div style="display:flex; cursor:pointer;" class="opacity-25">
                <a style="display: inline-flex;" class=" shadow-md overflow-hidden sm:rounded-lg no-underline text-black">
                    <div style="background-color: white; padding:5px;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 48 48">
                            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                        </svg>
                    </div>
                    <div style="padding:8px; background-color:#0074e8; color:white;">
                        Sign in with Google
                    </div>
                </a>
            </div>
        </div>

        <!-- <div class="flex items-center justify-end mt-4 sm:justify-center items-center">


            <a href="{{route('room')}}" class="text-white no-underline rounded-md w-100 h-10 flex sm:justify-center items-center bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700">
                {{ __('Back') }}
            </a>

        </div> -->
    </form>
</x-guest-layout>
<script>
    function directTosignup() {

        document.getElementById('register-blade').classList.add('open');
        document.getElementById('login-blade').classList.remove('open');


    }
</script>