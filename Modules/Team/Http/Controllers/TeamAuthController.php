<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Team\Entities\TeamSetting;
use Brian2694\Toastr\Facades\Toastr;
class TeamAuthController extends Controller
{
    public function authenticate()
    {
       
        // $TeamsettingObj = new Teamsetting();
        $teamSettings = TeamSetting::first();
        $client_id = $teamSettings->client_id;
        $client_secret = $teamSettings->client_secret;
        $redirect_uri = $teamSettings->redirect_url;

        //  dd($redirect_uri);
        $scopes = 'openid profile email User.Read User.ReadBasic.All User.Read.All User.ReadWrite.All offline_access OnlineMeetings.ReadWrite Team.ReadBasic.All';
        // Include 'offline_access' scope
        $authorization_url = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize';
        // Step 3: Construct Authorization URL and Redirect User
        $authorization_params = array(
            'client_id' => $client_id,
            'redirect_uri' => $redirect_uri,
            'response_type' => 'code',
            'scope' => $scopes,
            'prompt' => 'consent',
        );
        $authorization_url = $authorization_url . '?' . http_build_query($authorization_params);
        // Redirect the user to the authorization URL
        // dd($authorization_url);
        return redirect($authorization_url);
    }


    // Step 2: Callback after Microsoft login - Obtain Access Token and Refresh Token
    public function callback(Request $request)
    {

        // $TeamsettingObj = new Teamsetting();
       
        $teamSettings = TeamSetting::first();
        $client_id = $teamSettings->client_id;
        $client_secret = $teamSettings->client_secret;
        $redirect_uri = $teamSettings->redirect_url;
        $authorization_code = $request->input('code');
        // dd($authorization_code);
        $token_url = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';
        $token_params = array(
            'grant_type' => 'authorization_code',
            'code' => $authorization_code,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
        );
        // Use PHP's cURL functions to get tokens
        $ch = curl_init($token_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $token_params);
        $token_response = curl_exec($ch);
        $token_data = json_decode($token_response, true);
        
        //   var_dump( $token_data);
        //   die;
        if (isset($token_data['error'])) {
            print_r($token_data['error']);
        } else {
            $access_token = $token_data['access_token'];
            $refresh_token = $token_data['refresh_token'];
            if (isset($refresh_token)) {

                $record = TeamSetting::find($teamSettings->id);
                $record->access_token = $access_token;
                $record->refresh_token = $refresh_token;
                $record->save();
                Toastr::success(trans('common.Operation successful'), trans('common.Success'));
              return  redirect('team/settings');
            } else {
                Toastr::error('Token Generation Failed', 'Failed');
               return redirect('team/settings');
            }
        }
        // Use the access token as needed...
    }

    public function refreshAccessToken()
    {
        $teamSettings = TeamSetting::find(1);
        if (!$teamSettings) {
            return ['error' => 'team_settings_missing', 'error_description' => 'Team settings not found.'];
        }

        $client_id = $teamSettings->client_id;
        $client_secret = $teamSettings->client_secret;
        // Use DB redirect_url (matches how the token was issued). Hardcoded live URL broke beta/local refresh.
        $redirect_uri = $teamSettings->redirect_url ?: 'https://merkaiixcelprep.com/auth/team';
        $refresh_token = $teamSettings->refresh_token;
        $token_url = $teamSettings->token_url ?: 'https://login.microsoftonline.com/common/oauth2/v2.0/token';

        if (empty($refresh_token) || empty($client_id) || empty($client_secret)) {
            return ['error' => 'team_credentials_missing', 'error_description' => 'Generate Tokens from Team Settings first.'];
        }

        $token_params = array(
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
        );

        $ch = curl_init($token_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $token_params);
        $token_response = curl_exec($ch);
        if (curl_errno($ch)) {
            $err = curl_error($ch);
            curl_close($ch);
            return ['error' => 'curl_error', 'error_description' => $err];
        }
        curl_close($ch);

        $token_data = json_decode($token_response, true);
        if (!is_array($token_data)) {
            return ['error' => 'invalid_token_response', 'error_description' => 'Empty or invalid token response.'];
        }

        // Persist rotated tokens when Microsoft returns new ones
        if (!empty($token_data['access_token'])) {
            $teamSettings->access_token = $token_data['access_token'];
            if (!empty($token_data['refresh_token'])) {
                $teamSettings->refresh_token = $token_data['refresh_token'];
            }
            $teamSettings->save();
        }

        return $token_data;
    }
}
