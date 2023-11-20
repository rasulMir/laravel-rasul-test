@extends('layouts.body')

@section('title', 'Создать публикацию')

@section('body.content')

    <div class="text-base font-semibold py-3">
        Создать публикацию
    </div>

    <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="text" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Ваш
                текст</label>
            <input type="text" name="text" id="text"
                class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400"
                placeholder="Текст публикаций" value="{{ old('text') }}">
            <x-error name='text' />
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image_path">
                Загрузите изображение
            </label>
            <input
                type="file" name="image_path" id="image_path"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="user_avatar_help">
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">
                {{ __('Изображение не должно превышать 8мб') }}
            </div>
            <x-error name='image_path' />

        </div>
        <button type="submit"
            class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Сохранить') }}</button>
    </form>

@endsection
