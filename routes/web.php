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
});
Route::get('/about',function () {
    return view('halaman/about');
});
Route::get('/create_event',function () {
    return view('event/create_event'); 
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('todo', 'TodoController');
    Route::post('/todo/editItem', 'TodoController@editItem');
    Route::post('/todo/deleteItem', 'TodoController@deleteItem');
    Route::post('/todo/create', 'TodoController@create');
    Route::get('/todo/{id}/edit', 'TodoController@edit');
    Route::patch('/todo/{id}/update', 'TodoController@update');
    Route::resource('task', 'TasksController');
    Route::get('/plus', function () {
        return view('admin/admintask/plus');
    });
});

Route::group(['middleware' => ['web']], function (){
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
});

Route::get('/addItem', function () {
    return view('note/addItem');
});
Route::get('/adduser', function () {
    return view('admin/anggota/adduser');
});
Route::get('/addItem', function () {
    return view('admin/adminnote/addItem');
});
Route::get('/create_event',function () {
    return view('admin/adminevent/create_event'); 
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('note', 'notescontroller');
    Route::post('/note/editItem', 'notescontroller@editItem');
    Route::post('/note/deleteItem', 'notescontroller@deleteItem');
    Route::resource('event', 'EventsController');
    Route::post('/event/deleteItem', 'EventsController@deleteItem');
    Route::get('/event/coba','EventsController@coba');
    Route::get('/home', 'HomeController@index');
});

 Route::group(['middleware' => ['web']], function () {
    Route::get('/admin-auth/siswa', 'SiswaController@index');
    Route::get('/admin-auth/test', 'SiswaController@test');
    Route::get('/admin-home','AdminHomeController@index');
    Route::resource('anggota', 'AnggotaController');
    Route::post('/anggota/deleteItem', 'AnggotaController@deleteItem');
    Route::resource('/admintodo','AdminTodoController');
    Route::post('/admintodo/deleteItem', 'AdminTodoController@deleteItem');
    Route::resource('/adminevent','AdminEventController');
    Route::resource('/adminnote','AdminNoteController');
    Route::resource('/admintask','AdminTaskController');
    Route::post('/admintask/plus', 'AdminTaskController@create');
 });

    