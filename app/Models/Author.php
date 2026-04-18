<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    // Added Author model with fillers
    use HasFactory;

    protected $fillable = ['name', 'surname','birthdate'];


    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function fullName():string
    {
        return"{$this->name} {$this->surname}";

    }
}
