<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/text/eksposisi', 'EksposisiController@index')->name('text.eksposisi');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource("users", "UserController");

Route::get('/questions/trash', 'QuestionController@trash')->name('questions.trash');
Route::post('/questions/{id}/restore', 'QuestionController@restore')->name('questions.restore');
Route::delete('/questions/{id}/delete-permanent', 'QuestionController@deletePermanent')->name('questions.delete-permanent');
Route::resource("questions", "QuestionController");

Route::resource('submissions', 'SubmissionController');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/edit-profile', 'ProfileController@edit')->name('profile.edit');

Route::get('/question', 'QuizController@startQuiz')->name('quiz.question')->middleware('auth');
Route::get('/test', 'QuizController@test')->middleware('auth');

Route::get('/result', function() {
    return view('quiz.result');
});
