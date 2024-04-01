@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </div>
            <div class="col-4">
                {{-- <h3>{{ $post->user->username }}</h3> --}}
                <div class="d-flex align-items-center">
                    <div>
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" alt="" srcset="" style="max-width: 50px">
                    </div>
                    <div class="ps-3">
                        <div class="fw-bold">
                            <a href="/profile/{{ $post->user->id }}" class="text-dark link-underline link-underline-opacity-0">
                                {{ $post->user->username }}
                            </a>
                            <a href="http://" class="ps-3">Follow</a>
                        </div>
                    </div>
                </div>
                
                <hr>
                <p>
                    <span class="fw-bold">
                        <a href="/profile/{{ $post->user->id }}" class="text-dark link-underline link-underline-opacity-0">
                            {{ $post->user->username }}
                        </a>
                    </span> {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
@endsection