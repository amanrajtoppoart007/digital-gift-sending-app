<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/db-clear', function () {
    Artisan::call('db:wipe');
    dd("done");
});

Route::get('/config-clear', function () {
    Artisan::call('config:clear');
    dd("done");
});
Route::get('/view-clear', function () {
    Artisan::call('view:clear');
    dd("done");
});
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    dd("done");
});
