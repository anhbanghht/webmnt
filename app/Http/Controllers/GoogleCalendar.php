<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class GoogleCalendar extends Controller{
	
	protected $service;
	
	public function __construct()
	{
		$this->getConnect();
	}
    public function getConnect(){
        
        $id = 'b315faebbed1ac7104c8df7afa2afb06de5d7031';
        $account = 'chienbinhbattuyeudoidentoi1992@gmail.com';
        $private_key = file_get_contents('resources/assets/Doan-b315faebbed1.p12');
        
        $calName = 'ke4i8ih8djvfic1g9b9vji9dh8@group.calendar.google.com';
        $calName = 'primary';        
        $client = new \Google_Client();
        $client->setApplicationName("doan-1302");
        
        $this->service = new \Google_Service_Calendar($client);
        
        $client_email = 'doan-test@doan-1302.iam.gserviceaccount.com';
        $private_key = file_get_contents('resources/assets/Doan-b315faebbed1.p12');
        $scopes = array('https://www.googleapis.com/auth/calendar','https://www.googleapis.com/auth/calendar.readonly');
        $credentials = new \Google_Auth_AssertionCredentials(
            $client_email,
            $scopes,
            $private_key
        );
        $client->setAssertionCredentials($credentials);
    }
	public function getEvent($event_id)
	{
		$event = $this->service->events->get('primary', $event_id);
		return $event;
	}
	
    public function createEvent($summary,$location,$description,$start_date,$end_date,$attendees)
	{
		$event = new \Google_Service_Calendar_Event(array(
          'summary' => $summary,
          'location' => $location,
          'description' => $description,
          'start' => array(
            'dateTime' => $start_date,
            'timeZone' => 'Asia/Bangkok',
          ),
          'end' => array(
            'dateTime' => $end_date,
            'timeZone' => 'Asia/Bangkok',
          ),
          'recurrence' => array(
            'RRULE:FREQ=DAILY;COUNT=1'
          ),
          'attendees' => $attendees,
          'reminders' => array(
            'useDefault' => FALSE,
            'overrides' => array(
              array('method' => 'email', 'minutes' => 24 * 60),
              array('method' => 'popup', 'minutes' => 10),
            ),
          ),
        ));
        
        $calendarId = 'primary';
        $event = $this->service->events->insert($calendarId, $event);
        return $event->id;
    }
	
	public function deleteEvent($event_id)
	{
		$this->service->events->delete('primary', $event_id);
	}
	
	
}