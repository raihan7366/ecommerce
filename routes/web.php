<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthenticationController as auth;
use App\Http\Controllers\Backend\UserController as user;
use App\Http\Controllers\Backend\RoleController as role;
use App\Http\Controllers\Backend\CustomersController as customers;
use App\Http\Controllers\Backend\DashboardController as dashboard;
use App\Http\Controllers\Backend\PermissionController as permission;
use App\Http\Controllers\Backend\CategoryController as categories;
use App\Http\Controllers\Backend\BrandController as brands;
use App\Http\Controllers\Backend\ProductController as products;
use App\Http\Controllers\Backend\OrderController as orders;
use App\Http\Controllers\Backend\OrderDetailsController as orderDetails;
use App\Http\Controllers\Backend\PaymentController as payments;
use App\Http\Controllers\Backend\StockController as stocks;
use App\Http\Controllers\Backend\SettingController as settings;
use App\Http\Controllers\Backend\ReviewController as reviews;

use App\Http\Controllers\Customer\AuthController as cauth;

// for customer
Route::get('/customer/register', [cauth::class, 'signUpForm'])->name('customerRegister');
Route::post('/customer/register', [cauth::class, 'signUpStore'])->name('customerRegister.store');
Route::get('/customer/login', [cauth::class, 'signInForm'])->name('customerLogin');
Route::post('/customer/login', [cauth::class, 'signInCheck'])->name('customerLogin.check');
Route::get('/customer/logout', [cauth::class, 'signOut'])->name('customerlogOut');

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
Route::get('/register', [auth::class, 'signUpForm'])->name('register');
Route::post('/register', [auth::class, 'signUpStore'])->name('register.store');
Route::get('/login', [auth::class, 'signInForm'])->name('login');
Route::post('/login', [auth::class, 'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class, 'singOut'])->name('logOut');

Route::middleware(['checkauth'])->prefix('admin')->group(function(){
    Route::get('dashboard', [dashboard::class,'index'])->name('dashboard');
});

Route::middleware(['checkrole'])->prefix('admin')->group(function(){
    Route::resource('user', user::class);
    Route::resource('role', role::class);
    Route::resource('customers', customers::class);
    Route::resource('categories', categories::class);
    Route::resource('brands', brands::class);
    Route::resource('products', products::class);
    Route::resource('orders', orders::class);
    Route::resource('orderDetails', orderDetails::class);
    Route::resource('payments', payments::class);
    Route::resource('stocks', stocks::class);
    Route::resource('settings', settings::class);
    Route::resource('reviews', reviews::class);
    
    Route::get('permission/{role}', [permission::class,'index'])->name('permission.list');
    Route::post('permission/{role}', [permission::class,'save'])->name('permission.save');
});

Route::get('/dashboard', function () {
    return view('backend.authentication.login');
});



// Route::get('/login', function () {
//     return view('Customer/Auth/login')->name('login');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/', function () {
    return view('frontend/home/index');
})->name('/');

// Route::get('/login', function () {
//     return view('Customer/Auth/login');
// })->name('login');

// Route::get('/register', function () {
//     return view('Customer/Auth/register');
// })->name('register');

Route::get('/home', function () {
    return view('frontend/home/index');
})->name('home');

Route::get('/product', function () {
    return view('frontend/product/index');
})->name('product');

Route::get('/about', function () {
    return view('frontend/about/index');
})->name('about');

Route::get('/wishlist', function () {
    return view('frontend/wishlist/index');
})->name('wishlist');

Route::get('/productDetails', function () {
    return view('frontend/productDetails/index');
})->name('productDetails');