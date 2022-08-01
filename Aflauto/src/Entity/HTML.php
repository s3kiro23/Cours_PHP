<?php

class HTML
{

    public static function dayCases($date, $timeStampDate)
    {
        $currentDate = strtotime(date('Y-m-d'));
        $nextDate = $timeStampDate + 86400;
        $previousDate = $timeStampDate - 86400;

        $dayCase = "<div id='flip' class='flex justify-content-center py-3 mt-2 rounded-t bg-indigo-700 w-full text-white border-solid border-grey'>";

        if ($timeStampDate != $currentDate) {
            $dayCase .= "<svg onClick='changeDate($previousDate);' xmlns='http://www.w3.org/2000/svg' class='h-6 w-6 cursor-pointer' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
                  <path stroke-linecap='round' stroke-linejoin='round' d='M15 19l-7-7 7-7' />
                </svg>";
        }
        $dayCase .= "
                <span id='$timeStampDate' class='currentDate mx-5'>$date</span>
                <svg onClick='changeDate($nextDate);' xmlns='http://www.w3.org/2000/svg' class='h-6 w-6 cursor-pointer' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
                  <path stroke-linecap='round' stroke-linejoin='round' d='M9 5l7 7-7 7' />
                </svg>
            </div>
            <div id='panel' class='$timeStampDate bg-white p-3'>
            
            </div>";

        return $dayCase;

    }

    public static function timeSlot($timeStampID, $slotInterval)
    {
        return "
            <button id='$timeStampID' class='p-2 my-2 slot rounded bg-indigo-100 border-1'>$slotInterval</button>                
		";
    }

}