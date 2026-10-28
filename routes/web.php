<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenerbitController;

Route::get('/', function () {
    return redirect()->route('penerbit.index');
});

Route::resource('penerbit', PenerbitController::class);