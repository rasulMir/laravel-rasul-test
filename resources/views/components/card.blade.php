@props([
    'id' => 0,
    'text' => 'Нет текста',
    'image_path' => 'default-content-img.png',
    'likes' => 0,
    'dislikes' => 0,
])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div>
        <img class="rounded-t-lg block min-w-full" src="{{ asset($image_path) }}" alt="" />
    </div>
    <div class="p-5">

        <p class="mb-3 font-medium text-white">
            {{ __($text) }}
        </p>
        <x-card-bottom>

            <x-rate-button id="{{ $id }}">
                {{ __($likes) }}
            </x-rate-button>
            <x-rate-button type="dislike" id="{{ $id }}">
                {{ __($dislikes) }}
            </x-rate-button>

        </x-card-bottom>

    </div>
</div>
