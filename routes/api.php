<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\indexController;
use Illuminate\Http\views\user;
use App\Models\login;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user', [indexcontroller::class, 'index']); 
Route::post('/user', [indexcontroller::class, 'store']);
Route::put('/user/edit/{$id}', [indexcontroller::class, 'edit']);
Route::put('/user/delete/{$id}', [indexcontroller::class, 'delete']);

//Route::get('/user/userview', [indexcontroller::class, 'viewpage']);
