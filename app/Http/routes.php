<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::group(['middleware' => 'auth', 'as' => 'admin.'], function() {
        Route::get('/admin', ['uses' => 'AdminController@index', 'as' => 'main']);
    });


    Route::get('/home', 'HomeController@index');

    //Test Controllers
    Route::get('/test/create', ['uses' => 'TestController@create', 'as' => 'test.create']);
    Route::post('/test/store', ['uses' => 'TestController@store', 'as' => 'test.store']);
    Route::get('/test/show/{id}', ['uses' => 'TestController@show', 'as' => 'test.show']);
    Route::post('/test/data', ['uses' => 'TestController@data', 'as' => 'test.data']);
    //Questions Controllers
    Route::get('/question/create', ['uses' => 'QuestionController@create', 'as' => 'question.create']);
    Route::post('/question/store', ['uses' => 'QuestionController@store', 'as' => 'question.store']);
    Route::post('/question/list', ['uses' => 'QuestionController@showList', 'as' => 'question.list']);

    //Answers Controllers
    Route::get('/answer/create', ['uses' => 'AnswerController@create', 'as' => 'answer.create']);
    Route::post('/answer/store', ['uses' => 'AnswerController@store', 'as' => 'answer.store']);

});
