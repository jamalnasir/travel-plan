<?php

namespace Nasir\MultiBank;

class Train extends JourneyStrip {

    private $seat;
    private $type = 'train';

    public function __construct($number, $seat, $from, $to) {
        $this->number = $number;
        $this->seat = $seat;
        $this->from = $from;
        $this->to = $to;
    }

    public function passDescription()
    {
        return 'Take train ' . $this->getNumber() . ' from ' . $this->getFrom() . ' to ' . $this->getTo() . '. Sit in seat ' . $this->getSeat() . '.';
    }

    protected function getNumber()
    {
        return $this->number;
    }

    protected function getFrom()
    {
        return $this->from;
    }

    protected function getTo()
    {
        return $this->to;
    }

    private function getSeat() {
        return $this->seat;
    }

    private function getType() {
        return $this->type;
    }
}