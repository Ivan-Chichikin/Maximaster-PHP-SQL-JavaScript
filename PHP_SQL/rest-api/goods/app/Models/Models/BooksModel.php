<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksModel extends Model
{
    protected $table = "books_list"; // отключаем поля по умолчанию laravel 

    public $timestamps = false;

    protected $fillable = [
        "id",
        "title",
        "author"
    ];
}
