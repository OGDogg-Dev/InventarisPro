@props(['active'])

@php
$activeClasses = 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-white bg-primary-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-150 ease-in-out';
$inactiveClasses = 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-md focus:outline-none focus:bg-gray-100 focus:text-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $active ? $activeClasses : $inactiveClasses]) }}>
    {{ $slot }}
</a>
