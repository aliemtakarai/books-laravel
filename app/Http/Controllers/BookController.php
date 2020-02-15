<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Book index page
     */
    public function index()
    {
        return view('books.index');
    }
}
