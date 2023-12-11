<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StudentsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    // Api route that does'nt need bearer token
    Route::get('/books',[BooksController::class,'index']);
    Route::get('/book/{id}',[BooksController::class,'show']);

    Route::get('/students',[StudentsController::class,'index']);
    Route::get('/student/{id}',[StudentsController::class,'show']);
    
    // Api route uses a bearer token
Route::middleware('auth:sanctum')->group(function (){
    Route::post('/book',[BooksController::class,'store']);
    Route::put('/book/{id}',[BooksController::class,'update']);
    Route::delete('/book/{id}',[BooksController::class,'destroy']);
   
    Route::post('/student',[StudentsController::class,'store']);
    Route::put('/student/{id}',[StudentsController::class,'update']);
    Route::delete('/student/{id}',[StudentsController::class,'destroy']);
});
// api route for login
Route::post('/login',[AuthController::class,'login']);