@extends('components.layout')

@section('color', '#000000')


@section('bg', "/projectbg/" . $project['nim'] . ".png")

@section('content')

<div class="text-white pt-[72px]">
    <div class="py-4">
        <button id="backButton" class="text-lg hebrew font-bold py-2 px-6 bg-gradient-to-r from-[#000000] fixed top-20 left-0 z-50">< Back</button>
    </div>
    <div class="flex flex-wrap-reverse w-full md:justify-between justify-around justify-items-center place-items-center pt-8 px-12">
        <div class="text-center md:text-left w-96 md:w-2/5 pt-12 md:pt-0">
            <p class="text-4xl md:text-2xl min-[1015px]:text-4xl min-[1300px]:text-5xl erica">{{ $project['title'] }}</p>
            <br>
            <p class="text-lg hebrew md:text-base min-[1300px]:text-xl font-bold">{{ $project['description'] }}</p>
        </div>
        <div class="w-96 md:w-[45%]">
            <img src="/projectphoto/{{ $project['nim'] }}.png" alt="{{ $project['title'] }}" class="m-auto">
        </div>
    </div>
    <div class='text-center grid grid-cols-1 justify-center pt-16 px-2'>
        <p class='erica text-2xl'>Final Project Gallery</p>
        <div class="relative">
            <div class="flex overflow-x-auto flex-shrink-0 gap-x-8 p-8" id="container">
                <div class="m-auto">
                    <iframe
                        width="260"
                        height="460"
                        src={{ $project['video'] }}
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
                @foreach ($galleries as $key => $galery)
                    <div class="galery-cards hover:transform hover:scale-110 transition duration-500">
                        <button data-modal-target={{ $galery }} data-modal-toggle={{ $galery }}>
                            <div class="relative w-80">
                                <img class="object-cover" src="{{ $galery }}" alt={{ $galery }}>
                            </div>
                        </button>
                    </div>
                    <div id={{ $galery }} tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow flex justify-center items-center p-10">
                                <img class="object-cover" src="{{ $galery }}" alt={{ $galery }}>
                            </div>
                        </div>
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
    <div class="flex flex-wrap-reverse w-full justify-between justify-items-center items-end place-items-center px-12 py-16">
        <div class="w-full md:w-5/12 pt-12 md:pt-0 flex flex-col gap-x-6 items-center">
            <div class="w-full pb-6 md:pb-12 md:pt-12 text-center md:text-left">
                <p class="md:text-6xl sm:text-5xl text-4xl erica pb-2 md:pb-6">{{ $project['name']}}</p>
                <p class="md:text-2xl sm:text-xl text-lg erica">{{ $project['nim'] }}</p>
            </div>
            {{-- Contact Card --}}
            <div class="grid grid-cols-2 rounded-lg bg-[#303030] p-5 w-full gap-x-6 min-[541px]:w-3/4 md:w-full">
                <div>
                    <p class="min-[1198px]:text-4xl md:text-2xl min-[404px]:text-3xl text-2xl hebrew font-bold pb-1 md:pb-3">Contact: </p>
                    <p class="min-[1198px]:text-2xl md:text-lg min-[404px]:text-xl text-lg overflow-wrap break-words hebrew font-bold">{{ $project['ig'] }}</p>
                    <p class="min-[1198px]:text-2xl md:text-lg min-[404px]:text-xl text-lg overflow-wrap break-words hebrew font-bold">{{ $project['wa']}}</p>
                </div>
                <div>
                    <p class="min-[1198px]:text-4xl min-[404px]:text-3xl text-2xl hebrew font-bold pb-3">Scan / click here!</p>
                    <a href={{ $project['qrlink'] }} target="_blank">
                        <img src="/projectqr/{{ $project['nim'] }}.png" alt="{{ $project['title'] }}">
                    </a>
                </div>
            </div>
        </div>
        <div class="w-96 md:w-7/12 h-full m-auto flex justify-center items-center">
            <img src="/projectprofile/{{ $project['nim']}}.png" alt="{{ $project['name'] }}" class="max-w-full max-h-full">
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('backButton').addEventListener('click', function() {
            history.back();
        });

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
            document.getElementById('container').scrollLeft += 10;
        }, 10);
        }

        function handleScrollLeft() {
        scrollInterval = setInterval(() => {
            document.getElementById('container').scrollLeft -= 10;
        }, 10);
        }

        function clearScrollInterval() {
        clearInterval(scrollInterval);
        }
    });
</script>

@endsection