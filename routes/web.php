<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PublicGalleryController;

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

// Common routes naming
// index - show all data
// show - show a single data
// create - show a form to create a user
// store - store a data
// edit - show a form to edit a user
// update - update a data
// destroy - delete a data

Route::redirect('/', '/homepage');
Route::redirect('/home', '/homepage');

// Homepage Controller
Route::controller(HomepageController::class)->group(function () {
    Route::get('/homepage', 'indexHomepage')->name('homepage');
    Route::get('/howItWorks', 'howItWorks')->name('howItWorks');
    Route::get('/free-trial', 'freeTrial')->name('freeTrial');

    Route::get('/uses-wedding', 'weddingUses')->name('weddingUses');
    Route::get('/uses-holidays', 'holidaysUses')->name('holidaysUses');
    Route::get('/uses-birthdays', 'birthdaysUses')->name('birthdaysUses');
    Route::get('/uses-corporates', 'corporatesUses')->name('corporatesUses');
    Route::get('/uses-christmas', 'christmasUses')->name('christmasUses');
    Route::get('/uses-celebrations', 'celebrationsUses')->name('celebrationsUses');

    Route::post('/storeMessage', 'storeMessage');
});

Route::controller(PublicGalleryController::class)->group(function () {
    Route::get('/demo/public-gallery', 'demoPublicGallery')->name('demoPublicGallery');

    Route::post('/demo/public-gallery/processUploadImage', 'processUploadImage')->name('processUploadImage');
    Route::post('/demo/public-gallery/processUploadImageSingle', 'processUploadImageSingle')->name('processUploadImageSingle');

    Route::delete('/delete-publicmedia/{id}', 'deletepublicmedia')->name('delete-publicmedia');
});

// Admin Controller
Route::controller(AdminController::class)->group(function () {
    Route::get('/login', 'login')
        ->name('login')
        ->middleware('guest');
    Route::post('/login/process', 'login_process');

    Route::post('/register/process', 'register_process');

    Route::get('/dashboard', 'indexDashboard')
        ->name('admin.dashboard')
        ->middleware(['auth']);

    Route::get('/message', 'message')
        ->name('admin.message')
        ->middleware(['auth']);

    Route::delete('/delete-message/{id}', 'deleteMessage')->name('delete-message');

    Route::get('/accounts', 'accounts')
        ->name('admin.accounts')
        ->middleware(['auth']);

    Route::post('/logout', 'logout')->middleware('auth');
});

// Payment Controller
Route::controller(PaymentController::class)->group(function () {
    Route::get('/products', 'showPaymentForm')->name('products');

    Route::post('/payment/process', 'processPayment')->name('processPayment');
    Route::post('/payment/processWithout', 'processPaymentWithout')->name('processPaymentWithout');

    Route::get('/payment/success', 'paymentSuccess')->name('paymentSuccess');
    Route::get('/payment/successWithout', 'paymentSuccessWithout')->name('paymentSuccessWithout');
    Route::get('/payment/cancel', 'paymentCancel')->name('paymentCancel');
});

Route::controller(GalleryController::class)->group(function () {
    Route::get('/your-gallery/{uuid}', 'showGallery')->name('your-gallery');
    Route::get('/your-gallery/photos/{uuid}', 'showPhotos')->name('your-gallery-photos');
    Route::get('/your-gallery/videos/{uuid}', 'showVideos')->name('your-gallery-videos');
    Route::get('/your-gallery/myQR/{uuid}', 'showmyQR')->name('your-gallery-myQR');

    Route::get('/public-gallery/events/{uuid}/show', 'showPublicGallery')->name('public-gallery');

    Route::post('/your-gallery/processUploadImage/{uuid}', 'processUploadImage')->name('processUploadImage');
    Route::post('/your-gallery/processUploadImageSingle/{uuid}', 'processUploadImageSingle')->name('processUploadImageSingle');

    Route::post('/update-media', 'updateMedia')->name('update-media');
    Route::post('/update-QR/{uuid}', 'updateQR')->name('update-QR');

    Route::delete('/delete-media/{id}', 'delete')->name('delete-media');
});
