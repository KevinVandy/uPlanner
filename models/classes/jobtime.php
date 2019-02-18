<?php

class JobTime
{
 private $id;
 private $period;
 private $startTime;
 private $endTime;
 private $sunday;
 private $monday;
 private $tuesday;
 private $wednesday;
 private $thursday;
 private $friday;
 private $saturday;

 public function __construct($id, $period, $startTime, $endTime, $sunday, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday)
 {
  $this->id        = $id;
  $this->period    = $period;
  $this->startTime = $startTime;
  $this->endTime   = $endTime;
  $this->sunday    = $sunday;
  $this->monday    = $monday;
  $this->tuesday   = $tuesday;
  $this->wednesday = $wednesday;
  $this->thursday  = $thursday;
  $this->friday    = $friday;
  $this->saturday  = $saturday;
 }

 public function get_id()
 {
  return $this->id;
 }

 public function get_period()
 {
  return $this->period;
 }

 public function get_startTime()
 {
  return $this->startTime;
 }

 public function get_endTime()
 {
  return $this->endTime;
 }

 public function get_sunday()
 {
  return $this->sunday;
 }

 public function get_monday()
 {
  return $this->monday;
 }

 public function get_tuesday()
 {
  return $this->tuesday;
 }

 public function get_wednesday()
 {
  return $this->wednesday;
 }

 public function get_thursday()
 {
  return $this->thursday;
 }

 public function get_friday()
 {
  return $this->friday;
 }

 public function get_saturday()
 {
  return $this->saturday;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_period($period)
 {
  $this->period = $period;
 }

 public function set_startTime($startTime)
 {
  $this->startTime = $startTime;
 }

 public function set_endTime($endTime)
 {
  $this->endTime = $endTime;
 }

 public function set_sunday($sunday)
 {
  $this->sunday = $sunday;
 }

 public function set_monday($monday)
 {
  $this->monday = $monday;
 }

 public function set_tuesday($tuesday)
 {
  $this->tuesday = $tuesday;
 }

 public function set_wednesday($wednesday)
 {
  $this->wednesday = $wednesday;
 }

 public function set_thursday($thursday)
 {
  $this->thursday = $thursday;
 }

 public function set_friday($friday)
 {
  $this->friday = $friday;
 }

 public function set_saturday($saturday)
 {
  $this->saturday = $saturday;
 }

}
