<?php

class Reminder
{
    private $id;
    private $reminderText;
    private $date;
    private $time;
    
    function __construct($id, $reminderText, $date, $time) {
        $this->id = $id;
        $this->reminderText = $reminderText;
        $this->date = $date;
        $this->time = $time;
    }

    function get_id() {
        return $this->id;
    }

    function get_reminderText() {
        return $this->reminderText;
    }

    function get_date() {
        return $this->date;
    }

    function get_time() {
        return $this->time;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_reminderText($reminderText) {
        $this->reminderText = $reminderText;
    }

    function set_date($date) {
        $this->date = $date;
    }

    function set_time($time) {
        $this->time = $time;
    }


}

?>