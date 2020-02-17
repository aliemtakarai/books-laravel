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
                    <a href="{{ route('book.create') }}" class="btn btn-primary">Add Data</a>
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
@push('style')
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}">
@endpush
@push('script')
    <script src="{{ asset('/js/toastr.min.js') }}"></script>
    @if ($message = Session::get('success'))
        <script>
            toastr.success('{{ $message }}', {timeOut: 3000})
        </script>
    @endif
@endpush
