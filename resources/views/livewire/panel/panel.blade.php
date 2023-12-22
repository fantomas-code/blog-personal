<x-panel.grid-base>
    <div class="grid grid-cols-6 gap-1">
        <div class="col-span-6 p-3 bg-red-600 rounded-md shadow lg:col-span-2 shadow-black flex justify-between items-center">
            Usuarios  
            <div class="bg-cyan-800 rounded-full h-10 w-10 shadow shadow-black justify-center flex p-2">{{ $users->count() }}</div> 
        </div>
    <div class="col-span-6 p-3 bg-red-600 rounded-md shadow lg:col-span-2 shadow-black">Categorias 4</div>
    <div class="col-span-6 p-3 bg-red-600 rounded-md shadow lg:col-span-2 shadow-black">Artículos 6</div>
    </div>

</x-panel.grid-base>