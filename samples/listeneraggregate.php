<?php

error_reporting(E_ALL);
set_time_limit(0);
ini_set('memory_limit', -1);
ini_set('display_errors', 1);

$root = realpath(dirname(dirname(__FILE__)));
$library = "$root/src";

$path = array($library, get_include_path());
set_include_path(implode(PATH_SEPARATOR, $path));

require_once 'Application/EventManager/EventManager.php';
require_once 'Application/EventManager/ListenerAggregate.php';

unset($root, $library, $path);



class SampleAggregate implements Application_EventManager_ListenerAggregate
{

	protected $listeners = array();
	public $priority;

	public function attach(Application_EventManager_EventCollection $events, $priority = null)
	{
		$this->priority = $priority;

		$listeners = array();
		$listeners[] = $events->attach('users.add', array( $this, 'usersAdd' ));

		$this->listeners[ spl_object_hash($events) ] = $listeners;

		return __METHOD__;
	}

	public function detach(Application_EventManager_EventCollection $events)
	{
		foreach ($this->listeners[ spl_object_hash($events) ] as $listener) {
			$events->detach($listener);
		}

		return __METHOD__;
	}

	public function usersAdd(Application_EventManager_Event $event)
	{
		$user = $event->getTarget();
		$message = "Adding a user: " . $user->userId;
		echo $message . PHP_EOL;
	}
}

$eventManager = new Application_EventManager_EventManager();

// attach an event to the global event manager
$eventManager->attachAggregate(new SampleAggregate());

// trigger an event
$user = new stdClass();
$user->userId = 100;
$eventManager->trigger('users.add', $user);
