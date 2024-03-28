<?php

namespace App\Http\Controllers;

// require 'vendor/autoload.php';

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('posts.create');
    }

    public function store() 
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        // configure with favored image driver (gd by default)
        Image::configure(['driver' => 'imagick']);
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        // \App\Models\Post::create($data);

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        // dd(request()->all());
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
        // $post = Post::findorFail($post);

        return view('posts.show', compact('post'));
    }
}
