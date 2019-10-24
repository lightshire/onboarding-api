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

Route::get('/organization/{id}', 'API\OrganizationController@getOrganization');


Route::middleware('auth:api')->group(function () {
    Route::get('/user', 'API\UserController@getUser');
    Route::get('/user/{id}', 'API\UserController@getAUser');
    Route::post('/user', 'API\UserController@saveUser');

    Route::get('/employees', 'API\UserController@getEmployees');

    Route::post('/checklist', 'API\ChecklistItemController@saveChecklistItem');
    Route::get('/checklist', 'API\ChecklistItemController@getChecklists');
    Route::delete('/checklist/{id}', 'API\ChecklistItemController@deleteItem');
});

