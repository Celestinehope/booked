<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'vendoraccepted_id',
        'vendoraccepted_name',
        'vendoraccepted_address',
        'vendoraccepted_type',
        'vendoraccepted_contact',
        'vendoraccepted_certification',
        'vendoraccepted_image',
        'vendoraccepted_description',
       
    ];
}
