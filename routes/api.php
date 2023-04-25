<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Controller;
use App\Http\Controllers\sepatucontroller;
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
Route::get('sepatu',[sepatucontroller::class,'index']);
Route::post('sepatu/store', [sepatucontroller::class, 'store']);
Route::get('sepatu/show/{id}',[sepatucontroller::class,'show']);
Route::post('sepatu/update/{id}', [sepatucontroller::class, 'update']);
Route::delete('sepatu/destroy/{id}', [sepatuController::class, 'destroy']);
Route::post('sepatu/edit/{id}', [sepatucontroller::class, 'edit']);

