<?php

class Location
{

 private $id;
 private $address;
 private $city;
 private $stateProvince;
 private $zip;
 private $country;
 private $building;
 private $roomNumber;

 public function __construct($id, $address, $city, $stateProvince, $zip, $country, $building, $roomNumber)
 {
  $this->id            = $id;
  $this->address       = $address;
  $this->city          = $city;
  $this->stateProvince = $stateProvince;
  $this->zip           = $zip;
  $this->country       = $country;
  $this->building      = $building;
  $this->roomNumber    = $roomNumber;
 }

 public function get_id()
 {
  return $this->id;
 }

 public function get_address()
 {
  return $this->address;
 }

 public function get_city()
 {
  return $this->city;
 }

 public function get_stateProvince()
 {
  return $this->stateProvince;
 }

 public function get_zip()
 {
  return $this->zip;
 }

 public function get_country()
 {
  return $this->country;
 }

 public function get_building()
 {
  return $this->building;
 }

 public function get_roomNumber()
 {
  return $this->roomNumber;
 }

 public function set_id($id)
 {
  $this->id = $id;
 }

 public function set_address($address)
 {
  $this->address = $address;
 }

 public function set_city($city)
 {
  $this->city = $city;
 }

 public function set_stateProvince($stateProvince)
 {
  $this->stateProvince = $stateProvince;
 }

 public function set_zip($zip)
 {
  $this->zip = $zip;
 }

 public function set_country($country)
 {
  $this->country = $country;
 }

 public function set_building($building)
 {
  $this->building = $building;
 }

 public function set_roomNumber($roomNumber)
 {
  $this->roomNumber = $roomNumber;
 }

}
