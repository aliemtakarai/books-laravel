@extends('layouts.app')

@section('title', 'Book Data')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="filter">
                @card
                    @slot('header')
                        Filter
                    @endslot
                    @slot('body')
                        <form action="" id="search">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Title</label>
                                    <input type="text" class="form-control" placeholder="Book Title" id="title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Author</label>
                                    <input type="text" class="form-control" placeholder="Author Name" id="author">
                                </div>
                            </div>
                            <div class="center">
                                <input type="submit" class="btn btn-success" value="Search">
                            </div>
                        </form>
                    @endslot
                @endcard
            </div>
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@push('script')
    <script src="{{ asset('/js/toastr.min.js') }}"></script>
    @if ($message = Session::get('success'))
        <script>
            toastr.success('{{ $message }}', {timeOut: 3000})
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            toastr.error('{{ $message }}', {timeOut: 3000})
        </script>
    @endif
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        var table = $('#data').DataTable({
                        serverSide: true,
                        searching: false,
                        ajax: {
                            url : '{{ route("book.getBooks") }}',
                            data: function (d) {
                                d.title = $('#title').val();
                                d.author = $('#author').val();
                            }
                        },
                        columns: [
                            {data: 'DT_RowIndex', name: 'id', orderable: false},
                            {data: 'name', name: 'name'},
                            {data: 'category.name', name: 'category', orderable: false},
                            {data: 'synopsis', name: 'synopsis', orderable: false},
                            {data: 'author', name: 'author'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });

        $('#search').on('submit', function(e){
            table.draw()
            e.preventDefault()
        })
    </script>
@endpush
