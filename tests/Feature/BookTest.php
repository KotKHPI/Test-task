<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use function Symfony\Component\String\b;

class BookTest extends TestCase
{
    public function test_access_to_page_books() {
        $response = $this->get('/books');

        $response->assertStatus(200);
    }

    public function test_create_one_book() {
        $book = [
            'name' => fake()->jobTitle(),
            'description' => fake()->sentences(3, true),
            'image' => UploadedFile::fake()->image('test-image.jpg'),
            'date' => fake()->date('Y-m-d', 'now'),
            'authors' => ['author-1']
        ];

        $response = $this->post('books', $book)->assertStatus(302);

        $this->assertEquals(session('success'), 'Book was created!');

        $response = $this->get('/books');

        $this->assertDatabaseHas('books', [
            'name' => $book['name'],
            'description' => $book['description'],
//            'image' => $book['image'],
            'dateOfPublished' => $book['date'],
        ]);
    }
}
