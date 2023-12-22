<x-panel.grid-base>
{{-- Actualizar perfil  --}}
<form wire:submit="updateprofile" class="w-[100%]  mx-auto" >
    <fieldset class="p-4 italic border border-[#aaf] bg-neutral-950">
        <legend class="px-2 mx-auto text-2xl text-white uppercase">
            {{ __('Update') }}
        </legend>
    <x-label class="mt-2 text-xl text-white" for="name" :value="__('Name')" />
    <x-input autofocus type="text" class="text-yellow-300" wire:model="user.name" id="name" />
    <x-msg-error :messages="$errors->get('user.name')" class="mt-2 text-xl" />

    @if ( $user->alias )
    <x-label class="mt-2 text-xl text-white" for="name" :value="__('Alias')" />
    <x-input type="text" class="text-yellow-300" wire:model="user.alias" id="name" />
    <x-msg-error :messages="$errors->get('user.alias')" class="mt-2 text-xl" />
     @else
     <x-label class="mt-2 text-xl text-white" for="alias" :value="__('Alias')" />
     <x-input placeholder="Aun no tiene alias ..." type="text" class="text-green-300 placeholder:text-red-400" wire:model="user.alias" id="alias" />
     <x-msg-error :messages="$errors->get('user.alias')" class="mt-2 text-xl" />
    @endif

    @if ( $user->phone )
    <x-label class="mt-2 text-xl text-white" for="phone" :value="__('Phone')" />
    <x-input type="text" class="text-yellow-300" wire:model="user.phone" id="phone" />
    <x-msg-error :messages="$errors->get('user.phone')" class="mt-2 text-xl" />
     @else
     <x-label class="mt-2 text-xl text-white" for="phone" :value="__('Phone')" />
     <x-input placeholder="Aun no tiene teléfono ..." type="text" class="text-green-300 placeholder:text-red-400 " wire:model="user.phone" id="phone" />
     <x-msg-error :messages="$errors->get('user.alias')" class="mt-2 text-xl" />
    @endif
   
    
    <x-label class="mt-2 text-xl text-white" for="email" :value="__('Email')" />
    <x-input type="email" class="text-yellow-300" wire:model="user.email" id="email" />
    <x-msg-error :messages="$errors->get('user.email')" class="mt-2 text-xl" />


    <div class="flex flex-col items-center gap-2 lg:flex-row mt-7 ">
        <x-button class="text-white bg-green-900 hover:bg-[#1c2d5c]">
            {{ __('Update') }}
        </x-button>
        <x-bt-link wire:navigate href="{{ route('panel') }}" class="text-white bg-purple-900 hover:bg-[#0a2521]">
            {{ __('Cancel') }}
        </x-bt-link>
    </div>

    </fieldset>
</form>
{{-- Actualizar contraseña --}}
<form wire:submit="updatepassword" class="w-[100%] mt-3  mx-auto" >
    <fieldset class="p-4 italic border border-[#aaf] bg-neutral-950">
        <legend class="px-2 mx-auto text-2xl text-white uppercase">
            {{ __('Update password') }}
        </legend>

    <x-label class="mt-2 text-xl text-white" for="current_password" :value="__('Current password')" />
    <x-input type="password" class="text-white" wire:model="current_password" id="current_password" />
    <x-msg-error :messages="$errors->get('current_password')" class="mt-2 text-xl" />

    <x-label class="mt-2 text-xl text-white" for="password" :value="__('New Password')" />
    <x-input type="password" class="text-white" wire:model="password" id="password" />
    <x-msg-error :messages="$errors->get('password')" class="mt-2 text-xl" />
     
    <x-label class="mt-2 text-xl text-white" for="password_confirmation" :value="__('Confirm password')" />
    <x-input type="password" class="text-white" wire:model="password_confirmation" id="password_confirmation" />
    <x-msg-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xl" />

    <div class="flex  items-center gap-2  mt-7 ">
        <x-button class="text-white bg-green-900 hover:bg-[#1c2d5c]">
            {{ __('Update') }}
        </x-button>
        <x-bt-link href="{{ route('perfil') }}" class="text-white bg-purple-900 hover:bg-[#0a2521]">
            {{ __('Cancel') }}
        </x-bt-link>
    </div>
    <div class="mt-5">
        {{-- <p>{{ __('Saved') }} ...</p> --}}
        <x-action-msg class="text-xl text-lime-300" on="password-updated">
            {{ __('Updated password') }}
        </x-action-msg>
    </div>
   
    </fieldset>
</form>
{{-- Borrar cuenta --}}
<div class="bg-stone-900 mt-3 p-3 shadow shadow-black">
    <header>
        <h2 class="text-2xl font-medium text-yellow-300 dark:text-gray-100">
            {{ __('Delete account') }}
        </h2>

        <p class="mt-1  text-red-300 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <form wire:submit="deleteprofile" class="p-1 mt-4 flex gap-1">

        <x-button-danger class="mt-3">
            {{ __('Deleted') }}
        </x-button-danger>

    </form>

</div>
</x-panel.grid-base>
