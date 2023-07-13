<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductsController extends Controller
{
    /*public function index(){
        $products= Book::all();
        return view('sample',compact('products'));
    }

    public function cart(){
        
        return view('cart');
    }

    public function openView($id){

        $product = Book::find($id);
        if (!$product) {
            abort(404);
        }

        return view('viewproduct', ['product' => $product]);
    }
    public function borrow($id){

        $products= Book::findOrFail($id);

        $borrow= session()->get('borrow',[]);
        $futureDate = Carbon::now()->addDays(14)->format('Y-m-d');
       
    

        if(isset($cart[$id])){
            $borrow[$id]['quantity']++;
        } else{
            $borrow[$id]=[
                'product_name' => $products->book_name,
                'photo'=>$products->book_image,
                book_author
                book_description
                'price'=>$products->book_price,
                'quantity'=>$products->book_quantity,
            ];
        }
        session()->put('borrow',$borrow);
        return view('hire',['product' => $borrow,'futureDate' => $futureDate,]);

    }
    

    public function addToCart($id){

        $products= Book::findOrFail($id);

        $cart= session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else{
            $cart[$id]=[
                'product_name' => $products->book_name,
                'photo'=>$products->book_image,
                'price'=>$products->book_price,
                'quantity'=>1,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product successfully added to cart!');

    }

    public function buy($id){

        $products= Book::findOrFail($id);

        $buy= session()->get('buy',[]);
               

        if(isset($cart[$id])){
            $buy[$id]['quantity']++;
        } else{
            $buy[$id]=[
                'product_name' => $products->book_name,
                'price'=>$products->book_price,
                'quantity'=>$products->quantity,
                'bought'
            ];
        }
        session()->put('buy',$buy);
        return view('checkout',['product' => $buy]);
         
    

    }
    
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {   
        if($request->id){
            $cart = session()->get('cart');

            if (isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Product successfully removed!');

        }

        }
        */
    public function index(){
        $products= Book::all();
        return view('sample',compact('products'));
    }

    public function cart(){
        
        return view('cart');
    }

    public function openView($id){

        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        return view('viewproduct', ['product' => $product]);
    }
    public function borrow($id){

        $products= Product::findOrFail($id);

        $borrow= session()->get('borrow',[]);
        $futureDate = Carbon::now()->addDays(14)->format('Y-m-d');
       
    

        if(isset($cart[$id])){
            $borrow[$id]['quantity']++;
        } else{
            $borrow[$id]=[
                'product_name' => $products->product_name,
                'photo'=>$products->photo,
                'price'=>$products->price,
                'quantity'=>$products->quantity,
            ];
        }
        session()->put('borrow',$borrow);
        return view('hire',['product' => $borrow,'futureDate' => $futureDate,]);

    }
    

    public function addToCart($id){

        $products= Product::findOrFail($id);

        $cart= session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else{
            $cart[$id]=[
                'product_name' => $products->product_name,
                'photo'=>$products->photo,
                'price'=>$products->price,
                'quantity'=>1,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product successfully added to cart!');

    }

    public function buy($id){

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
    
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {   
        if($request->id){
            $cart = session()->get('cart');

            if (isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Product successfully removed!');

        }

        }
        

        




}
