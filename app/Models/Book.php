<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey= 'book_id';

    protected $fillable = [
        
        'book_name',
        'book_description',
        'book_quantity',
        'book_price',
        'book_author',
        'category_id',
        'book_image',
        'vendor_id'
    ];

    public function vendor()
{
    return $this->belongsTo(Vendor::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}


 
}
