@props(['active', 'as' => 'Link'])

@php
$classes = ($active ?? false)
    ? 'flex w-full items-center rounded-lg p-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 focus:bg-blue-gray-50 focus:bg-opacity-80 bg-blue-gray-50 bg-opacity-80 text-white bg-gradient-to-tr from-gray-900 to-gray-800'
    : 'flex w-full items-center rounded-lg p-2 text-start leading-tight outline-none transition-all hover:bg-blue-gray-50 hover:bg-opacity-80 focus:bg-blue-gray-50 focus:bg-opacity-80 text-blue-gray-500';
@endphp

<{{ $as }} {{ $attributes->class($classes) }}>
    {{ $slot }}
</{{ $as }}>
