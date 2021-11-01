<?php

namespace Nasir\MultiBank;

class Planner {

    private $nextPoint;
    private $journey = [];
    private $fromLocations = [];
    private $toLocations = [];
    private $objectsToPlan = [];
    private $plannedObjects = [];

    public function __construct($journey) {

        $this->makeJourneyObject($journey);

    }

    public function showMyJourney() {

        foreach($this->plannedObjects as $journey) {
            $pass = PassFactory::create($journey);
            if(!empty($pass)) $this->journey[] = $pass->passDescription();
        }

        if(empty($this->journey)) $this->journey[] = 'Could not find any valid journey plan.';
        else $this->journey[] = 'You have arrived at your final destination.';
        return implode('<br>', $this->journey);

    }

    private function planTheJourney() {

        $this->nextPoint = $this->objectsToPlan[0];
        $this->plannedObjects[] = $this->nextPoint;

        foreach($this->objectsToPlan as $plan) {
            if(array_key_exists($this->nextPoint['to'], $this->fromLocations)) {
                $this->plannedObjects[] = $this->fromLocations[$this->nextPoint['to']];
                $this->nextPoint = $this->fromLocations[$this->nextPoint['to']];
            }

        }

    }

    private function makeJourneyObject($journey) {

        $this->objectsToPlan = json_decode($journey, true);

        shuffle($this->objectsToPlan);

        foreach($this->objectsToPlan as $plan) {
            $this->fromLocations[$plan['from']] = $plan;
            $this->toLocations[$plan['to']] = $plan;
        }

        $this->planTheJourney();

    }

}