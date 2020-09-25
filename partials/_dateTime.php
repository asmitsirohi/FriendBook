<?php
    function filter_dateTime($dateTime) {
        $d = strtotime($dateTime);
        $date = date("d M",$d)." at ".date("H:i",$d);

        return $date;
    }
?>