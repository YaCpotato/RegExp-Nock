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
Route::get('/question', 'QuestionController@create')->name('question_create')->middleware('auth');
Route::get('/question', 'QuestionController@store')->name('question_store')->middleware('auth');
Route::get('/question', 'QuestionController@show')->name('question_show');
Route::get('/question', 'QuestionController@edit')->name('question_edit')->middleware('auth');
Route::get('/question', 'QuestionController@update')->name('question_update')->middleware('auth');
Route::get('/question', 'QuestionController@destroy')->name('question_destroy')->middleware('auth');

Route::get('/answer', 'AnswerController@index')->name('answer_index');
Route::get('/answer', 'AnswerController@create')->name('answer_create')->middleware('auth');
Route::get('/answer', 'AnswerController@store')->name('answer_store')->middleware('auth');
Route::get('/answer', 'AnswerController@show')->name('answer_show');
Route::get('/answer', 'AnswerController@edit')->name('answer_edit')->middleware('auth');
Route::get('/answer', 'AnswerController@update')->name('answer_update')->middleware('auth');
Route::get('/answer', 'AnswerController@destroy')->name('answer_destroy')->middleware('auth');

Route::get('/comment', 'CommentController@index')->name('comment_index');
Route::get('/comment', 'CommentController@create')->name('comment_create')->middleware('auth');
Route::get('/comment', 'CommentController@store')->name('comment_store')->middleware('auth');
Route::get('/comment', 'CommentController@show')->name('comment_show');
Route::get('/comment', 'CommentController@edit')->name('comment_edit')->middleware('auth');
Route::get('/comment', 'CommentController@update')->name('comment_update')->middleware('auth');
Route::get('/comment', 'CommentController@destroy')->name('comment_destroy')->middleware('auth');