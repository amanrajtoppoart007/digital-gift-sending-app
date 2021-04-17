<?php
Route::get('test/sms/api','TestController');
Route::post('submit/enquiry/form','Guest\EnquiryController@store')->name('store.guest.enquiry');



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

Route::get('/', 'Guest\HomeController@index');
Route::get('/solution/{entity}', 'Guest\HomeController@solution')->name('solutions');
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
     Route::post('/store', 'Auth\RegisterController@storeFarmer')->name("store.user.registration");
     Route::post('upload/media', 'Auth\RegisterController@storeMedia')->name('registration.storeMedia');
     Route::get('/message/{user}/{entity_id}/{token}', 'Auth\RegisterController@message')->name("registration.message");

});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
