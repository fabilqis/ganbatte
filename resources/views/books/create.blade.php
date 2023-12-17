@extends('books.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Book
                </div>
                <div class="float-end">
                    <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('books.store') }}" method="post">
                    @csrf

                    {{-- <div class="mb-3 row">
                        <label for="id" class="col-md-4 col-form-label text-md-end text-start">ID</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ old('id') }}">
                            @if ($errors->has('id'))
                                <span class="text-danger">{{ $errors->first('id') }}</span>
                            @endif
                        </div>
                    </div> --}}

                    <div class="mb-3 row">
                        <label for="book_title" class="col-md-4 col-form-label text-md-end text-start">Book Title</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('book_title') is-invalid @enderror" id="book_title" name="book_title" value="{{ old('book_title') }}">
                            @if ($errors->has('book_title'))
                                <span class="text-danger">{{ $errors->first('book_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="detail" class="col-md-4 col-form-label text-md-end text-start">Detail</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" value="{{ old('detail') }}">
                            @if ($errors->has('detail'))
                                <span class="text-danger">{{ $errors->first('detail') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Book">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>

    
@endsection