<?php

namespace Nasir\MultiBank;

abstract class JourneyStrip {

    protected $number;
    protected $from;
    protected $to;

    public function __construct() {
        echo 'You are here...';
    }

    abstract public function passDescription();

    abstract protected function getNumber();

    abstract protected function getFrom();

    abstract protected function getTo();


}