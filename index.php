<?php
require 'vendor/autoload.php';

use \Nasir\MultiBank\Planner;

$json = '[
    {
        "type": "airplane",
        "number": "flight SK22",
        "from": "Aleppo",
        "to": "Montreal YUL",
        "seat": "7B",
        "gate": "22",
        "counter": null
    },
    {
        "type": "bus",
        "number": "airport",
        "from": "Turkey",
        "to": "Ibiza Airport",
        "seat": null,
        "gate": null,
        "counter": null
     },
     {
        "type": "airplane",
        "number": "flight SK455",
        "from": "Ibiza Airport",
        "to": "Aleppo",
        "seat": "3A",
        "gate": "15B",
        "counter": "344"
     },
     {
        "type": "train",
        "number": "23A",
        "from": "Beirut",
        "to": "Turkey",
        "seat": "15B",
        "gate": null,
        "counter": null
     }
    ]';

$planner = new Planner($json);

echo '<pre>';
echo $planner->planMyJourney();
echo '</pre>';


