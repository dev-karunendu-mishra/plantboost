<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\DeliveryOptionController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {

        Route::resource('products', ProductController::class)->names([
            'index' => 'products',
            'create' => 'products.create',
            'store' => 'products.store',
            'show' => 'products.show',
            'edit' => 'products.edit',
            'update' => 'products.update',
            'destroy' => 'products.destroy',
        ]);

        Route::resource('settings', SettingController::class)->names([
            'index' => 'settings',
            'create' => 'settings.create',
            'store' => 'settings.store',
            'show' => 'settings.show',
            'edit' => 'settings.edit',
            'update' => 'settings.update',
            'destroy' => 'settings.destroy',
        ]);

        Route::resource('testimonials', TestimonialController::class)->names([
            'index' => 'testimonials',
            'create' => 'testimonials.create',
            'store' => 'testimonials.store',
            'show' => 'testimonials.show',
            'edit' => 'testimonials.edit',
            'update' => 'testimonials.update',
            'destroy' => 'testimonials.destroy',
        ]);

        Route::resource('sliders', SliderController::class)->names([
            'index' => 'sliders',
            'create' => 'sliders.create',
            'store' => 'sliders.store',
            'show' => 'sliders.show',
            'edit' => 'sliders.edit',
            'update' => 'sliders.update',
            'destroy' => 'sliders.destroy',
        ]);

        Route::resource('orders', OrderController::class)->names([
            'index' => 'orders',
            'create' => 'orders.create',
            'store' => 'orders.store',
            'show' => 'orders.show',
            'edit' => 'orders.edit',
            'update' => 'orders.update',
            'destroy' => 'orders.destroy',
        ]);

        Route::resource('delivery-options', DeliveryOptionController::class)->names([
            'index' => 'delivery-options',
            'create' => 'delivery-options.create',
            'store' => 'delivery-options.store',
            'show' => 'delivery-options.show',
            'edit' => 'delivery-options.edit',
            'update' => 'delivery-options.update',
            'destroy' => 'delivery-options.destroy',
        ]);

        Route::resource('packages', PackageController::class)->names([
            'index' => 'packages',
            'create' => 'packages.create',
            'store' => 'packages.store',
            'show' => 'packages.show',
            'edit' => 'packages.edit',
            'update' => 'packages.update',
            'destroy' => 'packages.destroy',
        ]);

        Route::resource('images', ImageController::class)->names([
            'index' => 'images',
            'create' => 'images.create',
            'store' => 'images.store',
            'show' => 'images.show',
            'edit' => 'images.edit',
            'update' => 'images.update',
            'destroy' => 'images.destroy',
        ]);

        Route::resource('attributes', AttributeController::class)->names([
            'index' => 'attributes',
            'create' => 'attributes.create',
            'store' => 'attributes.store',
            'show' => 'attributes.show',
            'edit' => 'attributes.edit',
            'update' => 'attributes.update',
            'destroy' => 'attributes.destroy',
        ]);

        Route::resource('attribute-values', AttributeValueController::class)->names([
            'index' => 'attribute-values',
            'create' => 'attribute-values.create',
            'store' => 'attribute-values.store',
            'show' => 'attribute-values.show',
            'edit' => 'attribute-values.edit',
            'update' => 'attribute-values.update',
            'destroy' => 'attribute-values.destroy',
        ]);

    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
