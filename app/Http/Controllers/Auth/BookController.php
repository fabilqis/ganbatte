<?php
   
namespace App\Http\Controllers\Auth;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\BaseController as BaseController;
use App\Models\Book;
use Validator;
use App\Http\Resources\BookResource;
use Illuminate\Http\JsonResponse;
   
class BookController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
    
        // return $this->sendResponse(BookResource::collection($book), 'Book retrieved successfully.');
        return($book);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
   
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'book_title' => 'required',
            'detail' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        // $book = Book::create($input);
   
        // return $this->sendResponse(new BookResource($book), 'Book created successfully.');

        $book = new Book;
        $book->book_title = $request->book_title;
        $book->detail = $request->detail;
        $book->save();
        return redirect('/dashboard')->with('status', 'Book Post Has Been inserted');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $book = Book::find($id);
  
        if (is_null($book)) {
            return $this->sendError('Book not found.');
        }
   
        return $this->sendResponse(new BookResource($book), 'Book retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): JsonResponse
    {
   
        $book = Book::find($id);
        $book->update($request->all());

        return $this->sendResponse(new BookResource($book), 'Book update successfully.');

    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book): JsonResponse
    {
        $book->delete();
   
        return $this->sendResponse([], 'Book deleted successfully.');
    }
}