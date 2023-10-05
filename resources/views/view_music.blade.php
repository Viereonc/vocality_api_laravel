<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style_music.css') }}">
    @vite('resources/css/app.css')
    <title>{{ $album->album_name }}</title>
</head>
<body class="flex justify-between font-poppins text-white">
    <div class="background"></div>
    <header class="sm:pb-14">
        <div class="select-label sm:mt-10">
            <h2 class="sm:ml-7 sm:mr-160 sm:py-6 sm:text-4xl font-bold">SELECT SONG</h2>
        </div>
        <div class="album-info-label flex sm:mt-3 sm:py-2.5 sm:text-1xl">
            <h4 class="sm:ml-7 sm:mr-7">Album</h4>
            <img src="{{ asset('assets/icons/icon_arrow.svg') }}" alt="" width="17" class="mr-7">
            <h4 class="sm:mr-160">{{ $album->album_name }}</h4>
        </div>
        <div class="flex ml-7 mt-6 font-semibold">
            <h1 class="text-4xl">001</h1>
            <h4 class="sm:mt-2 sm:text-2xl">/{{ $album->song()->count() }}</h4>
        </div>
        <div class="flex sm:ml-32 sm:mt-2.5">
            <img src="https://cdn.donmai.us/original/08/6b/086bbce93575fe672bf737cc901c106b.png" alt="{{ $album->song[0]->song_name }}" width="393px">
        </div>
    </header>
    <main class="sm:mt-10">
        <div class="flex">
            <h2 class="filter sm:w-screen font-semibold sm:text-3xl py-4">Filter</h2>
            <div class=""></div>
        </div>
        @for ($i = 0; $i < $album->song()->count(); $i++)
            <div class="music-card flex sm:ml-12">
                <img src="{{ $album->song[$i]->song_image_url ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu_XKWjKs5sGXGV7LcGHOKaDy3-cKt2zFaRw&usqp=CAU' }}" alt="cover music {{ $album->song[0]->song_name }}" width="100" class="sm:m-3">
                <div class="sm:m-4">
                    <h4 class="sm:text-2xl font-semibold">{{ $album->song[$i]->song_name }}</h4>
                    <h5 class="sm:mt-4">{{ $album->artist->artist_name }}</h5>
                    <h5>{{ floor($album->song[0]->song_duration / 60) }}:{{ $album->song[$i]->song_duration % 60 }}</h5>
                </div>
            </div>
        @endfor
    </main>
</body>
</html>
