<?php

use App\Http\Controllers\APILowonganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
 
    Route::get('/lowongan', [APILowonganController::class, 'index']);
    Route::post('/lowongan/store', [APILowonganController::class, 'store']);
    Route::get('/lowongan/{$id?}', [APILowonganController::class, 'show']);
    Route::post('/lowongan/update/{id?}', [APILowonganController::class, 'update']);
    Route::delete('/lowongan/{id?}', [APILowonganController::class, 'destroy']);
    
    });





//Referensi 

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('/profile', function(Request $request) {
//         return auth()->user();
//     });

//     Route::resource('programs', App\Http\Controllers\API\ProgramController::class);

//     // API route for logout user
//     Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
// });
