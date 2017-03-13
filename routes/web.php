<?php

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
    return view('halaman/main');
});/*
Route::get('/dashboard', function () {
    return view('page/dashboard');
});
<Route::get('/main',function () {
    return view('halaman/main');
}); */
Route::get('/about',function () {
    return view('halaman/about');
});

Route::get('/login',function () {
    return view('halaman/login');
});

Route::get('/sign',function () {
    return view('halaman/sign');
});

Route::get('/create',function () {
    return view('todo/create'); 
});

Route::get('/plus',function () {
    return view('task/plus'); 
});

Route::get('/add',function () {
    return view('schedule/add'); 
});

Route::get('/tambah',function () {
    return view('outlines/tambah'); 
});

Route::get('/addItem',function () {
    return view('note/addItem'); 
});

Route::post('/register','registercontroller@store')->name('register');
Route::post('/login','logincontroller@store')->name('login');
Auth::routes();
Route::get('admin_login', 'AdminAuth\logincontroller@showLoginForm');
Route::post('admin_login', 'AdminAuth\logincontroller@login');
Route::post('admin_logout', 'AdminAuth\logincontroller@logout');
Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::get('admin_register', 'AdminAuth\RegisterController@register');

Route::group(['middleware' => ['web']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/admin_home', 'AdminHomeController@index');
    Route::resource('todo', 'TodoController');  
    Route::resource('schedule', 'schedulecontroller');
    Route::resource('note', 'notescontroller');
    Route::resource('outlines', 'outlinescontroller');
    Route::resource('task', 'TasksController');
    Route::post('/todo/editItem', 'TodoController@editItem');
    Route::post('/todo/deleteItem', 'TodoController@deleteItem');
    Route::post('/schedule/ubah', 'schedulecontroller@ubah');
    Route::post('/schedule/deleteItem', 'schedulecontroller@deleteItem');
    Route::post('/outlines/editItem', 'outlinescontroller@editItem');
    Route::post('/outlines/deleteItem', 'outlinescontroller@deleteItem');
    Route::post('/note/editItem', 'notescontroller@editItem');
    Route::post('/note/deleteItem', 'notescontroller@deleteItem');
    Route::resource('events', 'EventsController',['only' => ['index', 'store']]);
});
    