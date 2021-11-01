# Pass Sorter

Sorting a stack of boarding passes for various transportation that will take you from a point A to point B via several stops on the way. All of the boarding passes are out of order and you don't know where your journey starts, nor where it ends. Each boarding pass contains information about seat assignment, and means of transportation (such as flight number, bus number etc).

# Usage

There is an index.php file in the project root folder which drives the whole process of sorting.

Run composer dumpautoload on the project root directory so that all the classes are updated in the autoload file.

Inside the index file the sorter can be drive as below. Also, on every run the array is shuffled and you will see different results.

```<?php
require 'vendor/autoload.php';

use \Nasir\MultiBank\Planner;

$json = '[
    {
        "type": "train",
        "number": "23A",
        "from": "Beirut",
        "to": "Turkey",
        "seat": "15B",
        "gate": null,
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
        "type": "airplane",
        "number": "flight SK22",
        "from": "Aleppo",
        "to": "Montreal YUL",
        "seat": "7B",
        "gate": "22",
        "counter": null
    }




    ]';

$planner = new Planner($json);

echo '<pre>';
echo $planner->showMyJourney();
echo '</pre>';
```

# Order of complexity

I have used the following complexities to sort all the passes.
- O(n) in makeJourneyObject method inside Planner class.
- O(n) in planTheJourney method inside Planner class.

And the following complexity is used to just render the result in presentable format
- O(n) in showMyJourney method inside Planner class.

So, total of O(3n) complexity is used to process and render the results.