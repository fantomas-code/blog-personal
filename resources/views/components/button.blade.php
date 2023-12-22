<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block w-full p-2.5 shadow shadow-black uppercase tracking-widest text-center bg-red-800 italic']) }}>
    {{ $slot }}
</button>