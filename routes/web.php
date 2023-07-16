<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ProviderController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VendorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/vendordashboard', [BookController::class, 'show']);

Route::get('/view', function () {
    return view('viewproduct');
});

Route::get('/product', [BookController::class, 'index']);

Route::post('/submit-order', [FormController::class, 'submitHire'])->name('submit-order');

Route::get('/book/{book}/edit', [BookController::class, 'bookedit']);
Route::put('/book/{book}/update', [BookController::class, 'bookupdate']);
Route::delete('/book/{book}/delete', [BookController::class, 'delete']);

Route::get('/vendorregister',[VendorController::class, 'show'])->name('vendorregister');
Route::post('/addedvendorapplicant',[VendorController::class,'addvendorapplicant']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//admin dashboard
Route::get('/admindashboard', function () {
    return view('admin/admindashboard');
});


Route::get('/addbookform', function () {
    return view('vendor.addproductform');
})->middleware('auth');

//Route::get('/product', [BookController::class, 'index']);

//add book
Route::post('/addedbook', [BookController::class, 'addbooks'])->middleware('auth');

Route::get('/addcategoryform', function () {
    return view('admin.addnewcategory');
})->middleware('auth');
Route::post('/addedcategory', [BookController::class, 'addcategory'])->middleware('auth');

Route::get('/displaycategories', [BookController::class, 'displaycategories']);
Route::get('/category/{category}/edit', [BookController::class, 'categoryedit']);
Route::put('/category/{category}/update', [BookController::class, 'categoryupdate']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect']);
Route::get('/auth/{provider}/callback',[ProviderController::class,'callback']);

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

//vendor accept
Route::get('/applicant/{applicant}/accept', [VendorController::class, 'acceptvendor']);

//vendor deny
Route::delete('/applicant/{applicant}/deny', [VendorController::class, 'denyvendor']);

//show vendor applicants
Route::get('/showvendorapplicants', [VendorController::class, 'showvendors']);
//edit category information
Route::get('/category/{category}/edit', [BookController::class, 'categoryedit']);
//update category details
Route::put('/category/{category}/update', [BookController::class, 'categoryupdate']);

//delete category
Route::delete('/category/{category}/delete', [BookController::class, 'categorydelete']);

//show all vendors  
Route::get('/vendorsaccepted', [VendorController::class, 'showvendorsaccepted']);
//user module
Route::get('/product', [BookController::class, 'index']);
Route::get('/cart', [BookController::class, 'cart'])->name('cart');
Route::get('products/cart', [BookController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [BookController::class, 'addToCart'])->name('add_to_cart');
Route::get('add-to-order/{id}', [BookController::class, 'borrow'])->name('borrow');
Route::get('/products/{id}', [BookController::class, 'openView'])->name('viewproduct');
Route::post('/checkout', [FormController::class, 'submitForm'])->name('checkout');

Route::patch('update-cart', [BookController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [BookController::class, 'remove'])->name('remove_from_cart');

Route::post('/submit-order', [FormController::class, 'submitHire'])->name('submit-order');

require __DIR__.'/auth.php';

?>