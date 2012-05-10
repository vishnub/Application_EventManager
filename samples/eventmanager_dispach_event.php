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

unset($root, $library, $path);


$eventManager = new Application_EventManager_EventManager();

// attach an event to the global event manager
$eventManager->attach('users.add', function(Application_EventManager_Event $event) {
	$user = $event->getTarget();
	$message = "Adding a user: " . $user->userId;
	echo $message . PHP_EOL;
});

// trigger an event
$user = new stdClass();
$user->userId = 100;
$eventManager->trigger('users.add', $user);