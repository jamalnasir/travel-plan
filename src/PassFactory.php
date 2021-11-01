<?php

namespace Nasir\MultiBank;

class PassFactory {


    public static function create($make) {

        switch ($make['type']) {

            case 'train'; return new Train($make['number'], $make['seat'], $make['from'], $make['to']);
            case 'bus'; return new Bus($make['number'], $make['seat'], $make['from'], $make['to']);
            default: return null;

        }

    }
    
}