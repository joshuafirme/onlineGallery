<?php

use App\Http\Controllers\Admin\AffiliateDashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UsesController;
use App\Http\Controllers\Admin\WebsiteContentController;
use App\Http\Controllers\AffilateController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/do-login', [AuthController::class, 'doLogin']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/', function () {
    return view('login');
});

Route::redirect('/', '/homepage');
Route::redirect('/home', '/homepage');

Route::middleware('auth')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('/users/import', 'import');
        Route::get('/users/export', 'export');
        Route::get('/user/change-password', 'changePassword');
        Route::post('/user/update-password', 'updatePassword');
        Route::post('/users/change-status/{id?}', 'changeStatus');
        Route::resource('/users', UserController::class);
        Route::post('/users/update/{id}', 'update');
    });

    Route::controller(UserRoleController::class)->group(function () {
        Route::resource('/user-roles', UserRoleController::class);
        Route::post('/user-roles/update/{id}', 'update');
    });

    Route::controller(UsesController::class)->group(function () {
        Route::resource('/uses', UsesController::class);
        Route::post('/uses/update/{id}', 'update');

        Route::get('/uses-sliders/show/{id}', 'showSlider');
        Route::post('/uses-sliders/store', 'storeSlider');
        Route::post('/uses-sliders/update/{id}', 'updateSlider');
        Route::delete('/uses-sliders/{id}', 'deleteSlider');
    });

    Route::controller(AffiliateDashboardController::class)->group(function () {
        Route::resource('/affiliates-accounts', AffiliateDashboardController::class);
        Route::get('/affiliates-accounts', 'affiliateAccounts');
        Route::get('/affiliates-commissions', 'affiliateCommissions');
    });


    Route::resource('/sliders', SliderController::class);
    Route::post('/sliders/update/{id}', [SliderController::class, 'update']);
    
    Route::resource('/cards', CardController::class);
    Route::post('/cards/update/{id}', [CardController::class, 'update']);
    
    Route::resource('/testimonials', TestimonialController::class);
    Route::post('/testimonials/update/{id}', [TestimonialController::class, 'update']);

    Route::resource('/website-content', WebsiteContentController::class);
    Route::post('/website-content', [WebsiteContentController::class, 'update']);
    
    Route::resource('/pricing', PricingController::class);
    Route::put('/pricing/update/{id}', [PricingController::class, 'update']);
});
// Homepage Controller
Route::controller(HomepageController::class)->group(function () {
    Route::get('/homepage/{account_name?}', 'indexHomepage')->name('homepage');
    Route::get('/howItWorks', 'howItWorks')->name('howItWorks');
    Route::get('/free-trial', 'freeTrial')->name('freeTrial');

    Route::get('/uses/show/{slug}', 'uses');

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
    Route::post('/login/process', 'login_process');

    Route::post('/register/process', 'register_process');


    Route::get('/message', 'message')
        ->name('admin.message')
        ->middleware(['auth']);

    Route::delete('/delete-message/{id}', 'deleteMessage')->name('delete-message');

    Route::get('/accounts', 'accounts')
        ->name('admin.accounts')
        ->middleware(['auth']);

    Route::post('/logout', 'logout')->middleware('auth');
});


Route::resource('sliders', SliderController::class);

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

Route::post('/affiliate/do-register', [AffilateController::class, 'doRegister']);
Route::get('/affiliate/registration', [AffilateController::class, 'registration']);
Route::resource('/affiliate', AffilateController::class);