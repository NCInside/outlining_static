@extends('components.layout')

@section('bg', "bg-home.png")

@section('content')

<div class='grid place-items-center w-full'>
    <div class='text-center pt-16'>
        <p class='text-white text-xl font-bold hebrew'>Welcome to<br/>Visual Communication Design’s</p>
        <p class='text-white text-6xl py-8 erica'>Outlining Design 2023</p>
        <p class='text-white text-md px-12 hebrew font-medium'>Welcome to the online exhibition of the final projects of the Visual Communication Design class of 2023.  This website showcases the work that our class of 2023 students has created over the course of their final year. The work on this website represents not only culminates our students skills in the field of graphic design, but also their abilities to solve problem using Visual communication Design skill both in their personal and family business.</p>
    </div>
    <div class='text-center pt-16 px-8 grid grid-cols-1 justify-center'>
        <p class='text-white erica text-2xl'>Highlights</p>
        <div class="relative">
            <div class="overflow-x-auto flex-shrink-0 flex gap-x-8 py-8" id="highlight-container">
                @foreach ($highlights as $key => $highlight)
                <div class="highlight-cards">
                    <x-projectcard :project="$highlight" style="w-72" />
                </div>
                @endforeach
            </div>
            
            <div class="absolute inset-y-0 left-0 flex items-center">
                <button id="scrollLeftBtn" class="bg-gray-200 rounded-full p-0 w-8 h-8 md:w-16 md:h-16">
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 15.707a1 1 0 0 1-1.414 0L5 10l5.293-5.293a1 1 0 0 1 1.414 1.414L7.414 10l5.293 5.293a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
                </svg>
                </button>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center">
                <button id="scrollRightBtn" class="bg-gray-200 rounded-full p-0 w-8 h-8 md:w-16 md:h-16">
                <svg class="w-full h-full text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.707 4.293a1 1 0 0 1 1.414 0L15 10l-5.293 5.293a1 1 0 0 1-1.414-1.414L12.586 10 7.293 4.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                </svg>
                </button>
            </div>
        </div>          
    </div>
    <div class='text-center pt-16'>
        <p class='text-white erica text-2xl'>Explore Outlining Design</p>
        <div class='grid gap-y-16 gap-x-8 min-[500px]:grid-cols-2 min-[930px]:grid-cols-3 grid-cols-1'>
            @foreach($categories as $category)
                <div class="flex flex-col relative mr-3">
                    <div class="m-6">
                        <a href="{{ route("category", ['category'=>$category['id']]) }}">
                            <img src="/categorylogo/{{$category['img']}}.png" class="h-48 w-full hover:transform hover:scale-110 transition duration-500">
                        </a>
                        <div class="pt-6">
                            <div class="whitespace-pre-wrap hebrew font-bold text-white text-lg">{{ $category['name'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</div>

<script>
    const buttonRight = document.getElementById('scrollRightBtn');
    const buttonLeft = document.getElementById('scrollLeftBtn');
    let scrollInterval;

    buttonRight.addEventListener('mousedown', handleScrollRight);
    buttonLeft.addEventListener('mousedown', handleScrollLeft);
    buttonRight.addEventListener('touchstart', handleScrollRight);
    buttonLeft.addEventListener('touchstart', handleScrollLeft);

    buttonRight.addEventListener('mouseup', clearScrollInterval);
    buttonLeft.addEventListener('mouseup', clearScrollInterval);
    buttonRight.addEventListener('touchend', clearScrollInterval);
    buttonLeft.addEventListener('touchend', clearScrollInterval);

    function handleScrollRight() {
    scrollInterval = setInterval(() => {
        document.getElementById('highlight-container').scrollLeft += 10;
    }, 10);
    }

    function handleScrollLeft() {
    scrollInterval = setInterval(() => {
        document.getElementById('highlight-container').scrollLeft -= 10;
    }, 10);
    }

    function clearScrollInterval() {
    clearInterval(scrollInterval);
    }
</script>

@endsection
