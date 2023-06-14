<?php

include "ical/ical.php";

function icsReader ($url,$anz) {
    $n = 1;
    $calendar = new iCal($url);
    $icsEvents = $calendar->getEventsAfterDate(date('Y-m-d'));

    $output = '<ul>';

    usort($icsEvents, function($a, $b) {
        $ad = new DateTime($a->startDateTime);
        $bd = new DateTime($b->startDateTime);
      
        if ($ad == $bd) {
          return 0;
        }
      
        return $ad < $bd ? -1 : 1;
      });

    foreach($icsEvents as $item) {
        
        $output .= '<class="item_link">';
        $output .= '<h4>'.$item->title.'</h4>';

        $output .= '<p>'.$item->startDateTime.'-'.$item->endDateTime.'</p>';

        if($n>=$anz){break;}
			$n++;
        
    }

    return $output.'</ul>';

}

?>