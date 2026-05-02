<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Author;

class AuthorTest extends TestCase
{
    public function test_full_name_method_returns_correct_value()
    {
        $author = new Author([
            'name' =>'John',
            'surname'=>'Smith'
        ]);
        $this->assertEquals(
            'John Smith',
            $author->fullName()
        );
    }
}
