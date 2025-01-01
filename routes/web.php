<?php

use App\Http\Controllers\AccountAddressController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountTransactionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StatusController;
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
Route::get('/categories/{slug}', [CategoryController::class, 'detail'])->name('categories-detail');


Route::get('/products', [ProductController::class, 'index'])->name('products');
// Route::get('/all-product', [ProductController::class, 'product'])->name('all-product');
// Route::get('/best-seller', [ProductController::class, 'best'])->name('best-seller');

Route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [DetailController::class, 'add'])->name('detail-add');

Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');

Route::get('/pending', [StatusController::class, 'success'])->name('pending');
Route::get('/success', [StatusController::class, 'success'])->name('success');
Route::get('/failed', [StatusController::class, 'success'])->name('failed');

Route::get('/register-success', [RegisteredUserController::class, 'success'])->name('register-success');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/address', [CartController::class, 'address'])->name('cart-address');
    Route::post('/cart/address/selected', [CartController::class, 'selectAddress'])->name('cart-address-selected');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');

    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');

    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/account/{redirect}', [AccountController::class, 'update'])->name('account-redirect');

    Route::get('/account-address', [AccountAddressController::class, 'index'])->name('account-address');
    Route::get('/account-address/create', [AccountAddressController::class, 'create'])->name('account-address-create');
    Route::post('/account-address/store', [AccountAddressController::class, 'store'])->name('account-address-store');
    Route::get('/account-address/{id}/edit', [AccountAddressController::class, 'edit'])->name('account-address-edit');
    Route::put('/account-address/{id}', [AccountAddressController::class, 'update'])->name('account-address-update');
    Route::delete('/account-address/{id}', [AccountAddressController::class, 'destroy'])->name('account-address-delete');

    Route::get('/account-transactions', [AccountTransactionController::class, 'index'])->name('account-transactions');
    Route::get('/account-transactions/{id}', [AccountTransactionController::class, 'details'])->name('account-transaction-details');

    Route::get('/review', [ReviewController::class, 'index'])->name('review');
    Route::get('/review-details/{id}', [ReviewController::class, 'details'])->name('review-details');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('user', App\Http\Controllers\Admin\UserController::class);
        Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
        Route::resource('product-gallery', App\Http\Controllers\Admin\ProductGalleryController::class);
        Route::resource('transaction', App\Http\Controllers\Admin\TransactionController::class);

        Route::post('transaction/toggle-status/{id}', [App\Http\Controllers\Admin\TransactionController::class, 'toggleStatus'])
            ->name('transaction.toggleStatus');

        Route::post('transaction/{id}/add-resi', [App\Http\Controllers\Admin\TransactionController::class, 'addResi']);
    });


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__ . '/auth.php';
