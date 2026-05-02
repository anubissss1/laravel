<?php

namespace Tests\Unit;

use App\Models\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function test_short_title_is_stored_correctly(){
        $book = new Book([
            'short_title'=>'HP1'
        ]);

    $this->assertEquals(
            'HP1',
            $book->short_title
        );
    }
}
