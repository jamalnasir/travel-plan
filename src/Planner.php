<?php

namespace Nasir\MultiBank;

class Planner {

    private $journey;
    private $objectsToPlan = [];

    public function __construct($journey) {

        $this->makeJourneyObject($journey);

    }

    public function planMyJourney() {

        foreach($this->journey as $journey) {
            $pass = PassFactory::create($journey);
            if(!empty($pass)) $this->objectsToPlan[] = $pass;
        }

        return $this->objectsToPlan;

    }

    private function makeJourneyObject($journey) {

        $this->journey = json_decode($journey, true);

    }

}