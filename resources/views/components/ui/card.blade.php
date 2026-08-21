@props(['image', 'title', 'content', 'link', 'featured' => false])

<a href="{{ $link }}" {{ $attributes->merge(['class' => 'group flex flex-col overflow-hidden rounded-2xl bg-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl' . ($featured ? ' sm:col-span-2 md:col-span-2 lg:col-span-2' : '')]) }}>
    <div class="relative {{ $featured ? 'h-64 sm:h-80' : 'h-48 sm:h-56' }} overflow-hidden">
        @if($image)
            <img src="{{ $image }}" alt="{{ $title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
        @else
            <div class="h-full w-full bg-gray-200"></div>
        @endif
    </div>
    <div class="flex flex-1 flex-col p-6">
        <h3 class="mb-2 text-xl font-bold text-gray-900 group-hover:text-amber-500">{{ $title }}</h3>
        <p class="flex-1 text-sm text-gray-600">{{ $content }}</p>
        <div class="mt-4 flex items-center justify-between text-sm font-semibold text-amber-500">
            <span>Baca selengkapnya</span>
            <span>&rarr;</span>
        </div>
    </div>
</a>