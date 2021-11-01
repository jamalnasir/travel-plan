<?php

namespace Nasir\MultiBank;

/**
 * JourneyString is an abstract class which forces its child classes to implemented its abstract members
 *
 * JourneyString is a class that has no real actual code, but merely
 * exists to help provide child classes with its attributes and signature of methods to implement.
 *
 * Example usage:
 * Direct usage of this class is prohibited because this is an abstract class. Its attributes and members can be accessed via child classes.
 *
 * @author  Jamal Abdul Nasir
 * @version $Revision: 1.0 $
 * @access  none
 *
 */

abstract class JourneyStrip {

    protected $number;
    protected $from;
    protected $to;

    public function __construct() {
    }

    /**
     * This method put all the information together and return in a presentable format.
     *
     * @return string
     */
    abstract protected function passDescription();

    /**
     * This method get the number on the pass provided
     *
     * @return string
     */
    abstract protected function getNumber();

    /**
     * This method get the FROM location from pass provided
     *
     * @return string
     */
    abstract protected function getFrom();

    /**
     * This method get the TO location from the pass provided
     *
     * @return string
     */
    abstract protected function getTo();


}