<?php

namespace Nasir\MultiBank;

/**
 * AirPlane has all the required attributes and members needed for a boarding pass.
 *
 * AirPlane class is extending the JourneyStrip abstract class and implementing its parent members as well.
 *
 * Example usage:
 * $obj = new AirPlane($number, $seat, $from, $to, $gate, $counter);
 *
 * @author  Jamal Abdul Nasir
 * @version $Revision: 1.0 $
 * @access  public
 */
class AirPlane extends JourneyStrip {

    private $seat;
    private $gate;
    private $counter;
    private $type = 'airplane';

    /**
     * @param $number  string
     * @param $seat    string
     * @param $from    string
     * @param $to      string
     * @param $gate    string
     * @param $counter string
     */
    public function __construct($number, $seat, $from, $to, $gate, $counter) {
        $this->number = $number;
        $this->seat = $seat;
        $this->from = $from;
        $this->to = $to;
        $this->gate = $gate;
        $this->counter = $counter;
    }

    /**
     * This method put all the information together and return in a presentable format.
     *
     * @return string
     */
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