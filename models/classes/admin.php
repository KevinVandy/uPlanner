<?php
class Admin
{
 private $id;
 private $username;

 public function get_id()
 {
  return $this->id;
 }

 public function get_username()
 {
  return $this->username;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_username($username)
 {
  $this->username = $username;
 }

}
