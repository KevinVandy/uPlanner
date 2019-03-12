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

function selectAllAccountsSettings()
{
 global $conn;

 $query =
  'SELECT Id, DefaultView, Theme, ModifyTime
  FROM account_settings
  ORDER BY ModifyTime';

 $statement = $conn->prepare($query);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $records         = $statement->fetchAll();
 $accountSettings = [];
 if ($records != null) {
  foreach ($records as $r) {
   $accountSetting    = new Account($r['Id'], null, null, $r['DefaultView'], $r['Theme'], null, null, $r['ModifyTime']);
   $accountSettings[] = $accountSetting;
  }
  return $accountSettings;
 } else {
  return null;
 }
}

function selectAllCourses()
{
 global $conn;

 $query =
  'SELECT Id, CourseName, Teacher, StartDate, EndDate
  FROM courses
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
 $courses = [];
 if ($records != null) {
  foreach ($records as $r) {
   $course    = new Course($r['Id'], $r['CourseName'], null, $r['Teacher'], $r['StartDate'], $r['EndDate'], null, null);
   $courses[] = $course;
  }
  return $courses;
 } else {
  return null;
 }
}

function selectAllCourseWork()
{
 global $conn;

 $query =
  'SELECT Id, WorkName, WorkType, Priority, DueDate, DueTime, Completed
  FROM course_work
  ORDER BY ModifyTime';

 $statement = $conn->prepare($query);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $records     = $statement->fetchAll();
 $courseWorks = [];
 if ($records != null) {
  foreach ($records as $r) {
   $courseWork    = new CourseWork($r['Id'], $r['WorkName'], $r['WorkType'], $r['Priority'], $r['DueDate'], $r['DueTime'], $r['Completed']);
   $courseWorks[] = $courseWork;
  }
  return $courseWorks;
 } else {
  return null;
 }
}

function selectAllJobs()
{
 global $conn;

 $query =
  'SELECT Id, JobName
  FROM jobs
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
 $jobs    = [];
 if ($records != null) {
  foreach ($records as $r) {
   $job    = new Job($r['Id'], $r['JobName'], null, null, null);
   $jobs[] = $job;
  }
  return $jobs;
 } else {
  return null;
 }
}

function selectAllJobWork()
{
 global $conn;

 $query =
  'SELECT Id, WorkName, WorkType, Priority, DueDate, DueTime, Completed
  FROM job_work
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
 $jobWorks = [];
 if ($records != null) {
  foreach ($records as $r) {
   $jobWork    = new JobWork($r['Id'], $r['WorkName'], $r['WorkType'], $r['Priority'], $r['DueDate'], $r['DueTime'], $r['Completed']);
   $jobWorks[] = $jobWork;
  }
  return $jobWorks;
 } else {
  return null;
 }
}

function selectAllEvents()
{
 global $conn;

 $query =
  'SELECT Id, EventName, Date, StartTime, EndTime, Completed
  FROM events
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
 $events  = [];
 if ($records != null) {
  foreach ($records as $r) {
   $event    = new Event($r['Id'], $r['EventName'], null, $r['Date'], $r['StartTime'], $r['EndTime'], $r['Completed']);
   $events[] = $event;
  }
  return $events;
 } else {
  return null;
 }
}

function selectAllMeetings()
{
 global $conn;

 $query =
  'SELECT Id, MeetingName, LocationId, Date, StartTime, EndTime, Completed
    FROM meetings
    ORDER BY Date';

 $statement = $conn->prepare($query);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $records  = $statement->fetchAll();
 $meetings = [];
 if ($records != null) {
  foreach ($records as $r) {
   $meeting    = new Meeting($r['Id'], $r['MeetingName'], null, $r['Date'], $r['StartTime'], $r['EndTime'], $r['Completed']);
   $meetings[] = $meeting;
  }
  return $meetings;
 } else {
  return null;
 }
}

function selectAllTasks()
{
 global $conn;

 $query =
  'SELECT Id, TaskName, Priority
    FROM tasks
    ORDER BY Priority';

 $statement = $conn->prepare($query);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $records = $statement->fetchAll();
 $tasks   = [];
 if ($records != null) {
  foreach ($records as $r) {
   $task    = new Task($r['Id'], $r['TaskName'], $r['Priority'], null);
   $tasks[] = $task;
  }
  return $tasks;
 } else {
  return null;
 }
}
