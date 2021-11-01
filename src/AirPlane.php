<?php

namespace Nasir\MultiBank;

class AirPlane extends JourneyStrip {

    private $seat;
    private $gate;
    private $counter;
    private $type = 'airplane';

    public function __construct($number, $seat, $from, $to, $gate, $counter) {
        $this->number = $number;
        $this->seat = $seat;
        $this->from = $from;
        $this->to = $to;
        $this->gate = $gate;
    }

    public function passDescription()
    {
        return 'From ' . $this->getFrom() . ', take ' . $this->getNumber() . ' to ' . $this->getTo() . '. Gate ' . $this->getGate() . ', seat ' . $this->getSeat();
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

    private function getCounter() {
        return $this->counter;
    }

    private function getGate() {
        return $this->gate;
    }
}