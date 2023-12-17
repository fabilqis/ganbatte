@extends('books.layouts')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Book Information
                </div>
                <div class="float-end">
                    <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="id" class="col-md-4 col-form-label text-md-end text-start"><strong>id:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $book->id }}
                    </div>
                </div>

                    <div class="row">
                        <label for="book_title" class="col-md-4 col-form-label text-md-end text-start"><strong>Book Title:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $book->book_title }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="detail" class="col-md-4 col-form-label text-md-end text-start"><strong>Detail:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $book->detail }}
                        </div>
                    </div>
            </div>
        </div>
    </div>    
</div>
    
@endsection