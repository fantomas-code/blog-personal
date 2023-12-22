<x-panel.grid-base>
{{-- Actualizar perfil  --}}
<form wire:submit="register" class="w-[100%]  mx-auto" >
    <fieldset class="p-4 italic border border-[#aaf] bg-indigo-950">
        <legend class="px-2 mx-auto text-2xl text-white uppercase">
            {{ __('Create article') }}
        </legend>

        @if($image)         
        <div class="flex items-center justify-between ">
            {{--  asset('img/luna.jpg')--}}
            <h3 class="">Previsualización de la imagen   👉 </h3>
            <img class="border w-28 h-28" src="{{ $image->temporaryUrl() }}" alt="">
        </div>
        @endif

        @if($this->article->image)
        <div class=" m-4 relative ">
            <div class="absolute my-auto mt-3 mx-2">
                <button title="Borrar imagen" wire:click.prevent="deleteImage" class="p-2 bg-red-950 rounded border">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </div>
            <img class="border w-48 h-48 rounded-full " src="{{ $this->article->image }}" alt="{{ $this->article->title }}">
        </div>
        @else
        <div class="bg-black mb-3 p-5 flex w-full justify-center items-center border border-dashed h-52">
            <x-label class="mt-2 text-xl text-white cursor-pointer" for="image" :value="__('Sube la imagen [ jpg, png, svg o gif ]')" />
            <input type="file" wire:model="image" id="image" class="hidden">
        </div>
        <x-msg-error :messages="$errors->get('image')" class="mt-2 text-xl" />
        @endif

    <x-label class="mt-2 text-xl text-white" for="title" :value="__('Title')" />
    <x-input autofocus type="text" class="text-yellow-300" wire:model="article.title" id="title" />
    <x-msg-error :messages="$errors->get('article.title')" class="mt-2 text-xl" />

    <x-label class="mt-2 text-xl text-white" for="body" :value="__('Content')" />
    <x-textarea type="email" class="text-yellow-300" wire:model="article.body" id="body" />
    <x-msg-error :messages="$errors->get('article.body')" class="mt-2 text-xl" />   

    <div class="flex flex-col items-center gap-2 lg:flex-row mt-7 ">
        <x-button wire:loading.attr="disabled" class="text-white bg-green-900 hover:bg-[#1c2d5c]">
            <span wire:loading.class="hidden">{{ __('Saved article') }}</span>
            <div wire:loading wire:target="register">{{ __('In progress ...') }}</div>
        </x-button>
        <x-bt-link href="{{ route('panel') }}" class="text-white bg-purple-900 hover:bg-[#0a2521]">
            {{ __('Cancel') }}
        </x-bt-link>
    </div>

    </fieldset>
</form>
</x-panel.grid-base>
