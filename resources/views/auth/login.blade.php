
<x-guest-layout >

    <x-jet-authentication-card>
        <div style="background-image: url('../assets/img/fondo-beca2.png');background-repeat: no-repeat;background-size: cover;">
        {{-- style="background-image: url('../assets/img/fondo-beca2.png');background-repeat: no-repeat;background-size: cover;" --}}
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            <img class="animate__animated animate__fadeInDown" src="../assets/img/logo-Programa-2020.png" alt="">
        </x-slot>

        <x-jet-validation-errors class="mb-4 " />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" >
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('INICIAR SESIÓN') }}
                </x-jet-button>
            </div>
        </form>
    </div>
    </x-jet-authentication-card>

</x-guest-layout>
