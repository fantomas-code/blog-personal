<x-panel.grid-base>
    {{-- Actualizar perfil  --}}
<form wire:submit="insertarticle" class="w-[100%]  mx-auto" >
    <fieldset class="p-4 italic border border-[#aaf] bg-[#08133a]">
    <legend class="px-2 mx-auto text-2xl text-white uppercase">
        {{ __('Create article') }}
    </legend>
        <x-panel.image-form wire:model="image" :image="$image" :existing="$article->image"/>

        {{-- <div class="relative">
            @if ($image)
            <x-button-danger wire:click="$set('image', null)" class="absolute bottom-2 left-2">
                {{ __('Change image') }}
            </x-button-danger>
                <img class="h-44 w-full bg-cover bg-center" src="{{ $image?->temporaryUrl() }}" />
            @elseif ($article->image)
            <x-label for="image" class="cursor-pointer text-xl absolute bottom-2 left-2 text-white bg-purple-900 p-2 shadow shadow-black w-[40%] text-center" :value="__('Change image')" />
                <img class="h-44 w-full bg-cover bg-center" src="{{ $article->image }}" />
            @else

            <div class="h-44 bg-green-950 border border-dashed rounded flex items-center justify-center shadow shadow-black mb-4">
                <x-label for="image" class="cursor-pointer text-xl text-white bg-purple-900 p-2 shadow shadow-black w-[40%] text-center" :value="__('Select the image [ jpg, png, svg o gif ]')" />
            </div>
            @endif
            <input type="file" wire:model="image" id="image" class="hidden">
        </div> --}}
{{--             <div class="relative">
                @if ($image)
                    <x-button-danger wire:click="$set('image')" class="absolute bottom-2 left-2">
                        {{ __('Change image') }}
                    </x-button-danger>
                    <img class="border h-52 w-full" src="{{ $image->temporaryUrl() }}" />
                @else
                <div class="flex border-2 p-7 justify-center border-dashed items-center bg-yellow-950 ">
                    <x-label class="cursor-pointer text-xl text-white" for="image" :value="__('Select the image [ jpg, png, svg o gif ]')" />
                    <img class="w-auto h-52 hidden" src="{{ asset('img/luna.jpg') }}" alt="">
                    <input type="file" wire:model="image" id="image" class="hidden">
                </div> 
                @endif
            </div> --}}
            {{-- @if($image)         
            @endif --}}
    
            {{-- @if( $this->article->image)
            <div class="relative m-4 ">
                <div class="absolute mx-2 my-auto mt-3">
                    <button title="Borrar imagen" wire:click.prevent="deleteImage" class="p-2 border rounded bg-red-950">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </button>
                </div>
                <img class="w-48 h-48 border rounded-full" src="{{ $this->article->image }}" alt="{{ $this->article->title }}">
            </div>
            @else
            <div class="flex items-center justify-center w-full p-5 mb-3 bg-black border border-dashed h-52">
                <x-label class="mt-2 text-xl text-white cursor-pointer" for="image" :value="__('Sube la imagen [ jpg, png, svg o gif ]')" />
                <input type="file" wire:model="image" id="image" class="hidden">
            </div>
            <x-msg-error :messages="$errors->get('image')" class="mt-2 text-xl" />
            @endif --}}

        <x-label class="mt-2 text-xl text-white" for="title" :value="__('Title')" />
        <x-input autofocus type="text" class="text-yellow-300" wire:model="article.title" id="title" />
        <x-msg-error :messages="$errors->get('article.title')" class="mt-2 text-xl" />
    
        <x-label class="mt-2 text-xl text-white" for="body" :value="__('Content')" />
        <x-textarea type="email" class="text-yellow-300" wire:model="article.body" id="body" />
        <x-msg-error :messages="$errors->get('article.body')" class="mt-2 text-xl" />   
    
        <div class="flex flex-col items-center gap-2 lg:flex-row mt-7 ">
            <x-button wire:loading.attr="disabled" class="text-white bg-green-900 hover:bg-[#1c2d5c]">
                {{-- {{ __('Saved article') }} --}}
                <span wire:loading.class="hidden">{{ __('Saved article') }}</span>
                <div wire:loading wire:target="insertarticle">{{ __('In progress ...') }}</div>
            </x-button>
            <x-bt-link href="{{ route('panel') }}" class="text-white bg-purple-900 hover:bg-[#0a2521]">
                {{ __('Cancel') }}
            </x-bt-link>
        </div>
    
        </fieldset>
</form>
</x-panel.grid-base>
