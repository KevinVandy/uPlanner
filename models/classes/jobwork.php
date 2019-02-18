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

 public function __construct($id, $workName, $workType, $priority, $dueDate, $dueTime, $completed)
 {
  $this->id        = $id;
  $this->workName  = $workName;
  $this->workType  = $workType;
  $this->priority  = $priority;
  $this->dueDate   = $dueDate;
  $this->dueTime   = $dueTime;
  $this->completed = $completed;
 }

 public function get_id()
 {
  return $this->id;
 }

 public function get_workName()
 {
  return $this->workName;
 }

 public function get_workType()
 {
  return $this->workType;
 }

 public function get_priority()
 {
  return $this->priority;
 }

 public function get_dueDate()
 {
  return $this->dueDate;
 }

 public function get_dueTime()
 {
  return $this->dueTime;
 }

 public function get_completed()
 {
  return $this->completed;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_workName($workName)
 {
  $this->workName = $workName;
 }

 public function set_workType($workType)
 {
  $this->workType = $workType;
 }

 public function set_priority($priority)
 {
  $this->priority = $priority;
 }

 public function set_dueDate($dueDate)
 {
  $this->dueDate = $dueDate;
 }

 public function set_dueTime($dueTime)
 {
  $this->dueTime = $dueTime;
 }

 public function set_completed($completed)
 {
  $this->completed = $completed;
 }

}
