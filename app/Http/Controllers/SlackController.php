<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SlackController extends Controller
{
    /** @var \GuzzleHttp\Client  */
    private $client;

    /** @var \Illuminate\Foundation\Application|mixed  */
    private $teamName;

    /**
     * SlackController constructor.
     */
    public function __construct()
    {
        $this->client = new GuzzleClient;
        $this->teamName = config('sitedata.slack_team_name');
    }

    /**
     * Show the invitation page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        return view('slack-invite', ['teamName' => $this->teamName]);
    }

    /**
     * Send invitation to user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendInvitation(Request $request)
    {
        $validation = $this->validation($request->all());

        $email = $request->input('email');

        if ($validation->fails()) {
            return back()->with('error', 'You must enter your email to proceed.');
        }

        try {
            $url = config('sitedata.slack_team_url') . '/api/users.admin.invite?t=' . time() . "&email={$email}";
            $url .= '&token=' . config('sitedata.slack_api.token') . '&set_active=true&_attempts=1';

            $this->client->request('POST', $url);

            return back()->with('success', "An invitation to your mail to join {$this->teamName} workspace.");
        } catch (GuzzleException $exception) {
            Log::error($exception->getMessage());

            return back()->with('error', 'An error occured while sending invitation, please try again.');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return back()->with('error', 'An error occured while sending invitation, please try again.');
        }
    }

    /**
     * Validate inputs.
     *
     * @param $inputs
     *
     * @return mixed
     */
    private function validation($inputs)
    {
        return Validator::make($inputs, ['email' => 'required|string|email|max:191']);
    }
}
