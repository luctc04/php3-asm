<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
    'category_id',
    'author_id',
    'title',
    'slug',
    'sku',
    'excerpt',
    'img_thumbnail',
    'content',
    'is_active',
    'is_trending',
    'view_count',
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

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d/m/Y H:i'),
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d/m/Y H:i'),
        );
    }

    
}
