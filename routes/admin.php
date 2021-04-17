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
