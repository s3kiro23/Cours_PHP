<?php

class HTML
{

    public static function dayCases($date, $timeStampDate)
    {
        $currentDate = strtotime(date('Y-m-d'));
        $nextDate = $timeStampDate + 86400;
        $previousDate = $timeStampDate - 86400;

        $dayCase = "<div id='flip' class='d-flex justify-content-center py-3 mt-2 text-white bg-secondary rounded-top'>";

        if ($timeStampDate != $currentDate) {
            $dayCase .= "<a type='button' class='text-decoration-none' onClick='changeDate($previousDate);' >&laquo;</a>";
        }
        $dayCase .= "
                <span id='$timeStampDate' class='currentDate mx-5'>$date</span>              
                <a type='button' class='text-decoration-none' onClick='changeDate($nextDate);' >&raquo;</a>
            </div>
            <div id='panel' class='$timeStampDate bg-light p-3 text-center rounded-bottom'>
                <!--Génération des créneaux disponible ici--> 
            </div>";

        return $dayCase;

    }

    public static function timeSlot($timeStampID, $slotInterval)
    {
        /*<button id='$timeStampID' class='p-2 my-2 slot rounded bg-indigo-100 border-1'>$slotInterval</button>*/
        return "
            <label class='btn btn-success border-success my-2 text-center' for='$timeStampID'>
                <input type='radio' class='btn-check' name='timeSlot' id='$timeStampID' autocomplete='off'>
                    $slotInterval
            </label>                
		";
    }

}