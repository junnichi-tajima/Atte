<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;
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

Route::get('/',[AttendanceController::class,'index'])->middleware(['auth'])->name('index');
Route::post('/start',[AttendanceController::class,'start']);
Route::post('/end',[AttendanceController::class,'end']);

Route::post('/rest/start',[RestController::class,'start']);
Route::post('/rest/end',[RestController::class,'end']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
