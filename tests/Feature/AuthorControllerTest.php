<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Author;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_new_author_via_post_request()
    {
        // Arrange
        $payload = [
            'name' => 'Agatha',
            'surname' => 'Christie',
            'birthdate' => '1890-09-15',
        ];

        // Act: Make the POST request
        $response = $this->post(route('authors.store'), $payload);

        // Assert: Ensure correct redirect behavior & HTTP status
        $response->assertStatus(302); // 302 is the status code for a redirect
        $response->assertRedirect('/authors');

        // Assert: Verify database storage
        $this->assertDatabaseHas('authors', [
            'name' => 'Agatha',
            'surname' => 'Christie',
        ]);
    }
}
