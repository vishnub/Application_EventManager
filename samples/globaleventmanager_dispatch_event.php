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
require_once 'Application/EventManager/GlobalEventManager.php';

unset($root, $library, $path);


$eventManager = Application_EventManager_GlobalEventManager::getEventCollection();

// attach an event to the global event manager
$eventManager->attach('users.add', function(Application_EventManager_Event $event) {
	$message = "Adding a user: " . $event->getParam('id');
	echo $message . PHP_EOL;
});

// trigger an event
$eventManager->trigger('users.add', null, array('id' => 100));