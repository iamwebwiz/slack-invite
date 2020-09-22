<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;

class SlackController extends Controller
{
    protected $client;
    protected $teamName;

    public function __construct()
    {
        $this->client = new GuzzleClient;
        $this->teamName = config('sitedata.slack_team_name');
    }

    public function slackInvitePage()
    {
        return view('slack-invite');
    }

    public function sendInvitation(Request $request)
    {
        $rules = ['email' => 'required|string|email'];
        $validator = validator($request->all(), $rules);
        $email = $request->input('email');

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'You must enter your email to proceed.');
        } else {
            try {
                $this->client->request(
                    'POST',
                    config('sitedata.slack_team_url') . '/api/users.admin.invite?t='
                        . time() . '&email=' . $email . '&token=' . config('sitedata.slack_api_token')
                        . '&set_active=true&_attempts=1'
                );

                return redirect()->back()->with('success', "An invitation to your mail to join {$this->teamName} workspace.");
            } catch (Exception $e) {
                // abort(404);
                return redirect()->back()->with('error', 'An error occured while sending invitation, please try again.');
            }
        }
    }
}
