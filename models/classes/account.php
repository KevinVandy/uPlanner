<?php

class Account
{
 private $id;
 private $email;
 private $firstName;
 private $defaultView;
 private $theme;
 private $hideCompleted;
 private $hideHints;
 private $creationTime;

 public function __construct($id, $email, $firstName, $defaultView, $theme, $hideCompleted, $hideHints, $creationTime)
 {
  $this->id            = $id;
  $this->email         = $email;
  $this->firstName     = $firstName;
  $this->defaultView   = $defaultView;
  $this->theme         = $theme;
  $this->hideCompleted = $hideCompleted;
  $this->hideHints     = $hideHints;
  $this->creationTime  = $creationTime;
 }

 public function get_id()
 {
  return $this->id;
 }

 public function get_email()
 {
  return $this->email;
 }

 public function get_firstName()
 {
  return $this->firstName;
 }

 public function get_defaultView()
 {
  return $this->defaultView;
 }

 public function get_theme()
 {
  return $this->theme;
 }

 public function get_hideCompleted()
 {
  return $this->hideCompleted;
 }

 public function get_hideHints()
 {
  return $this->hideHints;
 }

 public function get_creationTime()
 {
  return $this->creationTime;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_email($email)
 {
  $this->email = $email;
 }

 public function set_firstName($firstName)
 {
  $this->firstName = $firstName;
 }

 public function set_defaultView($defaultView)
 {
  $this->defaultView = $defaultView;
 }

 public function set_theme($theme)
 {
  $this->theme = $theme;
 }

 public function set_hideCompleted($hideCompleted)
 {
  $this->hideCompleted = $hideCompleted;
 }

 public function set_hideHints($hideHints)
 {
  $this->hideHints = $hideHints;
 }

 public function set_creationTime($creationTime)
 {
  $this->creationTime = $creationTime;
 }

}
