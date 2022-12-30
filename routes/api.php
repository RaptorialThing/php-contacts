<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('tags',[\App\Http\Controllers\ApiTagController::class,'index']);
Route::post('tags',[\App\Http\Controllers\ApiTagController::class,'store']);
Route::get("tags/{tag}",[\App\Http\Controllers\ApiTagController::class,'show']);
Route::put("tags/{tag}",[\App\Http\Controllers\ApiTagController::class,'update']);
Route::delete("tags/{tag}",[\App\Http\Controllers\ApiTagController::class,'delete']);//->middleware(['littlegatekeeper']);



Route::get('contacts', [\App\Http\Controllers\ApiContactController::class,'index']);
Route::post('contacts',[\App\Http\Controllers\ApiContactController::class,'store']);
Route::get("contacts/{contact}",[\App\Http\Controllers\ApiContactController::class,'show']);
Route::put("contacts/{contact}",[\App\Http\Controllers\ApiContactController::class,'update']);
Route::delete("contacts/{contact}",[\App\Http\Controllers\ApiContactController::class,'delete']); 
