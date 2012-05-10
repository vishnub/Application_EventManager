Application_EventManager
========================

Standalone version the EventManager found in Zend Framework 1.12


The project requires:
==============================

* PHP >= 5.3
* Zend Framework 1.11+


Quick Example:
==============================


```php
<?php
require_once 'Application/EventManager/EventManager.php';
require_once 'Application/EventManager/GlobalEventManager.php';

$eventManager = Application_EventManager_GlobalEventManager::getEventCollection();

$eventManager->attach('users.add', function(Application_EventManager_Event $event) {
	$message = "Adding a user: " . $event->getParam('id');
	echo $message . PHP_EOL;
});



$eventManager->trigger('users.add', null, array('id' => 100));

?>
```
[![Build Status](https://secure.travis-ci.org/aporat/Application_EventManager.png)](http://travis-ci.org/aporat/Application_EventManager)
