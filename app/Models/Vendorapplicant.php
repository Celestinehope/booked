<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorapplicant extends Model
{
    use HasFactory;

    
    protected $fillable = [
        
        'vendor_name',
        'vendor_email',
        'vendor_password',
        'vendor_address',
        'vendor_type',
        'vendor_contact',
        'vendor_certification',
        'vendor_image',
        'vendor_description',
       
    ];
}
