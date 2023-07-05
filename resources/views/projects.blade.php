@extends('components.layout')

@section('color', '#000000')

@section('bg', ($category ? "/categorybg/".$category['img'].".png" : "bg-home.png"))

@section('content')

<div class="text-center pt-24">
    <div class="py-4">
        <button id="backButton" class="text-white text-lg hebrew font-bold py-2 px-6 bg-gradient-to-r from-[#000000] fixed top-20 left-0 z-50">< Back</button>
    </div>
    <p class="text-white text-6xl erica pb-12">{{ $category ? $category['name'] : 'All' }}</p>
    <div class='grid gap-y-8 gap-x-8 sm:grid-cols-2 lg:grid-cols-3 grid-cols-1 px-12 py-8 place-items-center'>
        @foreach($projects as $project)
            <x-projectcard :project="$project" style="shadow-md w-[330px] sm:w-[275px] min-[740px]:w-[300px] min-[835px]:w-[350px] min-[975px]:w-[400px] lg:w-[300px] min-[1198px]:w-[350px] min-[1388px]:w-[400px] min-[1578px]:w-[450px]" />
        @endforeach 
    </div>
    <div class="my-12 grid place-items-center w-full">
        {{ $projects->links('vendor.pagination.tailwind') }}
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('backButton').addEventListener('click', function() {
            history.back();
        });
    });
</script>

@endsection