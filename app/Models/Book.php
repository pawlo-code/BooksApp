<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'author', 'published_year'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_books')->withPivot('is_read')->withTimestamps();
    }
}
