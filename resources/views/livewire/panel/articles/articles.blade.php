<x-panel.grid-base>
    <section class="p-1 bg-orange-800 h-screen selection:bg-black selection:text-yellow-300">

        <div class="my-2">
        <x-bt-link class="bg-[#260c2c] text-center" :href="route('article.create')">
            {{__('Create article')}}
        </x-bt-link>
        </div>
        <div class="justify-around hidden p-2 shadow shadow-black bg-emerald-900 lg:flex">
            <span>{{ __('Article title') }}</span>
            <span>Acciones</span>
        </div>
        @forelse ($articles as $article)
        <div class="flex items-center  justify-around p-2 gap-2 shadow shadow-black mt-1 bg-stone-900">
            <div class="relative">
                <h2  class=" peer cursor-pointer">
                    {{ ucfirst($article->title)  }}
                </h2>
                @if ($article->image)
                    <img class="w-10 h-10 shadow shadow-white rounded-full hidden absolute peer-hover:flex hover:flex" src="{{ $article->image }}">
                @else
                    <img class="w-10 h-10 shadow shadow-black rounded-full hidden absolute peer-hover:flex hover:flex" src="{{ asset('img/noimage.png') }}">
                @endif
            </div>
            
            <x-dropdown align="right" >         
                <x-slot:trigger> 
                <x-button class="shadow-none bg-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                    </svg>
                </x-button>       
                </x-slot>
                <x-slot:content>
                    <x-bt-link class="p-2 shadow-none flex" :href="route('article.edit', $article)">
                        {{ ucfirst( __('Edit article')) }}
                    </x-bt-link>
                    <x-button-danger  wire:click="delete({{ $article->id }})" class=" cursor-pointer" wire:confirm="{{__('Are you sure you want to delete this article?')}}">
                        {{  ucfirst( __('Deleted')) }}
                </x-button-danger>           
                </x-slot>
            </x-dropdown>
        </div>
            
        @empty
            <div class="bg-slate-950 p-2 mt-3 shadow shadow-zinc-950">
                <p class="drop-shadow text-center">No hay artículos</p>
            </div>
        @endforelse
        </div>
    </section>
</x-panel.grid-base>
{{-- 
            <div class="flex justify-center gap-4">
                <span>
                    <x-bt-link class="bg-transparent shadow-none" :href="route('article.edit', $article)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-[#0BEDE0] drop-shadow-2xl">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                          </svg>
                          
                    </x-bt-link>
                </span>

                
                <span>
                    <img class="w-6 h-6" src="{{ asset('img/borrar.svg') }}" alt="" >
                </span>
               <div class="flex flex-col items-center justify-center gap-3 p-2 m-1 shadow lg:justify-around shadow-black lg:flex-row bg-[#03071E]">
            </div> --}}