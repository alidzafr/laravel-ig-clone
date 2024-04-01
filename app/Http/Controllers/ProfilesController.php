<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class ProfilesController extends Controller
{
    public function index(\App\Models\User $user)
    {
        // $user = User::findOrFail($user); //tidak digunakan karena sudah menjabarkan model user pada function
        
        return view('profiles.index', [
            'user' => $user, //variable yg akan dipakai di blade php
        ]);
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
