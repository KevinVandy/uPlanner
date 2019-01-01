<?php

class Task 
{
    private $id;
    private $taskName;
    private $priority;
    private $completed;

    function __construct($id, $taskName, $priority, $completed) {
        $this->id = $id;
        $this->taskName = $taskName;
        $this->priority = $priority;
        $this->completed = $completed;
    }

    function get_id() {
        return $this->id;
    }

    function get_taskName() {
        return $this->taskName;
    }

    function get_priority() {
        return $this->priority;
    }

    function get_completed() {
        return $this->completed;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_taskName($taskName) {
        $this->taskName = $taskName;
    }

    function set_priority($priority) {
        $this->priority = $priority;
    }

    function set_completed($completed) {
        $this->completed = $completed;
    }


}

?>