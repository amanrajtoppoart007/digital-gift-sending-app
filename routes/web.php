<?php

Route::post('submit/enquiry/form','Guest\EnquiryController@store')->name('store.guest.enquiry');
Route::get('/home','User\HomeController@index')->name('home');

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
   Route::post('get/states', 'Ajax\RegionController@getDistricts')->name('ajax.district.list');
   Route::post('get/blocks', 'Ajax\RegionController@getBlockList')->name('ajax.block.list');
   Route::post('get/pin-codes', 'Ajax\RegionController@getPincodeList')->name('ajax.pincode.list');
   Route::post('get/areas', 'Ajax\RegionController@getAreaList')->name('ajax.area.list');
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
     Route::post('upload/media', 'Auth\RegisterController@storeMedia')->name('registration.storeMedia');
     Route::get('/message/{entity_id}/{token}', 'Auth\RegisterController@message')->name("registration.message");

});
Route::resource('profile', 'User\UserProfileController');
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
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
Route::group(['prefix' => 'payment', 'as' => 'payment.',  'middleware' => ['auth']], function () {
Route::get('init/{username}', 'User\PaymentController@init')->name('init');
Route::get('create', 'User\PaymentController@create')->name('create');
Route::post('store', 'User\PaymentController@store')->name('store');
});
//function for guest to view user profile
Route::group(['prefix' => 'view', 'as' => 'view.'], function () {
Route::get('show/{username}', 'User\TemplateController@show')->name('show');
});
//function for guest to init payment to the user
Route::group(['prefix' => 'gift', 'as' => 'gift.'], function () {
Route::any('init/{username}', 'Guest\PaymentController@init')->name('init');
Route::get('create', 'Guest\PaymentController@create')->name('create');
Route::post('store', 'Guest\PaymentController@store')->name('store');
Route::get('message/{txn_number}', 'Guest\PaymentController@message')->name('message');
});
