<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    dealcontroller,
    homecontroller,
    sizecontroller,
    chartcontroller,
    OrderController,
    bannercontroller,
    policycontroller,
    productcontroller,
    categorycontroller,
    contactcontroller,
};
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Default Redirect Based on Authentication
Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect('/');
});

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Dashboard Route with Middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->role == 0) {
            return view('Admin.dashboard');
        } else if (Auth::user()->role == 1) {
            return redirect('/');
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('dashboard');
});

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/customer-list' , [policycontroller::class , 'showcustomer']);
// Add this route to your routes/web.php

    Route::view('/website', 'Admin.Website');

    // Category Routes

    Route::view('/add-category', 'Admin.WebSection.add-categories');
    Route::post('/categoryinserted', [categorycontroller::class, 'insertcategory']);
    Route::get('/show-category', [categorycontroller::class, 'showcategoriesadmin']);
    Route::get('/categorydeleted/{id}', [categorycontroller::class, 'deletecategory']);
    Route::get('/categoryedit/{id}', [categorycontroller::class, 'editcategory']);
    Route::put('/categoryupdated/{id}', [categorycontroller::class, 'updatecategory']);

//contact routes
    Route::get('/show-contact', [contactcontroller::class, 'showcontact']);


    // Banner Routes
    Route::view('/add-banner', 'Admin.WebSection.add-banner');
    Route::post('/bannerinserted', [bannercontroller::class, 'insertbanner']);
    Route::get('/show-banner', [bannercontroller::class, 'showbanneradmin']);
    Route::get('/bannerdeleted/{id}', [bannercontroller::class, 'deletebanner']);
    Route::get('/banneredit/{id}', [bannercontroller::class, 'editbanner']);
    Route::put('/bannerupdated/{id}', [bannercontroller::class, 'updatebanner']);

    // Policy Routes
    Route::view('/add-policy', 'Admin.WebSection.add-policy');
    Route::post('/policyinserted', [policycontroller::class, 'insertpolicy']);
    Route::get('/show-policies', [policycontroller::class, 'showpoliciesadmin']);
    Route::get('/policydeleted/{id}', [policycontroller::class, 'deletepolicy']);
    Route::get('/policyedit/{id}', [policycontroller::class, 'editpolicy']);
    Route::put('/policyupdated/{id}', [policycontroller::class, 'updatepolicy']);

    // Chart Routes
    Route::view('/add-chart', 'Admin.WebSection.add-chart');
    Route::post('/chartinserted', [chartcontroller::class, 'insertchart']);
    Route::get('/show-chart', [chartcontroller::class, 'showchartadmin']);
    Route::get('/chartdeleted/{id}', [chartcontroller::class, 'deletechart']);
    Route::get('/chartedit/{id}', [chartcontroller::class, 'editchart']);
    Route::put('/chartupdated/{id}', [chartcontroller::class, 'updatechart']);

    // Size Routes
    Route::view('/add-size', 'Admin.WebSection.add-size');
    Route::post('/sizeinserted', [sizecontroller::class, 'insertSize']);
    Route::get('/show-size', [sizecontroller::class, 'showSizeAdmin'])->name('show-size');
    Route::get('/sizeedit/{id}', [sizecontroller::class, 'editSize']);
    Route::put('/sizeupdated/{id}', [sizecontroller::class, 'updateSize']);
    Route::get('/sizedeleted/{id}', [sizecontroller::class, 'deleteSize']);

    // Product Routes
    Route::get('/add-product', [productcontroller::class, 'showassetsinform']);
    Route::post('/insert-product', [productcontroller::class, 'insertproduct']);
    Route::get('/show-products', [productcontroller::class, 'showProducts']);
    Route::get('/edit-product/{id}', [productcontroller::class, 'editProduct']);
    Route::put('/update-product/{id}', [productcontroller::class, 'updateProduct']);
    Route::get('/delete-product/{id}', [productcontroller::class, 'deleteProduct']);

    // Deal Routes
    Route::get('/add-deal', [dealcontroller::class, 'showAddForm']);
    Route::post('/insert-deal', [dealcontroller::class, 'insertDeal']);
    Route::get('/show-deals', [dealcontroller::class, 'showDeals']);
    Route::get('/edit-deal/{id}', [dealcontroller::class, 'editDeal']);
    Route::post('/update-deal/{id}', [dealcontroller::class, 'updateDeal']);
    Route::get('/delete-deal/{id}', [dealcontroller::class, 'deleteDeal']);


Route::patch('/admin/orders/accept/{id}', [OrderController::class, 'acceptOrder'])->name('admin.orders.accept');
Route::delete('/admin/orders/delete/{id}', [OrderController::class, 'deleteOrder'])->name('admin.orders.delete');



});

// Website Routes
Route::get('/', [homecontroller::class, 'showthings']);
Route::view('/about', 'WEBSITE.about');
Route::view('/aboutdevelopers', 'WEBSITE.AboutDeveloper');
Route::get('/product', [homecontroller::class, 'showproductspage']);
Route::get('/productdetail-page/{id}', [homecontroller::class, 'productdetails']);
Route::get('/dealdetail-page/{id}', [homecontroller::class, 'dealdetails']);
Route::get('/deals-packs', [dealcontroller::class, 'showDealsWebsite']);
Route::view('/contact', 'WEBSITE.contact');
Route::get('/policy', [policycontroller::class, 'showpolicieswebsite']);


    Route::view('/add-contact', 'WEBSITE.contact');
    Route::post('/contactinserted', [contactcontroller::class, 'addcontact']);


Route::post('add-to-cart/product/{product}', [productcontroller::class, 'addToCartProduct']);
Route::post('add-to-cart/deal/{deal}', [productcontroller::class, 'addToCartDeal']);
// Route::get('removeitem/{id}/{type}/{size?}', [productcontroller::class, 'removeFromCart'])->name('remove.item');

Route::get('cart', [productcontroller::class, 'cart'])->name('cart');
Route::post('clear-cart', [productcontroller::class, 'clearCart'])->name('clearcart');
// web.php
Route::post('update-cart-ajax', [productcontroller::class, 'updateCartAjax'])->name('update.cart.ajax');


Route::get('/payment', [OrderController::class, 'showPaymentForm'])->name('payment');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders');

Route::get('/order-list', [OrderController::class, 'showAdminOrders'])->name('order');
