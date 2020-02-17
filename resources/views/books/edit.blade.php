@extends('layouts.app')

@section('title', 'Add Books')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @card
                @slot('header')
                    Book
                @endslot
                @slot('body')
                    <form action="{{ route('book.update', $book->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Book Title" value="{{ $book->name }}" readonly>
                            @error('title')
                                <font class="error">{{ $message }}</font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control" readonly>
                                <option></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ ($category->id == $book->book_category_id) ? 'selected' : 'disabled' }}
                                        >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <font class="error">{{ $message }}</font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Synopsis</label>
                            <textarea name="synopsis" class="form-control" placeholder="Insert Book Synopsis" readonly>{{ $book->synopsis }}</textarea>
                            @error('synopsis')
                                <font class="error">{{ $message }}</font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" name="author" class="form-control" placeholder="Enter Book Author" value="{{ $book->author }}">
                            @error('author')
                                <font class="error">{{ $message }}</font>
                            @enderror
                        </div>
                        <div style="text-align:center;">
                            <a href="{{ route('book.index') }}" class="btn btn-danger">Cancel</a>
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    </form>
                @endslot
            @endcard
        </div>
    </div>
</div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
@endpush
