<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;

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
    return redirect('/invite');
});

Route::get('/invite', 'SlackController@slackInvitePage');

Route::post('/invite', 'SlackController@sendInvitation')->name('send_invite');
