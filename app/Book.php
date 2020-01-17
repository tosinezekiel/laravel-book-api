<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function authors()
    {
        return $this->belongsToMany('App\Author');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    public function count_reviews(){
    	return $this->reviews->pluck('review')->count();
    }
    public function count_average(){
    	return $this->reviews->pluck('review')->average();
    }
    
}
