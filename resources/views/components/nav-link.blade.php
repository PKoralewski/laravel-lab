@props([
    'active' => false,
])

@php
    $classes = $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';

    $default = 'rounded-md px-3 py-2 font-medium ' . $classes;
@endphp

<a {{ $attributes->merge(['class' => $default]) }} aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>
