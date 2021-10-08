<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="img/logologin.png" width="200px" alt="">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('geral.password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a Senha?') }}
                    </a>
                @endif
                <x-jet-button class="ml-4">
                    {{ __('Entrar') }}
                </x-jet-button><br>
                
            </div><br>
            <hr>
            <center> <a class="" href="/register" style="color: rgb(53, 53, 163)">Registrar-se gratuitamente</a></center>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
