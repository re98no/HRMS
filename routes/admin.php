<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Admin_panel_seetings;
use App\Http\Controllers\Admin\Admin_panel_settingController;
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
// middleware'=>'auth:admin لازم يكون مسجل الدخول كادمن عشان يقدر يدخل هنا 
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth:admin'],function(){

    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/logout',[DashboardController::class,'logout'])->name('admin.logout');
    // General Setting with out using resource
    Route::get('/generalSettings',[Admin_panel_settingController::class,'index'])->name('admin_panel_settings.index');
    
    });


// 'middleware'=>'guest:admin' لازم يكون غير مسجل الدخول عشان يفتح معاه هذا 
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function(){
    Route::get('login', [LoginController::class ,'show_login_view'])->name('admin.showlogin');
    Route::post('login',  [LoginController::class ,'login'])->name('admin.login');

});

 // في حالة البحث عن صفحة غير موجودة  وجهه الى 
Route::fallback(function(){
 return redirect()->route('admin.showlogin');
});



