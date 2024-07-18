<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'avatar'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
