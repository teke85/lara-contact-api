<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return config('info.default_contact_photo');
});


Route::get('verify-your-mail/{email}/{secret_code}', [ApiAuthController::class, 'makeVerify']);
