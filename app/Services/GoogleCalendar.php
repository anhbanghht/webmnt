<?php namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use DateTime;

class GoogleCalendar {

    protected $client;

    protected $service;

    function __construct() {
        $client_id = Config::get('google.client_id');
        $service_account_name = Config::get('google.service_account_name');
        $key_file_location = base_path() . Config::get('google.key_file_location');
        $client_secret = Config::get('google.client_secret');
        $key = Config::get('google.api_key');//you can use later

        $this->client = new \Google_Client();
        $this->client->setApplicationName("Application name");
        $this->client->setClientId($client_id);
        $this->client->setClientSecret($client_secret);
        $this->client->setDeveloperKey($key);
        $this->client->setScopes(array('https://www.googleapis.com/auth/calendar', 'https://www.googleapis.com/auth/calendar.readonly'));
        /* If we have an access token */
        if (Cache::has('service_token')) {
            $this->client->setAccessToken(Cache::get('service_token'));
        }

        $key = file_get_contents($key_file_location);
        $scopes = array('https://www.googleapis.com/auth/calendar', 'https://www.googleapis.com/auth/calendar.readonly');
        $cred = new \Google_Auth_AssertionCredentials(
            $service_account_name,
            $scopes,
            $key
        );

        $this->client->setAssertionCredentials($cred);
        if ($this->client->getAuth()->isAccessTokenExpired()) {
            $this->client->getAuth()->refreshTokenWithAssertion($cred);
        }
        Cache::forever('service_token', $this->client->getAccessToken());
        $this->service = new \Google_Service_Calendar($this->client);
    }

    public function get($calendarId)
    {
        $results = $this->service->calendars->get($calendarId);
        dd($results);
    }
    
    public function listEvents($calName, $optParams){
      $results = $this->service->events->listEvents($calName, $optParams);
      dd($results);
    }
	
	public function addEvent()
    {
        $service = new \Google_Service_Calendar($this->client);
        $event = new \Google_Service_Calendar_Event(array(
          'summary' => 'Google I/O 2015',
          'location' => '800 Howard St., San Francisco, CA 94103',
          'description' => 'A chance to hear more about Google\'s developer products.',
          'start' => array(
            'dateTime' => '2016-05-28T09:00:00-07:00',
            'timeZone' => 'America/Los_Angeles',
          ),
          'end' => array(
            'dateTime' => '2016-05-28T17:00:00-07:00',
            'timeZone' => 'America/Los_Angeles',
          ),
          'recurrence' => array(
            'RRULE:FREQ=DAILY;COUNT=2'
          ),
          'attendees' => array(
            array('email' => 'lpage@example.com'),
            array('email' => 'sbrin@example.com'),
          ),
          'reminders' => array(
            'useDefault' => FALSE,
            'overrides' => array(
              array('method' => 'email', 'minutes' => 24 * 60),
              array('method' => 'popup', 'minutes' => 10),
            ),
          ),
        ));
        
        $calendarId = 'primary';
        $event = $service->events->insert($calendarId, $event);
        printf('Event created: %s\n', $event->htmlLink);
    }

}