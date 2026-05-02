<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Author;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_author_can_be_created()
    {
        $response = $this->post('/authors', [
            'name' => 'Jane',
            'surname' => 'Doe',
            'birthdate' => '1990-01-01'
        ]);

        // Check database
        $this->assertDatabaseHas('authors', [
            'name' => 'Jane',
            'surname' => 'Doe'
        ]);

        // Check redirect
        $response->assertRedirect('/authors');

        // Check status code
        $response->assertStatus(302);
    }
}