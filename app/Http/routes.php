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

Route::get('/', 'Front\HomeController@getIndex');

Route::controller('auth', 'Front\Auth\AuthController');
Route::controller('profile', 'Front\Auth\ProfileController');
Route::controller('password', 'Front\Auth\PasswordController');

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

Route::group(['name' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@get']);
    Route::controller('domain', 'Admin\DomainController');
    Route::controller('class', 'Admin\ClassController');
    Route::controller('question', 'Admin\QuestionController');
    Route::controller('chapter', 'Admin\ChapterController');
    Route::controller('level', 'Admin\LevelController');
    Route::controller('level', 'Admin\LevelController');
    Route::controller('user', 'Admin\UserController');
    Route::controller('test', 'Admin\TestController');
});

Route::group(['name' => 'API', 'prefix' => 'api/v1'], function () {
    Route::get('user', 'Admin\ApiController@getUser');
    Route::get('domain', 'Admin\ApiController@getDomain');
    Route::get('class', 'Admin\ApiController@getClass');
    Route::get('chapter', 'Admin\ApiController@getChapter');
    Route::get('question', 'Admin\ApiController@getQuestion');
    Route::get('level', 'Admin\ApiController@getLevel');
    Route::get('answer', 'Admin\ApiController@getAnswer');
    Route::post('answer/create', 'Admin\ApiController@createAnswer');
    Route::post('answer/update/{id}', 'Admin\ApiController@updateAnswer');
    Route::get('answer/delete/{id}', 'Admin\ApiController@deleteAnswer');
    Route::get('test', 'Admin\ApiController@getTest');
    Route::post('test/add-question', 'Admin\ApiController@addQuestionToTest');
    Route::get('check/{id}/{check}', 'Admin\ApiController@checkDelete');
    Route::post('upload', 'Admin\ApiController@upload');
});

Route::group(['name' => 'test'], function () {
    Route::get('test', 'Front\Test\TestController@index');
    Route::post('end-example', 'Front\Test\TestController@end');
    Route::get('start-example', 'Front\Test\TestController@start');
});
