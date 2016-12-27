
<?php

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware'=>['web']],function(){
//every body views the welcome.blade.php view as it is the login file
Route::get('/', function () {
    return view('welcome');
});
//Route::get('/login','doctorsController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');


//patient controllers
Route::get('/patient/create','patientController@create');
Route::post('/patient/store','patientController@store');
Route::get('patient/{patient}/opd','patientController@opd');
Route::post('consultation/store','patientController@storeOpd');
Route::get('patient','patientController@index');


Route::get('consult','doctorsController@index');


});