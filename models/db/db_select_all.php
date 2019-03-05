<?php

function selectAllAdmins()
{
 global $conn;

 $query =
  'SELECT Id, UserName, CreateTime, ModifyTime
    FROM admins
    ORDER BY ModifyTime';

 $statement = $conn->prepare($query);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $records = $statement->fetchAll();
 $admins  = [];
 if ($records != null) {
  foreach ($records as $r) {
   $admin    = new Admin($r['Id'], $r['UserName']);
   $admins[] = $admin;
  }
  return $admins;
 } else {
  return null;
 }
}

function selectAllAccounts()
{
 global $conn;

 $query =
  'SELECT Id, Email, FirstName, CreateTime, ModifyTime
  FROM accounts
  ORDER BY ModifyTime';

 $statement = $conn->prepare($query);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $records  = $statement->fetchAll();
 $accounts = [];
 if ($records != null) {
  foreach ($records as $r) {
   $account    = new Account($r['Id'], $r['Email'], $r['FirstName'], null, null, null, null, $r['CreateTime']);
   $accounts[] = $account;
  }
  return $accounts;
 } else {
  return null;
 }
}
