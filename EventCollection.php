<?php

/**
 * Main docblock
 *
 * PHP version 5
 *
 * @category  Collection
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
 * EventCollection responsibility is to handle subjects from observer pattern.
 *
 * @category Collection
 * @package  EventStrategy
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://www.breezeframework.com/thetrollinception.php
 */
class EventCollection extends EventSubjectAbstraction
{   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->_observers = new SplObjectStorage();
    }				
    
    /**
     * Get handlers back
     * 
     * @return object
     */
    public function getHandlers()
    {
        return (object) $this->_observers;
    }    
}
