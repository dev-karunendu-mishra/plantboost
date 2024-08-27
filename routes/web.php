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
    Route::get('link', function(){
        Artisan::call('storage:link');
        $target = $_SERVER['DOCUMENT_ROOT'] . '/storage/uploads';
        $link = $_SERVER['DOCUMENT_ROOT'] . '/public/storage/uploads';
        // Check if the symlink or directory already exists
        // Check if the symlink or directory already exists
        // Function to recursively delete a directory and its contents
        function deleteDirectory($dir) {
            if (!is_dir($dir)) {
                return false;
            }

            $items = array_diff(scandir($dir), array('.', '..'));

            foreach ($items as $item) {
                $path = $dir . DIRECTORY_SEPARATOR . $item;
                if (is_dir($path)) {
                    deleteDirectory($path);
                } else {
                    unlink($path);
                }
            }

            return rmdir($dir);
        }

        // Check if the symlink or directory already exists
        if (is_link($link)) {
            // If it's a symlink, remove it
            unlink($link);
        } elseif (is_dir($link)) {
            // If it's a directory, recursively delete it
            deleteDirectory($link);
        }
        // Create the new symlink
        symlink($target, $link);
        return "Symlink created successfully!";
    });
    Route::get('/check-file', function () {
    $path = public_path('storage/uploads/testimonials/profile/1724577998_Snapshot_27.png');
    if (file_exists($path)) {
        return response()->file($path);
    } else {
        return 'File not found';
    }
});
    Route::get('', [WebsiteController::class,'index'])->name('index');
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
    Route::get('about', function () {
        return view('default.about');
    });
    Route::get('contact', function () {
        return view('default.contact');
    });
    Route::get('faqs', function () {
        return view('default.faq');
    });
    Route::post('placeOrder', [WebsiteController::class,'placeOrder'])->name('placeOrder');
    Route::get('thankyou', function () {
       // Retrieve order and product data from session
        $order = session('order');
        $product = session('product');

        // Ensure that the session variables are available
        if (!$order || !$product) {
            return redirect('/'); // Redirect to homepage or another page if data isn't found
        }

        return view('default.thankyou', compact('order', 'product'));
    })->name('thankyou');
});
