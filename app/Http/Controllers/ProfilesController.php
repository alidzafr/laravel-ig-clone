<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('profiles.edit', compact('user'));
    }
}
