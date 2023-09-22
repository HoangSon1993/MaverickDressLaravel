<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MyController;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('checklogin');

// Route::get('/khoahoc', function (){
//    echo 'Hello Word';
// });

// Route::get('/demo',function (){
//    echo 'demo';
// });

// Route::get('name/{name}/{age?}', function ($name, $age=20){
//    echo 'Helo '.$name;
//    echo '<br> Age: '.$age;
// })->where(['age'=> '[0-9]+']);

 //Dat ten
// Route::get('route/demo1', function (){
//    echo 'Hello route name';
// })->name('route-name');
// Route::get('get/route/name', function (){
//    echo '<a href=" '.route('route-name').' "> route name </a>';
//});

//Nhom Route bang group voi tien to prefix
//Route::prefix('admin/post')->group(function(){
//    Route::get('/',function() {
//        echo 'get post';
//    });
//
//    Route::get('/edit',function() {
//        echo 'get edit post';
//    });
//});

//Doi tuong Controller
//Route::get('goi-controller/{name}', [MyController::class,'getData']);
//
//Route::get('get-form',[MyController::class,'getForm']);
//Route::post('take_form',[MyController::class,'takeForm'])->name('take-form');
//
//Route::get('upload-file',[MyController::class,'uploadFile'])->name('upload-file');
//Route::post('handle-file',[MyController::class,'handleFile'])->name('handle-file');
//
//Route::prefix('admin')->group(function(){
//    Route::get('/home',[HomeController::class,'home'])->name('admin.home.home');
//    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('admin.home.dashboard');
//});

//Bắt đầu tai đây

Route::get('/',function (){
    return Redirect() -> route('web.home.home');
});
Route::get('home',[WebController::class, 'home'])->name('web.home.home');



Route::prefix('admin')->middleware('admin')->group(function (){
    Route::get('get-product',[WebController::class,'getProduct'])->name('admin.home.get-product');

    Route::get('create-product',[WebController::class,'createProduct'])->name('admin.home.create-product');
    Route::post('store-product',[WebController::class,'storeProduct'])->name('admin.home.store-product');

    Route::get('edit-product/{id}',[WebController::class,'editProduct'])->name('admin.home.edit-product');
    Route::put('update-product/{id}',[WebController::class,'updateProduct'])->name('admin.home.update-product');

    Route::get('delete-product/{id}',[WebController::class,'deleteProduct'])->name('admin.home.delete-product');

});
//CRED

//dang ky
Route::get('register',[AuthController::class,'showFormRegister'])->name('show-form-register');
Route::post('register',[AuthController::class,'register'])->name('register');
//dang nhap
Route::get('login',[AuthController::class,'showFormLogin'])->name('show-form-login');
Route::post('login',[AuthController::class,'login'])->name('login');

//Su dung middeware de xac minh dang nhap
Route::middleware('checklogin')->group(function(){
    //logout
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    //cap nhat profile
    Route::get('profile',[AuthController::class,'showProfile'])->name('show-profile');
    Route::put('profile',[AuthController::class,'profile'])->name('profile');
});







