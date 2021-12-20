<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//================================================================================
Route::get("/home", [HomeController::class, "index" ]);

//quando escrevo /home na URL, vai para HomeController função index
//================================================================================
Route::get("/", [HomeController::class, "index" ]);

//================================================================================
Route::get("/users", [AdminController::class, "user" ]);

//================================================================================
Route::get("/foodmenu", [AdminController::class, "foodmenu" ]);

//================================================================================
Route::post("/uploadfood", [AdminController::class, "uploadfood" ]);

//================================================================================
Route::get("/deleteuser/{id}", [AdminController::class, "deleteuser" ]);

//================================================================================
Route::get("/redirects", [HomeController::class, "redirects" ]);

//================================================================================
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
