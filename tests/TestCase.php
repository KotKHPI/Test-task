<?php

namespace Tests;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function author() : Author {
        return Author::factory()->create();
    }

    public function book() : Book {
        return Book::factory()->create();
    }

}
