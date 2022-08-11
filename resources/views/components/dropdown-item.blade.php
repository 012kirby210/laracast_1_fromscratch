@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-bg-blue-500 hover:text-white';
	$active && $classes.=' bg-white text-blue-500';
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
