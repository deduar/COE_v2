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

Route::get('/', 'Experiences\ExperiencesController@welcome')->name('welcome');

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
Route::get('/user/show', 'Users\UsersController@show')->name('user_show');

// Experience
Route::get('/experiences', 'Experiences\ExperiencesController@index')->name('experience_index');
Route::get('/experience', 'Experiences\ExperiencesController@myexps')->name('my_experience');
Route::get('/experience/create', 'Experiences\ExperiencesController@create')->name('experience_create');
Route::post('/experience/create', 'Experiences\ExperiencesController@store')->name('experience_store');
Route::get('/experience/edit/{id}', 'Experiences\ExperiencesController@edit')->name('experience_edit');
Route::get('/experience/{id}', 'Experiences\ExperiencesController@show')->name('experience_show');
Route::post('/experience/update', 'Experiences\ExperiencesController@update')->name('experience_update');
Route::get('/experience/remove_img/{id}', 'Experiences\ExperiencesController@remove_img')->name('remove_img');

// Reservation
Route::get('/reservation', 'Reservation\ReservationController@index')->name('reservation');
Route::get('/reservation/{id}', 'Reservation\ReservationController@create')->name('reservation_create');
Route::post('/reservation/store', 'Reservation\ReservationController@store')->name('reservation_store');
Route::get('/reservation/waiting/0', 'Reservation\ReservationController@waiting')->name('reservation_waiting');
Route::get('/reservation/collection/0', 'Reservation\ReservationController@collection')->name('collection');
Route::get('/reservation/transacionLog/0', 'Reservation\ReservationController@transactionLog')->name('transaction_log');
Route::get('/reservation/cancel/{id}', 'Reservation\ReservationController@Cancel')->name('reservation_canceed');
Route::get('/reservation/reject/{id}', 'Reservation\ReservationController@Reject')->name('reservation_rejected');
Route::get('/reservation/accept/{id}', 'Reservation\ReservationController@Accept')->name('reservation_accepted');
Route::get('/reservation/pay_tansfer/{id}', 'Reservation\ReservationController@PayTransfer')->name('reservation_payTransfer');

// Messages
Route::get('/messages', 'Messages\MessagesController@index')->name('messages');

// Admin (backend)
Route::get('/admin', 'Admin\AdminController@index')->name('admin');
Route::get('/admin/users', 'Admin\AdminController@users')->name('admin_users');
Route::get('/admin/promoveAdmin/{id}', 'Admin\AdminController@promoveAdmin')->name('promove_admin');
Route::get('/admin/changeStatus/{id}', 'Admin\AdminController@changeStatus')->name('change_active');
Route::get('/admin/experiences', 'Admin\AdminController@experiences')->name('admin_experiences');

Route::get('/admin/currency', 'Admin\CurrencyController@index')->name('admin_currency');
Route::get('/admin/currency/changeStatus/{id}', 'Admin\CurrencyController@changeStatusCurrency')->name('change_cur_active');
Route::get('/admin/currency/create', 'Admin\CurrencyController@create')->name('admin_currency_create');
Route::post('/admin/currency/store', 'Admin\CurrencyController@store')->name('admin_currency_store');
Route::get('/admin/currency/edit/{id}', 'Admin\CurrencyController@edit')->name('admin_currency_edit');
Route::post('/admin/currency/update', 'Admin\CurrencyController@update')->name('admin_currency_update');
