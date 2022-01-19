<x-guest-layout>
    <x-jet-authentication-card>
        <div class="row justify-content-left">
            <img src="img/logo_blue.png" alt="" height="50%" width="50%">
        </div>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Pasahitza gogoratuta') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
