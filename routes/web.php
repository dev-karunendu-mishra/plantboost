<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/')->group(function(){
    Route::get('', [WebsiteController::class,'index']);
    Route::get('refund-policy', function () {
        return view('default.refund-policy');
    });
    Route::get('shipping-policy', function () {
        return view('default.shipping-policy');
    });
    Route::get('privacy-policy', function () {
        return view('default.privacy-policy');
    });
    Route::get('terms-of-service', function () {
        return view('default.terms-of-service');
    });
    Route::get('about-us', function () {
        return view('default.about');
    });
    Route::get('contact-us', function () {
        return view('default.contact');
    });
    Route::post('placeOrder', [WebsiteController::class,'placeOrder'])->name('placeOrder');
});
