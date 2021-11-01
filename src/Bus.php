<?php

namespace Nasir\MultiBank;

class Bus extends JourneyStrip {

    private $seat;
    private $type = 'bus';

    public function __construct($number, $seat, $from, $to) {
        $this->number = $number;
        $this->seat = $seat;
        $this->from = $from;
        $this->to = $to;
    }

    public function passDescription()
    {
        $seat = $this->getSeat();
        return 'Take the airport bus from ' . $this->getFrom() . ' to ' . $this->getTo() . ' Airport. ' . (empty($seat) ? 'No seat assignment.' : 'Sit in seat ' . $this->getSeat());
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
}