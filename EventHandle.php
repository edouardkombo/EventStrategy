<?php

/**
 * Main docblock
 *
 * PHP version 5
 *
 * @category  Handle
 * @package   EventStrategy
 * @author    Edouard Kombo <edouard.kombo@gmail.com>
 * @copyright 2013-2014 Edouard Kombo
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   GIT: 1.0.0
 * @link      http://www.breezeframework.com/thetrollinception.php
 * @since     1.0.0
 */
namespace TTI\EventStrategy;

use TTI\AbstractFactory\EventSubjectAbstraction;

/**
 * EventHandle responsibility is to handle event storage container.
 *
 * @category Handle
 * @package  EventStrategy
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://www.breezeframework.com/thetrollinception.php
 */
class EventHandle extends EventSubjectAbstraction
{   
    /**
     *
     * @var array $_events 
     */
    private $_events = array();
    
    /**
     *
     * @var type 
     */
    private static $_instance;
    
    /**
     * Count number of events
     * 
     * @return integer
     */
    public function count()
    {
        return (integer) count($this->_events);
    }
    
    /**
     * Create event
     * 
     * @param string $eventName Name of the event
     * 
     * @return object
     */
    public function createEvent($eventName)
    {
        $this->_events[$eventName] = new \TTI\EventStrategy\EventCollection();
        
        return (object) $this->_events[$eventName];
    }	

    /**
     * Magic method
     * 
     * @param mixed $key Key
     * 
     * @return object
     */
    public function __get($key)
    {		   
        if (!isset($this->_events[$key])) {
            $this->createEvent($key);
        }
        
        return $this->_events[$key];
    }
    
    /**
     * Get Events names
     * 
     * @return array
     */
    public function getEventsNames()
    {
        return (array) array_keys($this->_events);
    }			
    
    /**
     * Get all events
     * 
     * @return array
     */
    public function getEvents()
    {
        return (array) $this->_events;
    }
    
    public static function instance(){
        if(self::$_instance === NULL){
            self::$_instance = new events();
        }
        return self::$_instance;
    }   
}
