<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::find($user);
        
        return view('dashboard', [
            'user' => $user, //variable yg akan dipakai di blade php
        ]);
    }
}
