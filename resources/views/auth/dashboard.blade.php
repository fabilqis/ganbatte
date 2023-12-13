@extends('auth.layouts')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>       
                @endif 
            </div>
            <div class="card-body">
                <div class="alert alert-warning">
                    <div class="container mt-4">
                        @if(session('status'))
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                        @endif
                        <div class="card">
                          <div class="card-header text-center font-weight-bold">
                            Add Book
                          </div>
                          <div class="card-body">
                            <form name="add-book-form" id="add-book-form" method="post" action="{{url('store_form')}}">
                             @csrf
                              <div class="form-group">
                                <label for="bookTitle">Book Title</label>
                                <input type="text" id="book_title" name="book_title" class="form-control" required="">
                              </div>
                              <div class="form-group">
                                <label for="detail">Detail</label>
                                <textarea name="detail" class="form-control" required=""></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
    
@endsection