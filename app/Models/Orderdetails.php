<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    use HasFactory;
    protected $primaryKey ='orderdetails_id';
    protected $fillable = ['orderdetails_id','orderdetails_quantity','orderdetails_type','orderdetails_duration_start','orderdetails_duration_end','book_id','order_id'];
}
