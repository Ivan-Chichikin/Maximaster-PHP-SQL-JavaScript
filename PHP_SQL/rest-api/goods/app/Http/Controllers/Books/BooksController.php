<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Models\BooksModel;

class BooksController extends Controller
{
    public function books(){
        return response()->json(BooksModel::get(), 200);
    }

    public function booksById($id){
        return response()->json(BooksModel::find($id), 200);
    }

    public function booksSave(Request $req){
        $book = BooksModel::create($req->all());
        return response()->json($book, 201);
    }
    
    public function booksEdit(Request $req, BooksModel $book){
        $book->update($req->all());
        return response()->json($book, 200);
    }
    
    public function booksDelete(Request $req, BooksModel $book){
        $book->delete();
        return response()->json('', 204);
    }
} 