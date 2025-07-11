<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title',
        'user_id',
        'body',
        'slug',
        'img',
        'status',
        'view_count',
        'category_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
{
    return $this->belongsToMany(Tag::class, 'post_tags');
}

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


}
