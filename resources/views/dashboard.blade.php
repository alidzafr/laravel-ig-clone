@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 p-5">
            <img class="rounded-circle" src="https://winaero.com/blog/wp-content/uploads/2019/09/Chrome-Incognito-Mode-Icon-256.png" style="height: 150px" alt="" srcset="">
        </div>
        <div class="col-9">
            <div><h1>freecodecamp</h1></div>
            <div class="d-flex">
                {{-- Spacing - Padding end or right --}}
                <div class="pe-3"><strong>153</strong> posts</div>
                <div class="pe-3"><strong>23k</strong> followers</div>
                <div class="pe-3"><strong>212</strong> following</div>
            </div>
            <div class="pt-4 fw-bold">freeCodeCamp.org</div>
            <div>we're global community of million of people learning to code together</div>
            <div><a href="#">www.freecodecamp.org</a></div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-4">
            <img src="https://cdn-cooko.nitrocdn.com/dlaHYojSdUILBDieEoKhuePRMJCdRncv/assets/static/optimized/rev-7800a50/www.apertureadventure.com/wp-content/uploads/2022/12/a70f0d10e86968d32619793693c30ff9.layers-of-rolling-sand-at-white-sands.jpg" alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://cdn-cooko.nitrocdn.com/dlaHYojSdUILBDieEoKhuePRMJCdRncv/assets/static/optimized/rev-7800a50/www.apertureadventure.com/wp-content/uploads/2022/12/a70f0d10e86968d32619793693c30ff9.layers-of-rolling-sand-at-white-sands.jpg" alt="" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://cdn-cooko.nitrocdn.com/dlaHYojSdUILBDieEoKhuePRMJCdRncv/assets/static/optimized/rev-7800a50/www.apertureadventure.com/wp-content/uploads/2022/12/a70f0d10e86968d32619793693c30ff9.layers-of-rolling-sand-at-white-sands.jpg" alt="" class="w-100">
        </div>
    </div>
</div>
@endsection
