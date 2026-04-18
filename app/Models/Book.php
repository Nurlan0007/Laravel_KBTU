<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'short_title', 'year', 'author_id'];

    // 2️⃣ Define Relationship
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
