<?php

require_once DOCROOT . 'fuel' . DS . 'libraries' . DS . 'Google' . DS . 'autoload.php';

define('CLIENT_SECRET_PATH', DOCROOT . 'google_client_secret.json');

class GoogleApi
{
  //-----------------------------------------------------------------------
  protected static function getClient() {
    $client = new Google_Client();
    $client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
    $client->addScope(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfigFile(CLIENT_SECRET_PATH);
    $client->setApprovalPrompt('force');
    $client->setAccessType('offline');
    $client->setRedirectUri('http://localhost/gps/');

    // Load previously authorized credentials from a file.
    if (!empty(Session::get('accessToken'))) {
      $accessToken = Session::get('accessToken');
    } else {
      // Request authorization from the user.
      $authUrl = $client->createAuthUrl();

      if (empty(Input::get('code'))) {
        $authUrl = $client->createAuthUrl();
        header("location: $authUrl");
        exit;
      } else {
        $authCode = Input::get('code'); // get authcode from google
      }

      // Exchange authorization code for an access token.
      $accessToken = $client->authenticate($authCode);

      Session::set('accessToken', $accessToken);
    }
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
      $client->refreshToken($client->getRefreshToken());
      file_put_contents($credentialsPath, $client->getAccessToken());
    }
    return $client;
  }

  //-----------------------------------------------------------------------
  public static function load_google_service() {
    $client = self::getClient();
    $service = new Google_Service_Calendar($client);
    return $service;
  }
}