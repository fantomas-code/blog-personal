<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block  p-2.5 shadow shadow-black tracking-widest text-center bg-red-800 italic border border-yellow-200']) }}>
    {{ $slot }}
</button>