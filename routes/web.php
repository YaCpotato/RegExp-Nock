<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/question', 'QuestionController@index')->name('question_index');
Route::get('/question_create', 'QuestionController@create')->name('question_create')->middleware('auth');
Route::post('/question_store', 'QuestionController@store')->name('question_store')->middleware('auth');
Route::get('/question_detail', 'QuestionController@show')->name('question_show');
Route::get('/question_edit', 'QuestionController@edit')->name('question_edit')->middleware('auth');
Route::put('/question_update', 'QuestionController@update')->name('question_update')->middleware('auth');
Route::delete('/question_destroy', 'QuestionController@destroy')->name('question_destroy')->middleware('auth');

Route::get('/answer_create', 'AnswerController@create')->name('answer_create')->middleware('auth');
Route::post('/answer_store', 'AnswerController@store')->name('answer_store')->middleware('auth');
Route::get('/answer_edit', 'AnswerController@edit')->name('answer_edit')->middleware('auth');
Route::put('/answer_update', 'AnswerController@update')->name('answer_update')->middleware('auth');
Route::delete('/answer_destroy', 'AnswerController@destroy')->name('answer_destroy')->middleware('auth');

// Route::get('/comment', 'CommentController@index')->name('comment_index');
// Route::get('/comment', 'CommentController@store')->name('comment_store')->middleware('auth');
// Route::get('/comment', 'CommentController@update')->name('comment_update')->middleware('auth');
// Route::get('/comment', 'CommentController@destroy')->name('comment_destroy')->middleware('auth');