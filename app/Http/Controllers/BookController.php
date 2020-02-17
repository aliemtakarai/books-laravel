<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\BookCategory;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Book index page
     */
    public function index()
    {
        return view('books.index');
    }

    /**
     * Book create page
     */
    public function create()
    {
        $categories = BookCategory::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store Book Function
     */
    public function store(BookRequest $request)
    {
        try {
            $book = new Book;
            $book->name             = ucwords($request->title);
            $book->book_category_id = $request->category;
            $book->synopsis         = ucfirst($request->synopsis);
            $book->author           = ucwords($request->author);
            $book->save();

            return redirect()->route('book.index')->with(['success'=>'Success Add Book']);
        } catch (\Throwable $th) {
            return redirect()->route('book.index')->with(['error'=>$th->getMessage()]);
        }
    }
}
