<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;


class Profile extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    protected $guarded = [];

    public function profileImage() {
        $imagePath = ($this->image) ? $this->image : 'profile/0411a4961f3724f15df8f6a52f75ce44.jpg';
        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
