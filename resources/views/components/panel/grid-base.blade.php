<main class="flex flex-col h-screen ">
    <header class="p-3 text-xl flex relative flex-col lg:flex-row items-center shadow bg-[#160236] shadow-black ">
        <h2 class="w-full text-2xl text-center">Lunático</h2>
        <x-input-search placeholder="Buscar aca ..."/>
    </header>

    {{-- @if (session('msg'))
        <div class="w-[100%] p-2 mx-auto my-5 text-xl italic tracking-widest text-center shadow shadow-black text-white bg-[#a56f1f]">
            {{ session('msg') }}
        </div>
    @endif --}}
    <section x-data="{ open: false }" class="grid grid-cols-11 gap-1 p-2  overflow-y-scroll">
    @include('components.panel.menu-movil')
    <button @click="open = ! open" class="absolute z-50 flex bg-[#092042] border border-lime-600  lg:hidden bottom-7 right-7">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 drop-shadow">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>          
    </button>
        <article class=" col-span-11 p-1 text-xl shadow bg-teal-950 shadow-black lg:col-span-8">
            {{ $slot }}
        </article>

        <aside class="col-span-11 lg:col-span-3 ">
            <div class=" bg-cyan-950 p-1 text-clip absolute w-[26.5%] overflow-hidden hidden lg:grid ">
                <nav class="hidden gap-1 p-2 shadow shadow-black lg:flex lg:flex-col bg-indigo-950">
                    @livewire('panel.menu-user')
                    <x-bt-link  href="{{ route('article.index') }}" class="text-white bg-purple-900 hover:bg-[#0a2521]">
                        {{ __('Articles') }}
                    </x-bt-link>
                    {{-- <a class="p-2 bg-black shadow shadow-stone-800" href="">Enlaces 2</a>
                    <a class="p-2 bg-black shadow shadow-stone-800" href="">Enlaces 3</a> --}}
                    <a class="p-2.5 bg-black shadow shadow-stone-800" href="">Enlaces 4</a>
                </nav>
            </div> 
        </aside>
    </section>
</main>