<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="flex items-center justify-center corsur-pointer h-10 w-100 bg-green-500 hover:bg-green-700 active:bg-green-700 focus:bg-green-700">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-primary-button class="w-100 h-10 flex sm:justify-center items-center bg-red-500 hover:bg-red-700 active:bg-red-700 focus:bg-red-700">
                {{ __('Log out') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>