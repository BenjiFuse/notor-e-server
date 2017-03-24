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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('notes', 'NotesController');

// Register route doesn't validate token since it's not present yet
Route::post('register', 'ApiAuthController@register');
Route::post('login', 'ApiAuthController@authenticate');
Route::post('user', 'ApiAuthController@getAuthenticatedUser')->middleware('jwt.auth');
	
/*
Route::get('/', 'NotesController@index')->name('home');
Route::post('/notes/', 'NotesController@store');
Route::get('/notes/create', 'NotesController@create');
Route::delete('/notes/{note}', 'NotesController@destroy');
Route::patch('/notes/{note}', 'NotesController@update');
Route::get('/notes/{note}', 'NotesController@show');
Route::put('/notes/{note}', )*/

Route::get('/users/{user}', function(App\User $user) {
	return $user->email;
});
