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


//HOMECONTROLLER ROUTES
//================================================================================
Route::post("/addcard/{id}", [HomeController::class, "addcard" ]);

//================================================================================
Route::get("/showcard/{id}", [HomeController::class, "showcard" ]);

//================================================================================
Route::get("/remove/{id}", [HomeController::class, "remove" ]);

//================================================================================
Route::post("/orderconfirm", [HomeController::class, "orderconfirm" ]);

//================================================================================
Route::get("/home", [HomeController::class, "index" ]);

//================================================================================
Route::get("/redirects", [HomeController::class, "redirects" ]);

//quando escrevo /home na URL, vai para HomeController função index
//================================================================================
Route::get("/", [HomeController::class, "index" ]);




//ADMINCONTROLLER ROUTES
//================================================================================
Route::get("/users", [AdminController::class, "user" ]);

//================================================================================
Route::get("/deletemenu/{id}", [AdminController::class, "deletemenu" ]);

//================================================================================
Route::get("/updateview/{id}", [AdminController::class, "updateview" ]);

//================================================================================
Route::post("/update/{id}", [AdminController::class, "update" ]);

//================================================================================
Route::get("/foodmenu", [AdminController::class, "foodmenu" ]);

//================================================================================
Route::get("/orders", [AdminController::class, "orders" ]);

//================================================================================
Route::post("/uploadfood", [AdminController::class, "uploadfood" ]);

//================================================================================
Route::get("/deleteuser/{id}", [AdminController::class, "deleteuser" ]);

//================================================================================
Route::post("/reservation", [AdminController::class, "reservation" ]);

//================================================================================
Route::get("/viewreservation", [AdminController::class, "viewreservation" ]);

//================================================================================
Route::get("/viewchef", [AdminController::class, "viewchef" ]);

//================================================================================
Route::post("/uploadchef", [AdminController::class, "uploadchef" ]);

//================================================================================
Route::get("/updatechef/{id}", [AdminController::class, "updatechef" ]);

//================================================================================
Route::post("/updatefoodchef/{id}", [AdminController::class, "updatefoodchef" ]);

//================================================================================
Route::get("/deletechef/{id}", [AdminController::class, "deletechef" ]);



//================================================================================
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
