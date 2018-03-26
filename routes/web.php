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
    return view('welcome');
});

Route::post('/', function(Request $request) {
    $client = new Client;
    $validator = validator($request->all(), ['email' => 'required|string|email']);
    $email = $request->input('email');

    if ($validator->fails()) {
        return back()->with('error', 'You must enter your email to proceed!');
    } else {
        try {
            $client->request('POST',
                config('sitedata.slack_team_url').'/api/users.admin.invite?t='
                .time().'&email='.$email.'&token='.config('sitedata.slack_api_token')
                .'&set_active=true&_attempts=1');

            return redirect()->back()->with('success', "An invitation to your mail to join {env('SLACK_TEAM_NAME')} workspace.");
        } catch (\Exception $e) {
            abort(404);
            return back()->with('error', 'An error occured while sending invitation, please try again.');
        }
    }
});
