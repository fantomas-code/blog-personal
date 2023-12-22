@props(['value'])

<label {{ $attributes->merge(['class' => 'block dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>