<?php

function isArrayNull($array)
{
 if (is_array($array)) {
  foreach ($array as $a) {
   if ($a != null) {
    return false;
   }
  }

  return true;
 }
 return false;
}

function isStringBlank($thing)
{
 if ($thing === null || $thing === '') {
  return true;
 }

 return false;
}

function validateNumRange($num, $min, $max)
{
 try
 {
  $num = (float) $num;
  $min = (float) $min;
  $max = (float) $max;
 } catch (Exception $ex) {
  return false;
 }
 if ($num >= $min && $num <= $max) {
  return true;
 } else {
  return false;
 }

}

function validateStringLength($string, $minLength, $maxLength)
{
 $stringLength = strlen((string) $string);
 if (isStringBlank($string)) {
  return false;
 } else if ($stringLength >= $minLength && $stringLength <= $maxLength) {
  return true;
 } else {
  return false;
 }
}
