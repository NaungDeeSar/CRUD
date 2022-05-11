<?php

use App\Postion;
use App\Department;
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

//user auth
Auth::routes();

//admin user
Route::get('admin/login','Auth\AdminLoginController@showLoginForm');
Route::post('admin/login','Auth\AdminLoginController@login')->name('admin.login');
Route::post('admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');

Route::prefix('admin')->name('admin.')->namespace('Backend')->group(function(){    
    Route::get('/','PageController@home')->name('home');
   Route::resource('/admin-dep', 'DepartmentController');
   Route::resource('/position', 'PositionController');
   Route::resource('/user', 'UserController');
});

Route::get('/position/{id}',function($id){
    $position = Postion::where('dep_id',$id)->get();
    return response()->json($position);
});
//user 
Route::get('/', 'frontend\PageController@home');




