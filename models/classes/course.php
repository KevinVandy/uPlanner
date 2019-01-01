<?php

class Course 
{
    private $id;
    private $courseName;
    private $location;
    private $teacher;
    private $startDate;
    private $endDate;
    private $courseTimes;
    private $courseWork;

    function __construct($id, $courseName, $location, $teacher, $startDate, $endDate, $courseTimes, $courseWork) {
        $this->id = $id;
        $this->courseName = $courseName;
        $this->location = $location;
        $this->teacher = $teacher;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->courseTimes = $courseTimes;
        $this->courseWork = $courseWork;
    }

    function get_id() {
        return $this->id;
    }

    function get_courseName() {
        return $this->courseName;
    }

    function get_location() {
        return $this->location;
    }

    function get_teacher() {
        return $this->teacher;
    }

    function get_startDate() {
        return $this->startDate;
    }

    function get_endDate() {
        return $this->endDate;
    }

    function get_courseTimes() {
        return $this->courseTimes;
    }

    function get_courseWork() {
        return $this->courseWork;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_courseName($courseName) {
        $this->courseName = $courseName;
    }

    function set_location($location) {
        $this->location = $location;
    }

    function set_teacher($teacher) {
        $this->teacher = $teacher;
    }

    function set_startDate($startDate) {
        $this->startDate = $startDate;
    }

    function set_endDate($endDate) {
        $this->endDate = $endDate;
    }

    function set_courseTimes($courseTimes) {
        $this->courseTimes = $courseTimes;
    }

    function set_courseWork($courseWork) {
        $this->courseWork = $courseWork;
    }


}

?>