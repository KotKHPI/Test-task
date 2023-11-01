<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Author::factory(50)->create();
        Book::factory(50)->create();

        $author = Author::inRandomOrder()->get();
        $books = Book::all();

        for ($i = 0; $i <= 2; $i++) {
            foreach ($books as $book) {
                $book->authors()->attach($author->random()->id);
            }
        }
    }
}
