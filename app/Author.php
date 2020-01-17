<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
    protected $hidden = [
        'created_at', 'updated_at','pivot'
    ];

}
