<?php

namespace Api\Http\Controllers;

use Illuminate\Http\Request;
use Core\User\UserManager;
use Api\Api\Manager as ApiManager;

class SignInController extends Controller
{

	/**
	 * Sign in a ser
	 *
	 * @param Request $request
	 *
	 * @return response
	 */
	public function index(Request $request)
	{

		$ap = new ApiManager();
		$api_client = $ap->getFirstTokenClient();

        $client = new \GuzzleHttp\Client();

        try {
	        $response = $client->request('POST', env('APP_URL')."/api/v1/oauth/token", [
	            'form_params' => [
	                'scope' => '',
	                'grant_type' => 'password',
	                'username' => $request->input('username'),
	                'password' => $request->input('password'),
	                'client_id' => $api_client->id,
	                'client_secret' => $api_client->secret,
	            ],
	            'http_errors' => false
	        ]);
    	} catch (\Exception $e) {
    		return $this->error([]);
    	}

        $body = json_decode($response->getBody());

        if (isset($body->access_token))
            return $this->success(['data' => $body]);

        return $this->error(['message' => $body->error]);

	}

}
