<?php
//function for guest to view user profile


Route::any('shaadi/{username}', 'Guest\TemplateController@show')->name('template');
Route::post('pay-u-money-gate-way/response/{txn_number}','Guest\PaymentController@payUMoneyResponse')->name('payumoney.gateway.response');
Route::post('submit/enquiry/form','Guest\EnquiryController@store')->name('store.guest.enquiry');
Route::get('/dashboard','User\HomeController@index')->name('home');

Route::post('/store/registration/media','Ajax\MediaUploadController')->name('upload.media');
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'AdminAuth\LoginController@login')->name('admin.login.check');
    Route::post('logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
    Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name("admin.password.request");
    Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name("admin.password.email");
    Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset')->name("admin.password.update");
    Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name("admin.password.reset");
});

Route::prefix('ajax')->group(function(){

});

Route::get('/', 'Guest\HomeController@index')->name('index');
Route::get('/services', 'Guest\HomeController@services')->name('services');
Route::get('/career', 'Guest\HomeController@career')->name('career');
Route::get('/about', 'Guest\HomeController@about')->name('about');
Route::get('/contact', 'Guest\HomeController@contact')->name('contact');
Route::get('/privacy-policy', 'Guest\HomeController@privacy')->name('privacy');
Route::get('/terms-conditions', 'Guest\HomeController@terms')->name('terms');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();


Route::prefix('registration')->group(function () {
     Route::get('/', 'Auth\RegisterController@showRegistrationForm')->name("register");
     Route::post('/store', 'Auth\RegisterController@store')->name("store.user.registration");
     Route::post('/otp/send', 'Auth\RegisterController@sendRegistrationOtp')->name("send.otp.user.registration");
     Route::post('/otp/verify', 'Auth\RegisterController@verifyOtp')->name("verify.otp.user.registration");
     Route::post('upload/media', 'Auth\RegisterController@storeMedia')->name('registration.storeMedia');
     Route::get('/message/{entity_id}/{token}', 'Auth\RegisterController@message')->name("registration.message");
});
Route::resource('account', 'User\AccountController');
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    Route::get('/', [\App\Http\Controllers\User\ProfileController::class, 'edit'])->name('edit');
    Route::post('/', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('update');
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::group(['prefix' => 'template', 'as' => 'template.',  'middleware' => ['auth']], function () {
Route::get('create', 'User\TemplateController@create')->name('create');
Route::get('edit/{id}', 'User\TemplateController@edit')->name('edit');
Route::post('store', 'User\TemplateController@store')->name('store');
Route::post('update/{id}', 'User\TemplateController@update')->name('update');
Route::get('show/{username}', 'User\TemplateController@show')->name('show');
});
Route::group(['prefix' => 'payments', 'as' => 'payments.',  'middleware' => ['auth']], function () {
Route::get('init/{username}', 'User\PaymentController@init')->name('init');
Route::get('create', 'User\PaymentController@create')->name('create');
Route::post('store', 'User\PaymentController@store')->name('store');
Route::get('history', 'User\PaymentController@history')->name('history');
Route::get('get/pdf/invoice/{id}', 'User\PaymentController@createPDF')->name('create.pdf');
Route::get('history/download', 'User\PaymentController@createReportPDF')->name('create.report.pdf');
});

Route::group(['prefix' => 'password', 'as' => 'password.',  'middleware' => ['auth']], function () {
    Route::get('change', 'User\PasswordController@showChangePasswordForm')->name('change');
    Route::post('change', 'User\PasswordController@changePassword')->name('change.submit');
});

//function for guest to init payments to the user
Route::group(['prefix' => 'gift', 'as' => 'gift.'], function () {
Route::get('create', 'Guest\PaymentController@create')->name('create');
Route::post('store', 'Guest\PaymentController@store')->name('store');
Route::get('message/{txn_number}', 'Guest\PaymentController@message')->name('message');
});

Route::get('verify/{token}', [\App\Http\Controllers\VerificationController::class, 'verify']);
Route::get('upload/{token}', 'Auth\RegisterController@uploadDocumentForm');
Route::post('upload-document', 'Auth\RegisterController@uploadDocumentSubmit')->name('upload.submit');
require __DIR__.'/cmd.php';

