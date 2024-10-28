<?php

use App\Http\Controllers\AccountAddressController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountOrderController;
use App\Http\Controllers\AccountTransactionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories-details', [CategoryController::class, 'detail'])->name('categories-details');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/all-product', [ProductController::class, 'product'])->name('all-product');
Route::get('/best-seller', [ProductController::class, 'best'])->name('best-seller');
Route::get('/details/{id}', [DetailController::class, 'index'])->name('details');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/success', [CartController::class, 'success'])->name('success');

Route::get('/register-success', [RegisteredUserController::class, 'success'])->name('register-success');

Route::get('/account', [AccountController::class, 'index'])->name('account');

Route::get('/account-address', [AccountAddressController::class, 'index'])->name('account-address');
Route::get('/account-address-edit', [AccountAddressController::class, 'edit'])->name('account-address-edit');
Route::get('/account-address-new', [AccountAddressController::class, 'new'])->name('account-address-new');

Route::get('/account-orders', [AccountOrderController::class, 'index'])->name('account-orders');
Route::get('/account-orders-details', [AccountOrderController::class, 'detail'])->name('account-orders-details');

Route::get('/review', [ReviewController::class, 'index'])->name('review');
Route::get('/review-details', [ReviewController::class, 'detail'])->name('review-details');

Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware(['auth','admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('category', CategoryController::class);
    });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
