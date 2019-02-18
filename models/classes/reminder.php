<?php

class Reminder
{
 private $id;
 private $reminderText;
 private $date;
 private $time;

 public function __construct($id, $reminderText, $date, $time)
 {
  $this->id           = $id;
  $this->reminderText = $reminderText;
  $this->date         = $date;
  $this->time         = $time;
 }

 public function get_id()
 {
  return $this->id;
 }

 public function get_reminderText()
 {
  return $this->reminderText;
 }

 public function get_date()
 {
  return $this->date;
 }

 public function get_time()
 {
  return $this->time;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_reminderText($reminderText)
 {
  $this->reminderText = $reminderText;
 }

 public function set_date($date)
 {
  $this->date = $date;
 }

 public function set_time($time)
 {
  $this->time = $time;
 }

}
