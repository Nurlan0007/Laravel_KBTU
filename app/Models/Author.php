<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // Added Author model with fillers
    protected $fillable = ['name', 'email'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
