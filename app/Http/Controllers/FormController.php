<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        $id = $request->input('product_id');
        $name = $request->input('product_name');
        $price = $request->input('product_price');
        $quantity= $request->input('product_quantity');
        $type = $request->input('type');
        $total = $request->input('total');

        // Handle the form submission and the ID as needed

        // Redirect or return a response

        return view('checkout')->with([
            'product_id' => $id,
            'product_name' => $name,
            'product_price' => $price,
            'product_quantity' => $quantity,
            'type' => $type,
            'total' => $total
        ]);
    }
    public function submitHire(Request $request)
    {
        $id = $request->input('product_id');
        $name = $request->input('product_name');
        $price = $request->input('product_price');
        $quantity= $request->input('product_quantity');
        $type = $request->input('type');
        

        // Handle the form submission and the ID as needed

        // Redirect or return a response

        return view('checkout')->with([
            'product_id' => $id,
            'product_name' => $name2,
            'product_price' => $price2,
            'product_quantity' => $quantity2,
            'type' => $type2            
        ]);
    }
    /*public function buy($id){

        $products= Product::findOrFail($id);

        $buy= session()->get('buy',[]);
               

        if(isset($cart[$id])){
            $buy[$id]['quantity']++;
        } else{
            $buy[$id]=[
                'product_name' => $products->product_name,
                'price'=>$products->price,
                'quantity'=>$products->quantity,
                'bought'
            ];
        }
        session()->put('buy',$buy);
        return view('checkout',['product' => $buy]);
         
    

    }
    public function store(Request $request)
{
    $data1 = [ 'product_name','price', 'quantity', 'bought'];
    $data2 = [ 'product_name', 20,1,'borrowed'];

    return view('checkout', [
        'data1' => $data1,
        'data2' => $data2,
    ]);


}
    
    public function store(Request $request)
{
    // Start the database transaction
    DB::beginTransaction();

    try {
        // Insert into the first table
        $table1Data = [
            'Orderdetail_quantity ' => $request->input('value1'),
            'Orderdetail_totals ' => $request->input('value2'),
            'Orderdetail_type ' => $request->input('value2'),
            'Orderdetail_duration_star ' => $request->input('value2'),
            'Orderdetail_duration_end ' => $request->input('value2'),
            // Add more columns as needed
        ];
        $table1Id = DB::table('orderdetail')->insertGetId($table1Data);

        // Insert into the second table
        $table2Data = [
            'Userdetails_id' => $request->input('value3'),
            'Order_amount' => $request->input('value4'),
            'Order_status ' => $request->input('value4'),
            // Add more columns as needed
            'Orderdetail_id' => $table1Id, // Use the ID from the first table
        ];
        DB::table('order')->insert($table2Data);

        // Commit the transaction if all inserts are successful
        DB::commit();

        // Redirect or return a response indicating success
    } catch (\Exception $e) {
        // Rollback the transaction if an error occurs
        DB::rollback();

        // Handle the error or display an error message
    }
}*/

}
