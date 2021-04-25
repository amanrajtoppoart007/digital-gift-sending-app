<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/clear-db', function () {
    Artisan::call('db:wipe');
    dd("done");
});
