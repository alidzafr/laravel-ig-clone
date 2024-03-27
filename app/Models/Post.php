<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = []; // to tell laravel is ok don't guard anything

    public function user() {
        return $this->belongsTo(User::class);
    }
}
