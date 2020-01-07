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

// Route::get('/', function () {
//     return view('question.queIndex');
// });
Route::get('/about', function () {
    return view('about');
})->name('about');



Route::get('/','QuestionsController@index');

// Route::get('/questions','QuestionsController@index');
// Route::get('question/create','QuestionsController@create')->name('question.create');
// Route::get('question/{question}/edit','QuestionsController@edit')->name('question.edit');
// Route::post('question/store','QuestionsController@store')->name('question.store');
// Route::patch('question/{question}','QuestionsController@update')->name('question.update');

Route::resource('question','QuestionsController');
Route::resource('tag','TagsController');

Route::get('tag/{tag}','QuestionsController@tag')->name('question.tag');

//Route::resource('answer','AnswersController');
Route::post('answer/{question_id}','AnswersController@store')->name('answer.store');
Route::post('reply/{answer_id}','ReplyController@store')->name('reply.store');


Route::get('profile/{profile}','ProfileController@show')->name('profile.show');

Route::post('/profile/update/{profile_id}','ProfileController@bioupdate')->name('profile.bioupdate');
Route::patch('/profile/update/{profile_id}','ProfileController@professionupdate')->name('profile.professionupdate');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
