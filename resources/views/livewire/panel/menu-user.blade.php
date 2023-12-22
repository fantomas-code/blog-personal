<div x-data="{ open: true }" class="text-slate-100">
    <x-dropdown align="right" width="100%">
        <x-slot:trigger>
            <button class="flex items-center w-full px-3 py-4 border border-transparent text-xl italic leading-4 shadow shadow-black text-white bg-[#017214] hover:text-yellow-300 focus:outline-none transition ease-in-out duration-150">
                <div class="capitalize" x-data="{ name: '{{ auth()->user()?->name  }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="ml-3">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>
        <x-slot:content>
            <button class="flex w-full text-white bg-zinc-900">
                <x-bt-link :href="route('perfil')">
                    {{ __('Profile') }}
                </x-bt-link>
            </button>
            <button class="flex w-full text-white bg-zinc-900" wire:click="logout">
                <x-bt-link>
                    {{ __('Logout') }}
                </x-bt-link>
            </button>
        </x-slot>
    </x-dropdown>
</div>
