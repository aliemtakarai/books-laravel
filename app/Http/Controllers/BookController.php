<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\BookCategory;
use App\Models\Book;
use DataTables;

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

    /**
     * Get Books with yajra datatable
     */
    public function getBooks(Request $request)
    {
        $books = Book::with('category');
        return DataTables::of($books)
              ->addIndexColumn()
              ->filter(function($query) use ($request){
                  if ($request->title) {
                      $query->where('name', 'like', '%'.$request->title.'%');
                  }
                  if ($request->author) {
                    $query->where('author', 'like', '%'.$request->author.'%');
                  }
              })
              ->addColumn('action', function($books){
                return '<a href="'.route('book.edit', $books->id).'" class="btn btn-warning" title="Change Author Name"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
              })
              ->make(true);
    }

    /**
     * Change author name page
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = BookCategory::all();

        return view('books.edit', compact('book','categories'));
    }

    /**
     * Change author name page function
     */
    public function update(BookRequest $request, $id)
    {
        try {
            $book           = Book::find($id);
            $book->author   = ucwords($request->author);
            $book->save();

            return redirect()->route('book.index')->with(['success'=>'Success Update Author']);
        } catch (\Throwable $th) {
            return redirect()->route('book.index')->with(['error'=>$th->getMessage()]);
        }
    }
}
