<?php

namespace Nasir\MultiBank;


/**
 * Train has all the required attributes and members needed for a boarding pass.
 *
 * Train class is extending the JourneyStrip abstract class and implementing its parent members as well.
 *
 * Example usage:
 * $obj = new Train($number, $seat, $from, $to);
 *
 * @author  Jamal Abdul Nasir
 * @version $Revision: 1.0 $
 * @access  public
 */
class Train extends JourneyStrip {

    private $seat;
    private $type = 'train';

    /**
     * @param $number string
     * @param $seat string
     * @param $from string
     * @param $to string
     */
    public function __construct($number, $seat, $from, $to) {
        $this->number = $number;
        $this->seat = $seat;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * This method put all the information together and return in a presentable format.
     *
     * @return string
     */
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