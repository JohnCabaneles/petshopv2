<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\UserAllProductsController;
use App\Http\Controllers\DashboardOverviewController;
use App\Http\Controllers\ByCategoryFetchProductController;
use App\Http\Controllers\SingleOrderController;
use App\Http\Controllers\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserAllProductsController::class, 'index'])->name('rootHome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // cart
    Route::get('/cart', [ProductCartController::class, 'showCart'])->name('cart.show');
});



Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function() {
    Route::resource('/products', ProductController::class);
    Route::resource('/overview', DashboardOverviewController::class);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('/category', [CategoryController::class,'index']);
    Route::post('/category', [CategoryController::class,'store'])->name('categories.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::resource('/complains', ComplainController::class);
Route::get('/admin/complains', [ComplainController::class, 'adminIndex']);

Route::prefix('/user')->group(function () {
    Route::get('/products', UserAllProductsController::class);

});
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/checkout/index', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/cart/{id}', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::delete('/checkout/{checkout}', [CheckoutController::class, 'destroy'])->name('checkout.destroy');

    // Single order routes
    Route::get('/checkout', [SingleOrderController::class, 'index'])->name('orders.index');
    Route::get('/checkout/{id}', [SingleOrderController::class, 'show'])->name('single.show');
    Route::post('/checkout/buy-now/{id}', [SingleOrderController::class, 'store'])->name('single.store');
});

Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');


Route::post('/cart/add/{product_id}', [ProductCartController::class, 'addToCart'])->name('cart.add');
// Route::put('/cart/{id}', [ProductCartController::class, 'update'])->name('cart.update');
Route::post('/cart/update', [ProductCartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [ProductCartController::class, 'destroy'])->name('cart.destroy');

Route::get('/best-sellers', [ByCategoryFetchProductController::class, 'bestSellers'])->name('bestSellers');
Route::get('/promos', [ByCategoryFetchProductController::class, 'promos'])->name('promos');
Route::get('/accessories', [ByCategoryFetchProductController::class, 'accessories'])->name('accessories');
Route::get('/foods-and-treats', [ByCategoryFetchProductController::class, 'foodsAndTreats'])->name('foodsAndTreats');

Route::resource('/contact', ContactController::class);

require __DIR__.'/auth.php';
