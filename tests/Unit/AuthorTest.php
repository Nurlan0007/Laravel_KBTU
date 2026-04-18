<?php

namespace App\Models\Models;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;

class Author extends TestCase
{
    public function test_it_returns_full_name()
    {
        //Arrange
        $author = new Author([
            "name" => "John",
            "surname" => "Doe"
        ]);
        //Act % Assert
        $this->assertEquals('John Doe', $author->fullName());
    }
}

