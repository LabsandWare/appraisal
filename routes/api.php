<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group( function ()
{
    # code...
    Route::post('login/','Auth\LoginController@authenticate');
    Route::post('signup/','Auth\RegisterController@adduser');

    Route::middleware('auth:api')->group( function ()
    {
        # code...
        Route::post('supervisor','SupervisorCtrl@create');
        Route::get('supervisor', 'SupervisorCtrl@index');
        Route::get('supervisor/{id}', 'SupervisorCtrl@show');
        Route::put('supervisor/{id}', 'SupervisorCtrl@update');
        Route::delete('supervisor/{id}', 'SupervisorCtrl@destroy');

        Route::post('emplpoyee','EmployeeCtrl@create');
        Route::get('emplpoyee', 'EmployeeCtrl@index');
        Route::get('emplpoyee/{id}', 'EmployeeCtrl@show');
        Route::put('emplpoyee/{id}', 'EmployeeCtrl@update');

        Route::post('appraisal','AppraisalCtrl@create');
        Route::get('appraisal', 'AppraisalCtrl@index');
        Route::get('appraisal/{id}', 'AppraisalCtrl@show');
        Route::put('appraisal/{id}', 'AppraisalCtrl@update'); 

        Route::put('sendmail', 'SendMailCtrl@multiplemail'); 

        Route::post('logout', 'Auth\LoginController@logout');

    });

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
