<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Application_EventManager
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

require_once 'Application/EventManager/EventCollection.php';
require_once 'Application/EventManager/ListenerAggregate.php';

/**
 * @category   Zend
 * @package    Application_EventManager
 * @subpackage UnitTests
 * @group      Application_EventManager
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Application_EventManager_TestAsset_MockAggregate implements Application_EventManager_ListenerAggregate
{

    protected $listeners = array();
    public $priority;

    public function attach(Application_EventManager_EventCollection $events, $priority = null)
    {
        $this->priority = $priority;

        $listeners = array();
        $listeners[] = $events->attach('foo.bar', array( $this, 'fooBar' ));
        $listeners[] = $events->attach('foo.baz', array( $this, 'fooBaz' ));

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

    public function fooBar()
    {
        return __METHOD__;
    }

    public function fooBaz()
    {
        return __METHOD__;
    }
}
