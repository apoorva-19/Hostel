<?php
    function convertDate($date)
    {
        $dateArray = explode(" ", $date);
        $dob = $dateArray[2]." ".$dateArray[1]." ".$dateArray[3];
        $date = date("Y-m-d", strtotime($dob));
        return $date;        
    }

    function convertTime($timeInput)
    {
        $time = DateTime::createFromFormat('H:i', $timeInput);
        $formattedTime = $time->format('H:i:s');
        return $formattedTime;
    }

    function convertDateTime($dateTime)
    {
        $dateTimeArray = explode(" ", $dateTime);
        $timeArray = explode(":", $dateTimeArray[5]);
        $tempDateTime = $dateTimeArray[2]." ".$dateTimeArray[1]." ".$dateTimeArray[3]." ".$timeArray[0].":".$timeArray[1].":00";
        $dateTime = date("Y-m-d H:i:s", strtotime($tempDateTime));
        return $dateTime;
    }
?>