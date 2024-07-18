<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
    'category_id',
    'author_id',
    'title',
    'excerpt',
    'img_thumbnail',
    'img_cover',
    'content',
    'is_active',
    'is_trending',
    'view_count',
    'status',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_trending' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
