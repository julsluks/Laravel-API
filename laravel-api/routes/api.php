<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::resource("todo", TodoController::class);

// Public routes
Route::post("/register", [AuthController::class,"register"]);
Route::get('/todo', [TodoController::class, 'index']);
Route::get('/todo/{id}', [TodoController::class, 'show']);
Route::get("/todo/search/{title}", [TodoController::class,"search"]);

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post("/todo", [TodoController::class,"store"]);
    Route::put("/todo/{id}", [TodoController::class,"update"]);
    Route::delete("/todo/{id}", [TodoController::class,"destroy"]);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
