<?php

class Course
{
 private $id;
 private $courseName;
 private $locationId;
 private $teacher;
 private $startDate;
 private $endDate;
 private $courseTimes;
 private $courseWork;

 public function __construct($id, $courseName, $locationId, $teacher, $startDate, $endDate, $courseTimes, $courseWork)
 {
  $this->id          = $id;
  $this->courseName  = $courseName;
  $this->locationId    = $locationId;
  $this->teacher     = $teacher;
  $this->startDate   = $startDate;
  $this->endDate     = $endDate;
  $this->courseTimes = $courseTimes;
  $this->courseWork  = $courseWork;
 }

 public function get_id()
 {
  return $this->id;
 }

 public function get_courseName()
 {
  return $this->courseName;
 }

 public function get_locationId()
 {
  return $this->locationId;
 }

 public function get_teacher()
 {
  return $this->teacher;
 }

 public function get_startDate()
 {
  return $this->startDate;
 }

 public function get_endDate()
 {
  return $this->endDate;
 }

 public function get_courseTimes()
 {
  return $this->courseTimes;
 }

 public function get_courseWork()
 {
  return $this->courseWork;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_courseName($courseName)
 {
  $this->courseName = $courseName;
 }

 public function set_locationId($locationId)
 {
  $this->locationId = $locationId;
 }

 public function set_teacher($teacher)
 {
  $this->teacher = $teacher;
 }

 public function set_startDate($startDate)
 {
  $this->startDate = $startDate;
 }

 public function set_endDate($endDate)
 {
  $this->endDate = $endDate;
 }

 public function set_courseTimes($courseTimes)
 {
  $this->courseTimes = $courseTimes;
 }

 public function set_courseWork($courseWork)
 {
  $this->courseWork = $courseWork;
 }

}
