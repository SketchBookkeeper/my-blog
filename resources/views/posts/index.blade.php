@extends('layouts.app')

@section('content')
    @foreach($posts as $post)

        @component('components.post_card')
            @slot('slug')
                {{ $post->slug }}
            @endslot

            @slot('title')
                {{ $post->title }}
            @endslot

            @slot('date')
                {{-- Carbon required here because PostsController::index is using the DB facade in the query --}}
                {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->toFormattedDateString() }}
            @endslot

            {{ $post->excerpt }}
        @endcomponent

    @endforeach
@endsection
