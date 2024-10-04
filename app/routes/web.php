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
//購入機能
Route::get('/create_purchases', [App\Http\Controllers\RegistrationController::class, 'createpurchasesFrom'])->name('create.purchases');
Route::post('/create_purchases', [App\Http\Controllers\RegistrationController::class, 'createpurchases']);


//ユーザ編集画面
Route::get('/edit_form/{id}', [RegistrationController::class, 'editForm'])->name('edit.user');
Route::post('/edit_form/{id}',[RegistrationController::class, 'edit']);



//ユーザ退会
Route::get('/delete/{id}/delete', [RegistrationController::class, 'delete'])->name('delete.user');
Route::post('/delete_user/{id}/delete',[RegistrationController::class, 'deleteuser'])->name('delete.from');

//マイページへ
Route::get('/my_form', [App\Http\Controllers\DisplayController::class, 'myFrom'])->name('my.form');
//購入履歴
Route::get('/purchase_form', [App\Http\Controllers\DisplayController::class, 'purchaseFrom'])->name('purchase.form');


Route::get('/Delete_purchase/{id}/delete',[RegistrationController::class,'purchaseDelete'])->name('purchase.delete');


//ユーザアイコン画面へ
Route::get('/user_aicon', [App\Http\Controllers\DisplayController::class, 'useraicon'])->name('user.aicon');


//フォロー
  Route::post('/follow/{userId}', [ DisplayController::class, 'store']);


//出品一覧
Route::get('/listing_form', [App\Http\Controllers\RegistrationController::class, 'listingFrom'])->name('listing.from');


   //「like.jsファイルのurl:'ルーティング'」に書くものと合わせる。
  Route::post('/like',[App\Http\Controllers\RegistrationController::class, 'like'])->name('registrations.ajaxlike');

});

 // 管理者ユーザーのみ
 Route::group(['middleware' => ['auth', 'can:admin']], function () {
  Route::get('/admin', 'App\Http\Controllers\DisplayController@showAdminPage');
});

 



