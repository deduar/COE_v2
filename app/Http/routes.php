<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('setLocale/{locale}', function($locale){
	Session::put('locale', $locale);
	App::setLocale($locale);
	return back();
})->name('setLocale');

Route::get('/', function () {
	App::setLocale(Session::get('locale'));
    return view('welcome');
})->name('welcome');

Route::get('home', function(){
	App::setLocale(Session::get('locale'));
	if(Auth::guest()){
		return Redirect::to('auth/login');
	} else {
		//return Redirect::to('user/profile');
		return Redirect::to('experiences');
	}
})->name('home');

// Authentication routes... Auth
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('login');
Route::post('auth/login', 'Auth\AuthController@postLogin')->name('login');
Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('logout');

// Registration routes... Auth
Route::get('auth/register', 'Auth\AuthController@getRegister')->name('register');
Route::post('auth/register', 'Auth\AuthController@postRegister')->name('ŕegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail')->name('getemail');
Route::post('password/email', 'Auth\PasswordController@postEmail')->name('postemail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset')->name('getreset');
Route::post('password/reset', 'Auth\PasswordController@postReset')->name('postreset');

// UsersController routes
Route::get('/user/profile', 'Users\UsersController@showProfile')->name('user_profile');
Route::get('/user/editProfile', 'Users\UsersController@editProfile')->name('edit_profile');
Route::post('/user/updateProfile','Users\UsersController@updateProfile')->name('update_profile');
Route::post('/user/uploadAvatar', 'Users\UsersController@uploadAvatar')->name('upload_avatar');
Route::get('/user/changePassword','Users\UsersController@editPassword')->name('edit_password');
Route::post('/user/changePassword','Users\UsersController@updatePassword')->name('update_password');
Route::get('/user/inviteFriend', 'Users\UsersController@inviteFriend')->name('invite_friend');

Route::get('/user/resend', 'Users\UsersController@resend')->name('resend');
Route::get('/user/verify/{register_code}', 'Users\UsersController@verify')->name('verify');

// Experience
Route::get('/experiences', 'Experiences\ExperiencesController@index')->name('experience_index');
Route::get('/experience', 'Experiences\ExperiencesController@myexps')->name('my_experience');
Route::get('/experience/create', 'Experiences\ExperiencesController@create')->name('experience_create');
Route::post('/experience/create', 'Experiences\ExperiencesController@store')->name('experience_store');
Route::get('/experience/edit/{id}', 'Experiences\ExperiencesController@edit')->name('experience_edit');

// Reservation
Route::get('/reservation', 'Reservation\ReservationController@index')->name('reservation');
Route::get('/reservation/{id}', 'Reservation\ReservationController@create')->name('reservation_create');
Route::post('/reservation/store', 'Reservation\ReservationController@store')->name('reservation_store');
Route::get('/reservation/waiting/0', 'Reservation\ReservationController@waiting')->name('reservation_waiting');
Route::get('/reservation/collection/0', 'Reservation\ReservationController@collection')->name('collection');
Route::get('/reservation/transacionLog/0', 'Reservation\ReservationController@transactionLog')->name('transaction_log');
Route::get('/reservation/cancel/{id}', 'Reservation\ReservationController@Cancel')->name('reservation_canceed');
Route::get('/reservation/reject/{id}', 'Reservation\ReservationController@Reject')->name('reservation_rejected');

// Messages
Route::get('/messages', 'Messages\MessagesController@index')->name('messages');


