@extends('layouts.body')

@section('title', 'Публикаций')

@section('body.content')

    <x-alert />
    <div class="text-base font-semibold my-5">
        @if ($contents->count())
            {{ __('Все публикаций') }}
        @else
            {{ __('Публикаций нет!') }}
        @endif

    </div>
    @if ($contents->count())
        <x-grid>
            @foreach ($contents as $key => $value)
                <x-card :id="$value['id']" :text="$value['text']" :image_path="$value['image_path']" :likes="$value['likes']" :dislikes="$value['dislikes']" />
            @endforeach
        </x-grid>
    @endif



@endsection
