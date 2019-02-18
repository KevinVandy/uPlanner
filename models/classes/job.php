<?php

class Job
{
 private $id;
 private $jobName;
 private $jobTimes;
 private $jobWork;

 public function __construct($id, $jobName, $jobTimes, $jobWork)
 {
  $this->id       = $id;
  $this->jobName  = $jobName;
  $this->jobTimes = $jobTimes;
  $this->jobWork  = $jobWork;
 }

 public function get_id()
 {
  return $this->id;
 }

 public function get_jobName()
 {
  return $this->jobName;
 }

 public function get_jobTimes()
 {
  return $this->jobTimes;
 }

 public function get_jobWork()
 {
  return $this->jobWork;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_jobName($jobName)
 {
  $this->jobName = $jobName;
 }

 public function set_jobTimes($jobTimes)
 {
  $this->jobTimes = $jobTimes;
 }

 public function set_jobWork($jobWork)
 {
  $this->jobWork = $jobWork;
 }

}
