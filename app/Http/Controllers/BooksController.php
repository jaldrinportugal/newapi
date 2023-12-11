<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    //use to search all books
    public function index(){
        $book = Books::all();
        return response($book);
    }

    // used to serach books by id
    public function show($id){
        $book = Books::find($id);
        return response($book);
    }

    // used to store a books
    public function store(Request $request)
    {
        $book=new Books();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_at = $request->published_at;

        $book->save();
        return response([
            "message"=>"Books added in database!!"
        ]);
    }

    // used to update books by id
    public function update(Request $request)
    {
        $book = Books::find($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_at = $request->published_at;

        $book->update();
        return response([
            "message"=>"Updated Succesfully"
        ]);
    }

    // used to delete books by id
    public function destroy($id){
        $user = Books::find($id);
        if ($user == null){
            return response([
                "message"=>"Record not found"
            ],404);
        }
        else{
            $user->delete();
            return response([
                "message"=>"Deleted succesfully!"
            ],200);
        }
    }
}
