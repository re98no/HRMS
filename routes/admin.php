<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use DebugBar\DebugBar;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\ServiceProvider;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 'middleware'=>'guest:admin' لازم يكون غير مسجل الدخول عشان يفتح معاه هذا 
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function(){
    Route::get('login', [LoginController::class ,'show_login_view'])->name('admin.showlogin');
    Route::post('login',  [LoginController::class ,'login'])->name('admin.login');

});
// middleware'=>'auth:admin لازم يكون مسجل الدخول كادمن عشان يقدر يدخل هنا 
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function(){

Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
Route::get('/logout',[DashboardController::class,'logout'])->name('admin.logout');

});

Route::fallback(function(){

 return redirect()->route('admin.showlogin');
});



