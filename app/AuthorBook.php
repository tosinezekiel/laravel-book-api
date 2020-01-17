<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    public static function getSingle($author){
        return  DB::table('author_book')->select('book_id')->whereIn('author_id',$author)->get();
   }
}
