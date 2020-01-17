<?php

namespace App\Http\Controllers;
use App\Author;
use App\AuthorBook;
use App\User;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
Use App\Http\Resources\BookResourceCollection;

class BookController extends Controller
{
	public function index(Request $request) 
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
    // public function store() : BookResource
    // {

    // }

}
