<?php
   
namespace App\Http\Controllers\Auth;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\BaseController as BaseController;
use App\Models\Book;
use Validator;
use ErrorException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use League\CommonMark\Node\Query;
   
class BookController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $book = Book::all();
            return response()->json($book, Response::HTTP_OK);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
    public function show($id)
    {
        try {
            $book = Book::findOrFail($id);
            $response = [
                $book
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return redirect('/dashboard')->with('status', 'Book Post Has Been updated');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
        Book::findOrFail($id)->delete();
        return response()->json(['success' => 'Book deleted successfully.']);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'No result'
        ], Response::HTTP_FORBIDDEN);
    }
    }
}