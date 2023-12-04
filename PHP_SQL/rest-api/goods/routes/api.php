<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// БД books создал на локальном сервере
// http://localhost:8888/phpMyAdmin5/index.php?route=/database/structure&db=books
// Столбцы таблицы books_list: id, title, author.

// Операции проводил в Postman

// Все товары
// http://127.0.0.1:8000/api/products
Route::get('/products', 'App\Http\Controllers\Books\BooksController@books');

// Товар по id
// http://127.0.0.1:8000/api/products/1
Route::get('/products/{id}', 'App\Http\Controllers\Books\BooksController@booksById');

// Добавление нового товара
// http://127.0.0.1:8000/api/products?title=Собачье сердце&author=Булгаков
Route::post('/products', 'App\Http\Controllers\Books\BooksController@booksSave');

// Редактирование товара
// http://127.0.0.1:8000/api/products/4?title=Роковые яйца
Route::put('/products/{book}', 'App\Http\Controllers\Books\BooksController@booksEdit');

// Удаление товара
// http://127.0.0.1:8000/api/products/4
Route::delete('/products/{book}', 'App\Http\Controllers\Books\BooksController@booksDelete');