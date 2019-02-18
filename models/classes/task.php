<?php

class Task
{
 private $id;
 private $taskName;
 private $priority;
 private $completed;

 public function __construct($id, $taskName, $priority, $completed)
 {
  $this->id        = $id;
  $this->taskName  = $taskName;
  $this->priority  = $priority;
  $this->completed = $completed;
 }

 public function get_id()
 {
  return $this->id;
 }

 public function get_taskName()
 {
  return $this->taskName;
 }

 public function get_priority()
 {
  return $this->priority;
 }

 public function get_completed()
 {
  return $this->completed;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_taskName($taskName)
 {
  $this->taskName = $taskName;
 }

 public function set_priority($priority)
 {
  $this->priority = $priority;
 }

 public function set_completed($completed)
 {
  $this->completed = $completed;
 }

}
