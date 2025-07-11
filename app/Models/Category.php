<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'is_active'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
