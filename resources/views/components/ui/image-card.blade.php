@props(['image', 'alt' => ''])

<div {{ $attributes->merge(['class' => 'group relative overflow-hidden rounded-xl bg-gray-100 shadow-md transition duration-300 hover:shadow-xl aspect-square']) }}>
    @if($image)
        <img src="{{ $image }}" alt="{{ $alt }}" class="absolute inset-0 h-full w-full object-cover transition duration-500 group-hover:scale-110">
    @else
        <div class="absolute inset-0 h-full w-full bg-gray-200"></div>
    @endif
    <div class="absolute inset-0 bg-black/0 transition duration-300 group-hover:bg-black/20 pointer-events-none"></div>
</div>