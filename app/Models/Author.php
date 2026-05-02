<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use hasFactory;

    protected $fillable = [
        'name',
        'surname',
        'birthdate'
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function fullName(){
        return $this->name . ' ' . $this->surname;
    }
}
