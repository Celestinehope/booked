<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'book_name',
        'book_description',
        'book_quantity',
        'book_price',
        'category_id',
        'book_image'
    ];

}
