@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 p-5">
            <img class="rounded-circle" src="https://winaero.com/blog/wp-content/uploads/2019/09/Chrome-Incognito-Mode-Icon-256.png" style="height: 150px" alt="" srcset="">
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add New Post</a>
            </div>
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            <div class="d-flex">
                {{-- Spacing - Padding end or right --}}
                <div class="pe-3"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pe-3"><strong>23k</strong> followers</div>
                <div class="pe-3"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach ($user->posts as $posts)
        <div class="col-4 pb-4">
            <a href="/p/{{ $posts->id }}">
                <img src="/storage/{{ $posts->image }}" alt="" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
