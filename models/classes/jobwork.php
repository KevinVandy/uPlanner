<?php

class JobWork
{
    private $id;
    private $workName;
    private $workType;
    private $priority;
    private $dueDate;
    private $dueTime;
    private $completed;
    
    function __construct($id, $workName, $workType, $priority, $dueDate, $dueTime, $completed) {
        $this->id = $id;
        $this->workName = $workName;
        $this->workType = $workType;
        $this->priority = $priority;
        $this->dueDate = $dueDate;
        $this->dueTime = $dueTime;
        $this->completed = $completed;
    }

    function get_id() {
        return $this->id;
    }

    function get_workName() {
        return $this->workName;
    }

    function get_workType() {
        return $this->workType;
    }

    function get_priority() {
        return $this->priority;
    }

    function get_dueDate() {
        return $this->dueDate;
    }

    function get_dueTime() {
        return $this->dueTime;
    }

    function get_completed() {
        return $this->completed;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_workName($workName) {
        $this->workName = $workName;
    }

    function set_workType($workType) {
        $this->workType = $workType;
    }

    function set_priority($priority) {
        $this->priority = $priority;
    }

    function set_dueDate($dueDate) {
        $this->dueDate = $dueDate;
    }

    function set_dueTime($dueTime) {
        $this->dueTime = $dueTime;
    }

    function set_completed($completed) {
        $this->completed = $completed;
    }

}

?>