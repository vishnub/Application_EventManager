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
 * @subpackage UnitTest
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

require_once 'Application/EventManager/SharedEventCollection.php';

/**
 * Interface to automate setter injection for a SharedEventCollection instance
 *
 * @category   Zend
 * @package    Application_EventManager
 * @subpackage UnitTest
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
interface Application_EventManager_SharedEventCollectionAware
{
    /**
     * Inject an EventManager instance
     * 
     * @param  Application_EventManager_SharedEventCollection $sharedEventCollection 
     * @return Application_EventManager_SharedEventCollectionAware
     */
    public function setSharedCollections(Application_EventManager_SharedEventCollection $sharedEventCollection);
}
