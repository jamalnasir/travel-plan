<?php

namespace Nasir\MultiBank;

/**
 * PassFactory implements the factory design pattern that makes and return various objects based on the request
 *
 *
 * Example usage:
 * PassFactory::create('bus')
 *
 * @author  Jamal Abdul Nasir
 * @version $Revision: 1.0 $
 * @access  public
 */

class PassFactory {


    /**
     * This static method makes objects based on the string parameter passed
     *
     *
     * @param string $make Includes string values like bus, train or airplane to create a respective object.
     *
     * @return static
     */
    public static function create($make) {

        switch ($make['type']) {

            case 'train'; return new Train($make['number'], $make['seat'], $make['from'], $make['to']);
            case 'bus'; return new Bus($make['number'], $make['seat'], $make['from'], $make['to']);
            case 'airplane'; return new AirPlane($make['number'], $make['seat'], $make['from'], $make['to'], $make['gate'], $make['counter']);
            default: return null;

        }

    }

}