<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        $products= Book::all();
        return view('sample',compact('products'));
    }

    

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
//update book information form
    public function bookedit(Book $book){

    return view('vendor.editbookform',['book'=> $book]);

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
        return redirect('/vendordashboard')->with('message', 'Pet deleted successfully');
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

        return redirect('/admin/admindashboard')->with('message', 'Category updated successfully');
    }

    //public function bookedit(Book $book){

   // return view('vendor.editbookform',['book'=> $book]);

    //}
}
