<?php

require DOCROOT . 'fuel' . DS . 'libraries' . DS . 'Google' . DS . 'autoload.php';

define('APPLICATION_NAME', 'Meeting Room');
define('CREDENTIALS_PATH', DOCROOT . 'credentials_google.json');
define('CLIENT_SECRET_PATH', DOCROOT . 'test-6245ba73125d.json');


class Controller_Pc_Application extends Controller_Template
{
  public $template = 'pc/layout/application';

  protected $service;

  //-----------------------------------------------------------------------
  public function before() {
    parent::before();

    $this->template->title = 'GPS Vehicle';
    $this->template->headers = View::forge('pc/layout/headers');
    $this->template->footers = View::forge('pc/layout/footers');
  }

  //-----------------------------------------------------------------------
  protected function getClient() {
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
    $client->addScope(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfigFile(CLIENT_SECRET_PATH);
    $client->setAccessType('offline');

    // Load previously authorized credentials from a file.
    $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
    if (file_exists($credentialsPath)) {
      $accessToken = file_get_contents($credentialsPath);
    } else {
      // Request authorization from the user.
      $authUrl = $client->createAuthUrl();
      printf("Open the following link in your browser:\n%s\n", $authUrl);
      print 'Enter verification code: ';
      $authCode = trim(fgets(STDIN));

      // Exchange authorization code for an access token.
      $accessToken = $client->authenticate($authCode);

      // Store the credentials to disk.
      if(!file_exists(dirname($credentialsPath))) {
        mkdir(dirname($credentialsPath), 0700, true);
      }
      file_put_contents($credentialsPath, $accessToken);
      printf("Credentials saved to %s\n", $credentialsPath);
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
  protected function load_google_service() {

  }
}
