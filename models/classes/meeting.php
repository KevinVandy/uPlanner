<?php

class Meeting
{
 private $id;
 private $meetingName;
 private $location;
 private $date;
 private $startTime;
 private $endTime;
 private $completed;

 public function __construct($id, $meetingName, $location, $date, $startTime, $endTime, $completed)
 {
  $this->id          = $id;
  $this->meetingName = $meetingName;
  $this->location    = $location;
  $this->date        = $date;
  $this->startTime   = $startTime;
  $this->endTime     = $endTime;
  $this->completed   = $completed;
 }

 public function get_id()
 {
  return $this->id;
 }

 public function get_meetingName()
 {
  return $this->meetingName;
 }

 public function get_location()
 {
  return $this->location;
 }

 public function get_date()
 {
  return $this->date;
 }

 public function get_startTime()
 {
  return $this->startTime;
 }

 public function get_endTime()
 {
  return $this->endTime;
 }

 public function get_completed()
 {
  return $this->completed;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_meetingName($meetingName)
 {
  $this->meetingName = $meetingName;
 }

 public function set_location($location)
 {
  $this->location = $location;
 }

 public function set_date($date)
 {
  $this->date = $date;
 }

 public function set_startTime($startTime)
 {
  $this->startTime = $startTime;
 }

 public function set_endTime($endTime)
 {
  $this->endTime = $endTime;
 }

 public function set_completed($completed)
 {
  $this->completed = $completed;
 }

}
