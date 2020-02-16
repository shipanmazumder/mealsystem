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
    return view('inc.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource("bazar",'BazarController')->except([
        'create','update'
    ]);
    Route::resource("meals",'MealController')->except([
        'create','update'
    ]);
    Route::resource("maintenance",'MaintenanceController')->except([
        'create','update'
    ]);
    Route::get("/success/{last_id}","BazarController@success")->name("success");
    Route::get("/maintenancesuccess/{last_id}","MaintenanceController@success")->name("maintenancesuccess");
    Route::get("/mealsuccess/{last_id}","MealController@success")->name("mealsuccess");

    Route::get("/reports","ReportController@index");
    Route::post("/reports","ReportController@searchReports");
});