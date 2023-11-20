@props([
    'id' => 0,
    'type' => 'like',
])

@php($isLike = $type === 'like')

<a href="{{ route('content.' . $type, $id) }}"
    class="bg-transparent inline-flex items-center px-3 py-2 text-sm font-medium {{ $isLike ? 'hover:bg-blue-500' : 'hover:bg-red-500' }} text-white font-semibold hover:text-white py-2 px-4 border border-white-500 hover:border-transparent rounded">
    {{ $slot }}
    @if ($isLike)
        <svg class="w-3 h-3 text-gray-800 dark:text-white ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 18 18">
            <path
                d="M3 7H1a1 1 0 0 0-1 1v8a2 2 0 0 0 4 0V8a1 1 0 0 0-1-1Zm12.954 0H12l1.558-4.5a1.778 1.778 0 0 0-3.331-1.06A24.859 24.859 0 0 1 6 6.8v9.586h.114C8.223 16.969 11.015 18 13.6 18c1.4 0 1.592-.526 1.88-1.317l2.354-7A2 2 0 0 0 15.954 7Z" />
        </svg>
    @else
        <svg class="w-3 h-3 text-gray-800 dark:text-white ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 18 18">
            <path
                d="M11.955 2.117h-.114C9.732 1.535 6.941.5 4.356.5c-1.4 0-1.592.526-1.879 1.316l-2.355 7A2 2 0 0 0 2 11.5h3.956L4.4 16a1.779 1.779 0 0 0 3.332 1.061 24.8 24.8 0 0 1 4.226-5.36l-.003-9.584ZM15 11h2a1 1 0 0 0 1-1V2a2 2 0 1 0-4 0v8a1 1 0 0 0 1 1Z" />
        </svg>
    @endif
</a>
