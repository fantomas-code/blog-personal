<form wire:submit="register" class="w-[80%] lg:w-2/5 mx-auto" >
    <fieldset class="p-4 italic border border-[#aaf] bg-neutral-950">
        <legend class="px-2 uppercase mx-auto text-2xl text-white">{{ __('Record') }}</legend>
        
    <x-label class="mt-2 text-xl text-white" for="name" :value="__('Name')" />
    <x-input type="text" class="text-white" wire:model="user.name" id="name" />
    <x-msg-error :messages="$errors->get('user.name')" class="mt-2 text-xl" />

    <x-label class="mt-2 text-xl text-white" for="email" :value="__('Email')" />
    <x-input type="email" class="text-white" wire:model="user.email" id="email" />
    <x-msg-error :messages="$errors->get('user.email')" class="mt-2 text-xl" />

    <x-label class="mt-2 text-xl text-white" for="password" :value="__('Password')" />
    <x-input type="password" class="text-white" wire:model="password" id="password" />
    <x-msg-error :messages="$errors->get('password')" class="mt-2 text-xl" />

    <x-label class="mt-2 text-xl text-white" for="password_confirmation" :value="__('Confirm password')" />
    <x-input type="password" id="password_confirmation" class="text-white" wire:model="password_confirmation" />
    <x-msg-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xl" />

    <div class="flex flex-col items-center gap-2 lg:flex-row mt-7 ">
        <x-button class="text-white bg-green-900 hover:bg-[#1c2d5c]">
            {{ __('Register') }}
        </x-button>
        <x-bt-link href="{{ route('login') }}" class="text-white cursor-pointer bg-purple-950 hover:bg-[#0a2521]">
            {{ __('Login') }}
        </x-bt-link>
    </div>

    </fieldset>
</form>
