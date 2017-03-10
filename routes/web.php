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

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web']], function () {
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
    