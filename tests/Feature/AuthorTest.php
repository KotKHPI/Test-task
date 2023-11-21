<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    public function test_access_to_page_authors() {
        $response = $this->get('/authors');

        $response->assertStatus(200);
    }

    public function test_create_one_author() {
        $author = [
            'first_name' => fake()->firstName(),
            'second_name' => fake()->lastName(),
            'surname' => fake()->lastName()
        ];

        $response = $this->post('authors', $author)->assertStatus(302);

        $this->assertEquals(session('success'), 'Author was created!');

        $response = $this->get('/authors');

        $this->assertDatabaseHas('authors', [
            'first_name' => $author['first_name'],
            'second_name' => $author['second_name'],
            'surname' => $author['surname']
        ]);
    }

    public function test_search_by_name() {
        $user1 = $this->author();
        $user2 = $this->author();
        $user3 = $this->author();

        $name1 = $user1->first_name;
        $res = Author::when($name1, fn($query, $name1) => $query->searchByName($name1))->get('first_name');

        $this->assertEquals($name1, $res[0]->first_name);
    }
}
