<?php

namespace Tests\Feature;

use App\Enums\BookStatus;
use App\Models\Author;
use Tests\TestCase;

class BookCreationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->login();
    }

    public function testCreateBook(): void
    {
        /** @var Author $author */
        $author = Author::factory()->createOne();

        $data = [
            'title' => 'test book',
            'page_number' => 111,
            'author_id' => $author->id,
            'status' => BookStatus::Draft->value,
        ];

        $response = $this
            ->withHeader('Accept', 'application/json')
            ->post(route('api.books.store'), $data);

        $response->assertCreated();

        $this->assertDatabaseHas('books', $data);
    }
}
