@extends('layouts.app')

@section('title', 'Book Data')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @card
                @slot('header')
                    Book Data
                @endslot
                @slot('body')
                    <a href="" class="btn btn-primary">Add Data</a>
                    <div class="spacing">
                        @table
                            @slot('header')
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Synopsis</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            @endslot
                            @slot('body')

                            @endslot
                        @endtable
                    </div>
                @endslot
            @endcard
        </div>
    </div>
</div>
@endsection
