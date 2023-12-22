<form wire:submit="login" class="w-[80%] lg:w-2/5 mx-auto" >
    @if (session('msg'))
    <div class="w-[100%] p-2 mx-auto my-5 text-xl italic tracking-widest text-center shadow shadow-black text-amber-200 bg-cyan-950">
        {{ session('msg') }}
    </div>
    @endif

    <fieldset class="p-4 italic shadow shadow-black border border-[#aaf] bg-neutral-950">
        <legend class="px-2 uppercase mx-auto text-2xl text-white">{{ __('Login') }}</legend>
        
    <x-label class="mt-2 text-xl text-white" for="id_login" :value="__('Email, alias or phone')" />
    <x-input type="text" class="text-white" wire:model="id_login" id="id_login" />
    <x-msg-error :messages="$errors->get('id_login')" class="mt-2 text-xl" />

    <x-label class="mt-2 text-xl text-white" for="password" :value="__('Password')" />
    <x-input type="password" class="text-white" wire:model="password" id="password" />
    <x-msg-error :messages="$errors->get('password')" class="mt-2 text-xl" />

    <div class="mt-4 flex items-center">
        <x-label :value="__('Remember session')" class="mr-3   text-xl text-white" for="remember" />

        <input type="checkbox" class="rounded-full bg-cyan-950 border border-yellow-300" id="remember">
    </div>

    <div class="flex flex-col items-center gap-2 lg:flex-row mt-7 ">
        <x-button class="text-white bg-green-900 hover:bg-[#1c2d5c]">
            {{ __('Enter your session') }}
        </x-button>
        <x-bt-link href="{{ route('register') }}" class="text-white cursor-pointer bg-purple-950 hover:bg-[#0a2521]">
            {{ __('Record') }}
        </x-bt-link>
    </div>

    </fieldset>
</form>

