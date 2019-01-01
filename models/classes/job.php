<?php

class Job
{
    private $id;
    private $jobName;
    private $jobTimes;
    private $jobWork;
    
    function __construct($id, $jobName, $jobTimes, $jobWork) {
        $this->id = $id;
        $this->jobName = $jobName;
        $this->jobTimes = $jobTimes;
        $this->jobWork = $jobWork;
    }

    function get_id() {
        return $this->id;
    }

    function get_jobName() {
        return $this->jobName;
    }

    function get_jobTimes() {
        return $this->jobTimes;
    }

    function get_jobWork() {
        return $this->jobWork;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_jobName($jobName) {
        $this->jobName = $jobName;
    }

    function set_jobTimes($jobTimes) {
        $this->jobTimes = $jobTimes;
    }

    function set_jobWork($jobWork) {
        $this->jobWork = $jobWork;
    }


}
    

?>