<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Author;
use App\Book;

class BookController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function storeAuthor(Request $request){
        $this->validate($request, [
            'author' => 'required',
        ]);
		
        $author = new Author;
        $author->author = $request->author;
        $author->save();
        return response()->json([
            'author'=>$author
        ],200);
			

    }

    public function storeBook(Request $request){
        $this->validate($request, [
            'isbn' => 'required',
            'book_name' => 'required',
            'author' => 'required',

        ]);
		
        $book = new Book;
        $book->isbn = $request->isbn;
        $book->book_name = $request->book_name;
        $book->author = $request->author;
        $book->save();
        return response()->json([
            'book'=>$book
        ],200);
			

    }

    public function index()
    {
        // $search = $request->get('q');

        $test = Book::all();
        return response()->json([
            'test'=>$test,
            'message'=>'success'
        ],200);
    }



}
