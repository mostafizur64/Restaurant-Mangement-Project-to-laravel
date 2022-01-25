<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//all HomeController route are here
Route::get('/', [HomeController::class, 'index']);
Route::get('/redirects', [HomeController::class, 'redirects']);
Route::post('/addtocard/{id}', [HomeController::class, 'addtocard']);
Route::get('/showcart/{id}', [HomeController::class, 'showcart']);
Route::get('/removecart/{id}', [HomeController::class, 'removecart']);
Route::post('/orderconfirm', [HomeController::class, 'orderconfirm']);



//admin route are here=================
Route::get('/user', [AdminController::class, 'userlist']);
Route::get('/deleteuser/{id}', [AdminController::class, 'Deleteuser']);
Route::get('/foodmenu', [AdminController::class, 'Foodmenu']);
Route::post('/uploadfood', [AdminController::class, 'Uploadfood']);
Route::get('/editfood', [AdminController::class, 'editfood']);
Route::get('/deletefood/{id}', [AdminController::class, 'deletefood']);
Route::get('/editfood/{id}', [AdminController::class, 'editfood']);
Route::post('/updatefood/{id}', [AdminController::class, 'updatefood']);
Route::post('/reservation', [AdminController::class, 'reservation']);
Route::get('/reservation', [AdminController::class, 'viewreservation']);
Route::get('/adminchefs', [AdminController::class, 'adminchefs']);
Route::post('/uploadchefs', [AdminController::class, 'Uploadchefs']);
Route::get('/editchef/{id}', [AdminController::class, 'editchef']);
Route::post('/updatechef/{id}', [AdminController::class, 'updatechef']);
Route::get('/deletechef/{id}', [AdminController::class, 'deletechef']);


Route::get('/order', [AdminController::class, 'order']);
Route::get('/search', [AdminController::class, 'search']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
