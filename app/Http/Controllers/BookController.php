<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Carbon;

class BookController extends Controller
{
    //store book information
    public function addbooks(Request $request)
    {
        $data = $request->validate([            
        'book_name' => 'required',
        'book_description' => 'required',
        'book_quantity' => 'required',
        'book_price' => 'required',
        'book_author' => 'required',
        'category_id' => 'required',
               

        ]);

         if ($request->hasFile('book_image')) {
         $data['book_image'] = $request->file('book_image')->store('Book', 'public');
         }

        $data['vendor_id'] = auth()->id();
        
        Book::create($data);

        return redirect('/vendordashboard')->with('message', 'Book added successfully');
    }

     //display book
    public function show()
    {
        //$books =DB::table('books')->where('vendor_id', auth()->id())->get();
        $books= Book::all()->where('vendor_id', auth()->id());
        return view('vendordashboard',compact('books'));
        //return view('vendordashboard')
      //  ->with('books', $books);
    }
//edit book information form
    public function bookedit(Book $book){
        $categories = Category::all();
    return view('vendor.editbookform',['book'=> $book],['categories'=> $categories]);

    }
    //update book information submission
    public function bookupdate(Request $request, Book $book)
    {
        $data = $request->validate([            
        'book_name' => 'required',
        'book_description' => 'required',
        'book_quantity' => 'required',
        'book_price' => 'required',
        'book_author' => 'required',
        'category_id' => 'required',
               

        ]);

         if ($request->hasFile('book_image')) {
         $data['book_image'] = $request->file('book_image')->store('Book', 'public');
         }

        $data['vendor_id'] = auth()->id();
        

        $book->update($data);

        return redirect('/vendordashboard')->with('message', 'Book updated successfully');
    }

    //delete book record
    public function delete($book_id)
    {
        $book = Book::where('book_id', $book_id)->first();
        $book->delete();
        return redirect('/vendordashboard')->with('message', 'Book deleted successfully');
    }
      //add book form
    public function addbookform()
    {
        $categories = Category::all();
        return view('vendor.addproductform',compact('categories'));
        }

    public function categorydelete($category)
    {
        $del = Category::where('category_id', $category)->first();
        $del->delete();
        return redirect('/displaycategories')->with('message', 'Category deleted successfully');
    }

    //admin add new category
    public function addcategory(Request $request)
    {
        $data = $request->validate([            
        'category_name' => 'required',
       
        ]);

        Category::create($data);

        return redirect('/admindashboard')->with('message', 'Category added successfully');
    }

    //display categories admin
  

    public function displaycategories()
    {
        //$books =DB::table('books')->where('vendor_id', auth()->id())->get();
        $categories= Category::all();
        return view('admin.displaycategory',compact('categories'));
        //return view('vendordashboard')
      //  ->with('books', $books);
    }
    //edit categories view
    public function categoryedit(Category $category){

        return view('admin.editcategory',['category'=> $category]);
    
        }
         //update book information submission
    public function categoryupdate(Request $request, Category $category)
    {
        $data = $request->validate([            
        'category_name' => 'required',
        
        ]);
        $category->update($data);

        return redirect('/admindashboard')->with('message', 'Category updated successfully');
    }

    //public function bookedit(Book $book){

   // return view('vendor.editbookform',['book'=> $book]);

    //}


    //user module
    public function index(){
         if (auth()->user()->role != "user") {
            abort(403, 'Unauthorized Action! This page is for book customers only');
        }
        $books= Book::all();
        return view('sample',compact('books'));
    }

    public function cart(){
        
        return view('cart');
    }

    public function openView($id){

        $book = Book::find($id);
        if (!$book) {
            abort(404);
        }

        return view('viewproduct', ['book' => $book]);
    }
    public function borrow($id){

        $books= Book::findOrFail($id);

        $borrow= session()->get('borrow',[]);
       // $futureDate = Carbon::now()->addDays(14)->format('Y-m-d');
       
    

        if(isset($cart[$id])){
            $borrow[$id]['book_quantity']++;
        } else{
            $borrow[$id]=[
                'book_name' => $books->product_name,
                'book_image'=>$books->photo,
                'book_price'=>$books->price,
                'book_quantity'=>$books->quantity,
            ];
        }
        session()->put('borrow',$borrow);
        return view('hire',['book' => $borrow,]);
      //  'futureDate' => $futureDate
    }
    

    public function addToCart($id){

        $books= Book::findOrFail($id);

        $cart= session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else{
            $cart[$id]=[
                'book_name' => $books->book_name,
                'book_image'=>$books->book_image,
                'book_price'=>$books->book_price,
                'book_quantity'=>1,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product successfully added to cart!');

    }

    public function buy($id){

        $books= Book::findOrFail($id);

        $buy= session()->get('buy',[]);
               

        if(isset($cart[$id])){
            $buy[$id]['book_quantity']++;
        } else{
            $buy[$id]=[
                'book_name' => $books->book_name,
                'book_price'=>$books->book_price,
                'book_quantity'=>$books->book_quantity,
                'bought'
            ];
        }
        session()->put('buy',$buy);
        return view('checkout',['book' => $buy]);
         
    

    }
    
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["book_quantity"] = $request->quantity;
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
