@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-6 offset-3">
                <a href="/p/{{ $post->user->id}}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        </div>

        <div class="row py-4">
            <div class="col-6 offset-3">
                <p>
                    <span class="fw-bold">
                        <a href="/profile/{{ $post->user->id }}" class="text-dark link-underline link-underline-opacity-0">
                            {{ $post->user->username }}
                        </a>
                    </span> {{ $post->caption }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
@endsection