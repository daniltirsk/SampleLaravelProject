<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Phone;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\UserController;

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

Route::get('/registerform', [UserController::class, 'displayRegisterForm']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/loginform', [UserController::class, 'displayLoginForm']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/', function () {
    return redirect('/contacts');
});

Route::get('/contacts', [PhoneController::class, 'show']);

Route::get('/editphoneform/{id}', [PhoneController::class, 'displayEditForm']);
Route::post('/editphone', [PhoneController::class, 'edit']);
Route::post('/addphone', [PhoneController::class, 'add']);
Route::delete('/deletephone/{id}',[PhoneController::class, 'delete']);