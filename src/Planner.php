<?php

namespace Nasir\MultiBank;

/**
 * Planner class is responsible for processing the json object provided and planning a whole journey from start to end.
 *
 * Planner class is the class which should be use to communicate with other modules.
 *
 * Example usage:
 * $obj = new Planner($jsonObject);
 *
 * @author  Jamal Abdul Nasir
 * @version $Revision: 1.0 $
 * @access  public
 */
class Planner {

    private $nextPoint;
    private $journey = [];
    private $fromLocations = [];
    private $toLocations = [];
    private $objectsToPlan = [];
    private $plannedObjects = [];

    /**
     * @param $journey json
     */
    public function __construct($journey) {

        $this->makeJourneyObject($journey);

    }

    /**
     * This method is responsible for return the processed journey in a presentable format.
     *
     * @return string
     */
    public function showMyJourney() {

        // ITERATE THROUGH THE PLANNED OBJECTS OR SEQUENCED LOCATIONS
        foreach($this->plannedObjects as $journey) {

            // CALL THE FACTORY CLASS TO CREATE AN APPROPRIATE OBJECT BASED ON THE PASS PROVIDED.
            $pass = PassFactory::create($journey);

            // STORE THE TRAVEL DESCRIPTION CREATED FROM THE FACTORY CLASS INTO THE JOURNEY ARRAY
            if(!empty($pass)) $this->journey[] = $pass->passDescription();
        }

        if(empty($this->journey)) $this->journey[] = 'Could not find any valid journey plan.';
        else $this->journey[] = 'You have arrived at your final destination.';

        // RENDER THE JOURNEY IN PRESENTABLE FORMAT
        return implode('<br>', $this->journey);

    }

    /**
     * This method is responsible for planning the journey from a shuffled object into a sequential expedition
     *
     * @return void
     */
    private function planTheJourney() {

        // SETTING THE NEXTPOINT OBJECT. IN THIS CASE IT IS THE FIRST LOCATION AS THIS IS THE FIRST ITERATION
        $this->nextPoint = $this->objectsToPlan[0];

        // THIS ARRAY STORES ALL THE PLANNED OR SEQUENCED PASS OBJECTS
        $this->plannedObjects[] = $this->nextPoint;

        foreach($this->objectsToPlan as $plan) {

            // CHECKING THE TO LOCATION FROM THE CURRENT OBJECT INSIDE THE FROM ARRAY OF LOCATIONS. IT WILL SATISFY THE CONDITION IF IT EXISTS.
            if(array_key_exists($this->nextPoint['to'], $this->fromLocations)) {

                // STORE THE OBJECT TO THE PLANNED OBJECTS ARRAY AS THIS WILL BE THE NEXT DESTINATION
                $this->plannedObjects[] = $this->fromLocations[$this->nextPoint['to']];

                // STORE THE FOUND DESTINATION TO THE NEXT DESTINATION VARIABLE TO TRACK THE NEXT SEQUENCE
                $this->nextPoint = $this->fromLocations[$this->nextPoint['to']];
            }

        }

    }

    /**
     * This method takes the json object and converts it into proper array format.
     *
     * It also responsible for making or splitting the array in to from and to locations which are further used in planning the journey
     *
     * @param string $journey json object
     *
     * @return void
     */
    private function makeJourneyObject($journey) {

        $this->objectsToPlan = json_decode($journey, true);

        shuffle($this->objectsToPlan);

        // CREATING TWO INDIVIDUAL ARRAYS FOR TO & FROM LOCATIONS
        foreach($this->objectsToPlan as $plan) {
            $this->fromLocations[$plan['from']] = $plan;
            $this->toLocations[$plan['to']] = $plan;
        }

        $this->planTheJourney();

    }

}