<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            ['name' => 'J.K. Rowling', 'email' => 'jk@example.com'],
            ['name' => 'George R.R. Martin', 'email' => 'george@example.com'],
            ['name' => 'J.R.R. Tolkien', 'email' => 'jrr@example.com'],
        ];

        foreach ($authors as $authorData) {
            // This creates the author
            $author = Author::create($authorData);

            // This creates the 2 required books per author
            Book::create([
                'title' => 'Book One by ' . $author->name,
                'description' => 'A classic tale.',
                'author_id' => $author->id
            ]);

            Book::create([
                'title' => 'Book Two by ' . $author->name,
                'description' => 'The journey continues.',
                'author_id' => $author->id
            ]);
        }
    }
}
