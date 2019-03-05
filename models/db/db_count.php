<?php

function selectCountAccounts()
{
 global $conn;
 $query     = 'SELECT COUNT(*) FROM accounts';

 $statement = $conn->prepare($query);
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $count = $statement->fetch();
 
 return $count[0];
}

function selectCountAdmins()
{
 global $conn;
 $query     = 'SELECT COUNT(*) FROM admins';

 $statement = $conn->prepare($query);
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $count = $statement->fetch();
 
 return $count[0];
}

function selectCountEvents()
{
 global $conn;
 $query     = 'SELECT COUNT(*) FROM events';

 $statement = $conn->prepare($query);
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $count = $statement->fetch();
 
 return $count[0];
}

function selectCountMeetings()
{
 global $conn;
 $query     = 'SELECT COUNT(*) FROM meetings';

 $statement = $conn->prepare($query);
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $count = $statement->fetch();
 
 return $count[0];
}

function selectCountTasks()
{
 global $conn;
 $query     = 'SELECT COUNT(*) FROM tasks';

 $statement = $conn->prepare($query);
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $count = $statement->fetch();
 
 return $count[0];
}

function selectCountCourses()
{
 global $conn;
 $query     = 'SELECT COUNT(*) FROM courses';

 $statement = $conn->prepare($query);
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $count = $statement->fetch();
 
 return $count[0];
}

function selectCountCourseWork()
{
 global $conn;
 $query     = 'SELECT COUNT(*) FROM course_work';

 $statement = $conn->prepare($query);
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $count = $statement->fetch();
 
 return $count[0];
}

function selectCountJobs()
{
 global $conn;
 $query     = 'SELECT COUNT(*) FROM jobs';

 $statement = $conn->prepare($query);
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $count = $statement->fetch();
 
 return $count[0];
}

function selectCountJobWork()
{
 global $conn;
 $query     = 'SELECT COUNT(*) FROM job_work';

 $statement = $conn->prepare($query);
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $count = $statement->fetch();
 
 return $count[0];
}