<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Enums\BookStatus;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected User $currentUser;

    protected function signIn(): void
    {
        $this->currentUser = User::factory()
            ->createOne([
                'password' => Hash::make('password')
            ]);

        Sanctum::actingAs($this->currentUser);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->signIn();
    }

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/api/books');

        $response->assertOk();
        $response->assertStatus(200);
    }

    public function test_create_book(): void
    {
//        $user = User::factory()->create();
        /** @var Author $author */
        $author = Author::factory()->create();

        $response = $this
            ->withHeaders([
                'Accept' => 'application/json'
            ])
            ->post('/api/books', [
                'title' => 'test book',
                'page_number' => 111,
                'author_id' => $author->id,
                'status' => BookStatus::Draft->value,
            ]);

        $response->assertCreated();

        $this->assertDatabaseHas('books', ['title' => 'test book']);
    }
}
