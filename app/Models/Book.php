<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=[

        //dalam data ada 4 column
        'title',
        'author',
        'page',
        'year'

    ];


    
}
