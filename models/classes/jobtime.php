<?php

class JobTime
{
    private $id;
    private $period;
    private $startTime;
    private $endTime;
    private $sunday;
    private $monday;
    private $tuesday;
    private $wednesday;
    private $thursday;
    private $friday;
    private $saturday;
    
    function __construct($id, $period, $startTime, $endTime, $sunday, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday) {
        $this->id = $id;
        $this->period = $period;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->sunday = $sunday;
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
    }

    function get_id() {
        return $this->id;
    }

    function get_period() {
        return $this->period;
    }

    function get_startTime() {
        return $this->startTime;
    }

    function get_endTime() {
        return $this->endTime;
    }

    function get_sunday() {
        return $this->sunday;
    }

    function get_monday() {
        return $this->monday;
    }

    function get_tuesday() {
        return $this->tuesday;
    }

    function get_wednesday() {
        return $this->wednesday;
    }

    function get_thursday() {
        return $this->thursday;
    }

    function get_friday() {
        return $this->friday;
    }

    function get_saturday() {
        return $this->saturday;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_period($period) {
        $this->period = $period;
    }

    function set_startTime($startTime) {
        $this->startTime = $startTime;
    }

    function set_endTime($endTime) {
        $this->endTime = $endTime;
    }

    function set_sunday($sunday) {
        $this->sunday = $sunday;
    }

    function set_monday($monday) {
        $this->monday = $monday;
    }

    function set_tuesday($tuesday) {
        $this->tuesday = $tuesday;
    }

    function set_wednesday($wednesday) {
        $this->wednesday = $wednesday;
    }

    function set_thursday($thursday) {
        $this->thursday = $thursday;
    }

    function set_friday($friday) {
        $this->friday = $friday;
    }

    function set_saturday($saturday) {
        $this->saturday = $saturday;
    }


}

?>