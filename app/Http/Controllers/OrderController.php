<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function store(Request $request)
{
    $productIds = $request->input('product_ids');
    $productPrices = $request->input('product_prices');
    
    // Process the submitted values as needed
    
    // Redirect to another page or perform further actions
}
}
