<?php
Route::get('/', 'Admin\HomeController@index')->name('home');
Route::get('/dashboard', 'Admin\HomeController@index')->name('dashboard');
// Permissions
Route::delete('permissions/destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.massDestroy');
Route::resource('permissions', 'Admin\PermissionsController');
// Roles
Route::delete('roles/destroy', 'Admin\RolesController@massDestroy')->name('roles.massDestroy');
Route::resource('roles', 'Admin\RolesController');
// Users
Route::delete('users/destroy', 'Admin\UsersController@massDestroy')->name('users.massDestroy');
Route::post('users/parse-csv-import', 'Admin\UsersController@parseCsvImport')->name('users.parseCsvImport');
Route::post('users/process-csv-import', 'Admin\UsersController@processCsvImport')->name('users.processCsvImport');
Route::resource('users', 'Admin\UsersController');
Route::post('users/add-profile/{$user}', [\App\Http\Controllers\Admin\UsersController::class, 'addProfile'])->name('users.add-profile');
// User Alerts
Route::delete('user-alerts/destroy', 'Admin\UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
Route::resource('user-alerts', 'Admin\UserAlertsController', ['except' => ['edit', 'update']]);
Route::get('get-user-alert', [\App\Http\Controllers\Admin\UserAlertsController::class, 'getUserAlert'])->name('get.user-alert');
Route::post('add-user-alert', [\App\Http\Controllers\Admin\UserAlertsController::class, 'addUserAlert'])->name('user-alert.add');
Route::post('update-user-alert', [\App\Http\Controllers\Admin\UserAlertsController::class, 'updateUserAlert'])->name('user-alert.update');
// Audit Logs
Route::resource('audit-logs', 'Admin\AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
// Settings
Route::delete('settings/destroy', 'Admin\SettingsController@massDestroy')->name('settings.massDestroy');
Route::post('settings/parse-csv-import', 'Admin\SettingsController@parseCsvImport')->name('settings.parseCsvImport');
Route::post('settings/process-csv-import', 'Admin\SettingsController@processCsvImport')->name('settings.processCsvImport');
Route::resource('settings', 'Admin\SettingsController');
// Admins
Route::delete('admins/destroy', 'Admin\AdminController@massDestroy')->name('admins.massDestroy');
Route::post('admins/parse-csv-import', 'Admin\AdminController@parseCsvImport')->name('admins.parseCsvImport');
Route::post('admins/process-csv-import', 'Admin\AdminController@processCsvImport')->name('admins.processCsvImport');
Route::resource('admins', 'Admin\AdminController');

Route::group(['prefix' => 'template', 'as' => 'template.'], function () {
    Route::get('create/{userId}', 'Admin\TemplateController@create')->name('create');
    Route::get('edit/{id}', 'Admin\TemplateController@edit')->name('edit');
    Route::post('store', 'Admin\TemplateController@store')->name('store');
    Route::post('update/{id}', 'Admin\TemplateController@update')->name('update');
    Route::get('show/{username}', 'Admin\TemplateController@show')->name('show');
    Route::any('destroy/{id}', 'Admin\TemplateController@destroy')->name('delete');
});

Route::group(['prefix' => 'userProfile', 'as' => 'userProfile.'], function () {
    Route::get('create/{userId}', 'Admin\UserAccountController@create')->name('create');
    Route::get('edit/{id}', 'Admin\UserAccountController@edit')->name('edit');
    Route::post('store', 'Admin\UserAccountController@store')->name('store');
    Route::post('update/{id}', 'Admin\UserAccountController@update')->name('update');
    Route::get('show/{username}', 'Admin\UserAccountController@show')->name('show');
    Route::any('destroy/{id}', 'Admin\UserAccountController@destroy')->name('destroy');
});

Route::resource('payments', 'Admin\PaymentController');
Route::resource('transactions', 'Admin\TransactionController');

Route::delete('enquiries/destroy', 'Admin\EnquiryController@massDestroy')->name('enquiries.massDestroy');
Route::resource('enquiries', 'Admin\EnquiryController');


Route::get('messages', 'Admin\MessageController@index')->name('messages.index');
Route::post('messages/store', 'Admin\MessageController@store')->name('messages.store');
Route::get('messages/edit', 'Admin\MessageController@edit')->name('messages.edit');
Route::post('messages/update', 'Admin\MessageController@update')->name('messages.update');
