<?php
namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_correctly_stores_and_retrieves_short_title()
    {
        // Arrange
        $author = Author::create([
            'name' => 'J.R.R.',
            'surname' => 'Tolkien',
            'birthdate' => '1892-01-03'
        ]);

        // Act: Store the short title
        $book = Book::create([
            'title' => 'The Lord of the Rings: The Fellowship of the Ring',
            'short_title' => 'Fellowship of the Ring',
            'year' => 1954,
            'author_id' => $author->id,
        ]);

        // Assert: Retrieve and verify
        $retrievedBook = Book::find($book->id);

        $this->assertDatabaseHas('books', [
            'short_title' => 'Fellowship of the Ring'
        ]);
        $this->assertEquals('Fellowship of the Ring', $retrievedBook->short_title);
    }
}
