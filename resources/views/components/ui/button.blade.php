@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center bg-gray-900 !text-white font-bold uppercase tracking-widest hover:bg-gray-800 transition duration-150 ease-in-out px-8 py-3 rounded-md shadow-md']) }}>
    {{ $slot }}
</a>