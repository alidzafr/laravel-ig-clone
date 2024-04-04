<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\ImageManagerStatic as Image;


class ProfilesController extends Controller
{
    public function index(\App\Models\User $user)
    {
        // If auth user has follows this user then parse bool true
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        $postCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        });

        $followerCount = Cache::remember('count.followers.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('count.following.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->following->count();
        });
        // dd($follows);
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followerCount', 'followingCount')); //variable yg akan dipakai di blade php
    }
    
    public function edit(\App\Models\User $user)
    {
        // hanya authorize user saja yg bisa masuk kedalam page edit
        // ProfilePolicy
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }
    
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);
        
        // If user replacing image
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            
            // crop & resize image
            // configure with favored image driver (gd by default)
            Image::configure(['driver' => 'imagick']);
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [] //if user hasn't replace image, use an empty array instead
        ));

        return redirect("/profile/{$user->id}");
    }
}
