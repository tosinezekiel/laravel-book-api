<?php

namespace App\Http\Controllers;
use App\Author;
use App\AuthorBook;
use App\User;
use App\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
Use App\Http\Resources\BookResourceCollection;

class BookController extends Controller
{
	public function index(Request $request) : BookResourceCollection
    {
 		
 		if($request->sortColumn){
 			$param = $request->sortColumn;
 			return new BookResourceCollection(Book::orderBy($param)->paginate(5));
 		}else if($request->sortDirection){
 			$param = $request->sortDirection;
 			return new BookResourceCollection(Book::orderBy('id',$param)->paginate(5));
 		}else if($request->title){
 			$param = $request->title;
 			return new BookResourceCollection(Book::where('title',$param)->get());
 		}else if($request->id){
            $ids = explode(',', $request->id);
 			$author = AuthorBook::getSingle($ids);
                foreach($author as $value){
                    $data[] = $value->book_id;
                }
                return $authors =  new BookResourceCollection(Book::whereIn('id',$data)->get());
 			
 		}else{
 			return new BookResourceCollection(Book::paginate(5));
 		}
    	
    }


    public function show(Book $book) : BookResource
    {
    	return new BookResource($book);
    }
    public function store(Request $request) : BookResource
    {
            if(Book::where('isbn',$request->isbn)->count() > 0){
                $response = [
                    'status' => '422',
                    'errors' => 'isbn already exist'
                ];
            }
            $validator = Validator::make($request->all(), [
               'title' => 'required',
               'description' => 'required',
               'isbn' => 'required',
            ]);
           if($validator->fails()) {
                $response = [
                    'status' => '201',
                    'errors' => 'Invalid Response'
                ];
                return response()->json($response);
           }
           else{
                $book = new Book();
                $book->isbn = $request->isbn;
                $book->title = $request->title;
                $book->description = $request->description;
                $book->save();
                $authors = $request->authors;
                $authors_array = explode(',', $authors);
                foreach($authors_array as $author){
                    $aid = Author::findOrFail($author);
                    $book->authors()->attach($aid);
                }
            }
            $data = Book::find($book->id);
            return new BookResource($data);  
    }

}
