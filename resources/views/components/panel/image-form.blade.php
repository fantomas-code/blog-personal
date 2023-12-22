<div class="relative">
    @php($id = $attributes->wire('model')->value)
    @if ($image)
    <x-button-danger wire:click="$set('{{$id}}', null)" class="absolute bottom-2 left-2">
        {{ __('Change image') }}
    </x-button-danger>
        <img class="h-44 w-full bg-cover bg-center" src="{{ $image?->temporaryUrl() }}" />
    @elseif ($existing)
    <x-label :for="$id" class="cursor-pointer text-xl absolute bottom-2 left-2 text-white bg-purple-900 p-2 shadow shadow-black w-[40%] text-center" :value="__('Change image')" />
        <img class="h-44 w-full bg-cover bg-center" src="{{ $existing }}" />
    @else

    <div class="h-44 bg-green-950 border border-dashed rounded flex items-center justify-center shadow shadow-black mb-4">
        <x-label :for="$id" class="cursor-pointer text-xl text-white bg-purple-900 p-2 shadow shadow-black w-[40%] text-center" :value="__('Select the image [ jpg, png, svg o gif ]')" />
    </div>
    @endif
    <input type="file" wire:model="{{$id}}" id="image" class="hidden">
</div>