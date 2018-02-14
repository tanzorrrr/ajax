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

Route::get('students','AjaxController@index');

Route::get('/student/read-data','AjaxController@readData');

Route::any('/student/store','AjaxController@store');

Route::post('/student/destroy','AjaxController@destroy');

Route::get('/student/edit','AjaxController@edit');

Route::post('/student/update','AjaxController@update');

Route::get('/student/pagination','AjaxController@pagination');

Route::get('/student/page/ajax','AjaxController@studentPage');

Auth::routes();

Route::get('/','WelcomeController@index');


/*
Route::group(['middleware'=>['auth']],function(){
    Route::resource('students','RcController');
});



Route::get('/student/delete/{id}','StudentController@delete');
/*
Route::get('/student/list','StudentController@index');
Route::get('/student/insert','StudentController@insert');
Route::get('/student/edit/{id}','StudentController@edit');
Route::post('/student/save','StudentController@save');
Route::post('/student/multi-delete','StudentController@multi_delete');
//Route::get('/student/edit',['as'=>'edit/student','users'=>'StudentController@edit']);



Route::get('/role/insert','RoleController@insert');

Route::get('/role/read/{id}','RoleController@read');


Route::get('/role/roleAll','RoleController@readall');*/





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
