<?php


use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
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

//Route::get('/', function () {
  //  return view('welcome');
//});
Auth::routes();

Route::group(['middleware' => 'auth'], function() {

//Route::get('/', 'DisplayController@index');

Route::get('/', [App\Http\Controllers\DisplayController::class,'index'])->name('main.index');

//出品登録
Route::get('/create_registration', [App\Http\Controllers\RegistrationController::class, 'createregistrationFrom'])->name('create.registration');
Route::post('/create_registration', [App\Http\Controllers\RegistrationController::class, 'createregistration']);

//出品登録画面へ
//Route::get('/registrations_form', [App\Http\Controllers\DisplayController::class, 'registrationsForm'])->name('registrations.form');

//出品登録後メインページへ
//Route::get('/registrations', [App\Http\Controllers\DisplayController::class, 'registrations'])->name('registrations.ok');

//購入画面へ
Route::get('/purchases_form', [App\Http\Controllers\DisplayController::class, 'purchasesForm'])->name('purchases.form');
//購入後メインページへ
Route::get('/purchases', [App\Http\Controllers\DisplayController::class, 'purchases'])->name('purchases.ok');
});




