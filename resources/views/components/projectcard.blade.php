@props(['project', 'style'])

<a href="{{ route('show', ['project' => $project['id']]) }}">
    <div class="relative hover:transform hover:scale-110 transition duration-500 {{ $style }}">
        <div class="aspect-w-1 aspect-h-1 w-full">
            <img class="object-cover" src="/projectphoto/{{ $project['nim']}}.png" alt="{{ $project['title'] }}">
        </div>
        <div class="absolute bottom-0 bg-gradient-to-b from-[#000000] text-left w-full pl-3 pt-1 pb-4">
            <div class="text-white text-xl erica line-clamp-2">{{ $project['title'] }}</div>
            <p class="text-white text-lg hebrew font-bold">{{ $project['name'] }}</p>
        </div>
    </div>
</a>