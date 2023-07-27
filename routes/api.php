<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\ApiTokenKey;
use App\Models\SearchRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;
// include '../app/test.php'
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {

        Route::apiResource('contact', ContactController::class);
        Route::apiResource('search-record', SearchRecord::class)->only(['index', 'delete']);
        Route::post('multiple-delete', [ContactController::class, 'multipleDelete']);
        Route::post('logout', [ApiAuthController::class, 'logout']);


        Route::post('devices', [ApiAuthController::class, '
    ']);
        Route::post('logout-all', [ApiAuthController::class, 'logOutAll']);
    });



    Route::post("register", [ApiAuthController::class, 'register']);
    Route::post("login", [ApiAuthController::class, 'login']);
    Route::post('reset', [ApiAuthController::class, 'reset']);
    Route::post('new-pw', [ApiAuthController::class, 'newPw']);
});
