<?php

class Event
{
    private $id;
    private $eventName;
    private $location;
    private $date;
    private $startTime;
    private $endTime;
    private $completed;

    function __construct($id, $eventName, $location, $date, $startTime, $endTime, $completed) {
        $this->id = $id;
        $this->eventName = $eventName;
        $this->location = $location;
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->completed = $completed;
    }

    function get_id() {
        return $this->id;
    }

    function get_eventName() {
        return $this->eventName;
    }

    function get_location() {
        return $this->location;
    }

    function get_date() {
        return $this->date;
    }

    function get_startTime() {
        return $this->startTime;
    }

    function get_endTime() {
        return $this->endTime;
    }

    function get_completed() {
        return $this->completed;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_eventName($eventName) {
        $this->eventName = $eventName;
    }

    function set_location($location) {
        $this->location = $location;
    }

    function set_date($date) {
        $this->date = $date;
    }

    function set_startTime($startTime) {
        $this->startTime = $startTime;
    }

    function set_endTime($endTime) {
        $this->endTime = $endTime;
    }

    function set_completed($completed) {
        $this->completed = $completed;
    }


}

?>