<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Book::factory(5)->create();
    }

    public function testBooksIndex(): void
    {
        $response = $this->get(route('api.books.index'));

        $response->assertOk();
        $this->assertJson($response->content());
    }

    public function testBooksIndexNotEmpty(): void
    {
        $response = $this->get(route('api.books.index'));

        $response->assertOk();

        $data = $response->json();

        $this->assertNotEmpty($data);

        $response->assertJsonStructure([
            '*' => [
                'id', 'title', 'author', 'annotation'
            ]
        ]);
    }
}
