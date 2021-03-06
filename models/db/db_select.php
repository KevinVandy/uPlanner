<?php

function selectAdminByUsername($username)
{
 global $conn;

 $query =
  'SELECT Id, UserName
    FROM admins
    WHERE UserName = :username';

 $statement = $conn->prepare($query);
 $statement->bindValue(':username', $username);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }

 $record = $statement->fetch();

 $admin = new Admin($record['Id'], $record['UserName']);

 return $admin;
}

function selectAccountById($accountId)
{
 global $conn;

 $query =
  'SELECT a.Id, a.Email, a.FirstName, a.CreateTime, a_s.DefaultView, a_s.Theme, a_s.HideCompleted, a_s.HideHints
         FROM accounts AS a INNER JOIN account_settings AS a_s on a.Id = a_c.AccountId
         WHERE a.Id = :accountId';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $accountId);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }

 $record = $statement->fetch();

 $account = new Account($record['Id'], $record['Email'], $record['FirstName'], $record['DefaultView'], $record['Theme'], $record['HideCompleted'], $record['HideHints'], $record['CreateTime']);

 return $account;
}

function selectAccountByEmail($email)
{
 global $conn;

 $query =
  'SELECT a.Id, a.Email, a.FirstName, a.CreateTime, a_s.DefaultView, a_s.Theme, a_s.HideCompleted, a_s.HideHints
    FROM accounts AS a INNER JOIN account_settings AS a_s on a.Id = a_s.AccountId
    WHERE a.Email = :email';

 $statement = $conn->prepare($query);
 $statement->bindValue(':email', $email);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }

 $record = $statement->fetch();

 $account = new Account($record['Id'], $record['Email'], $record['FirstName'], $record['DefaultView'], $record['Theme'], $record['HideCompleted'], $record['HideHints'], $record['CreateTime']);

 return $account;
}

function selectAdminPassword($username)
{
 global $conn;

 $query =
  'SELECT PasswordHash
    FROM admins
    WHERE UserName = :username';

 $statement = $conn->prepare($query);
 $statement->bindValue(':username', $username);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }

 $record = $statement->fetch();

 $passwordHash = $record['PasswordHash'];

 return $passwordHash;
}

function selectPasswordHashByEmail($email)
{
 global $conn;

 $query =
  'SELECT PasswordHash
         FROM accounts
         WHERE Email = :email';

 $statement = $conn->prepare($query);
 $statement->bindValue(':email', $email);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }

 $record = $statement->fetch();

 $passwordHash = $record['PasswordHash'];

 return $passwordHash;
}

function selectCoursesByAccountId($accountId)
{
 global $conn;

 $query =
  'SELECT Id, CourseName, LocationId, Teacher, StartDate, EndDate
    FROM courses
    WHERE AccountId = :accountId';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $accountId);

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
   $course = new Course($r['Id'], $r['CourseName'], $r['LocationId'], $r['Teacher'], $r['StartDate'], $r['EndDate'], null, null);
   $course->set_courseWork(selectCourseWorkByCourseId($course->get_id()));
   $courses[] = $course;
  }
  return $courses;
 } else {
  return null;
 }
}

function selectCourseWorkByCourseId($courseId)
{
 global $conn;

 $query =
  'SELECT Id, CourseId, WorkName, WorkType, Priority, DueDate, DueTime, Completed
    FROM course_work
    WHERE CourseId = :courseId
    ORDER BY DueDate ASC, DueTime ASC, Priority';

 $statement = $conn->prepare($query);
 $statement->bindValue(':courseId', $courseId);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $records      = $statement->fetchAll();
 $course_works = [];
 if ($records != null) {
  foreach ($records as $r) {
   $course_work    = new CourseWork($r['Id'], $r['WorkName'], $r['WorkType'], $r['Priority'], $r['DueDate'], $r['DueTime'], $r['Completed']);
   $course_works[] = $course_work;
  }
  return $course_works;
 } else {
  return null;
 }
}

function selectJobsByAccountId($accountId)
{
 global $conn;

 $query =
  'SELECT Id, JobName, LocationId
    FROM jobs
    WHERE AccountId = :accountId';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $accountId);

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
   $job->set_jobWork(selectJobWorkByJobId($job->get_id()));
   $jobs[] = $job;
  }
  return $jobs;
 } else {
  return null;
 }
}

function selectJobWorkByJobId($jobId)
{
 global $conn;

 $query =
  'SELECT Id, JobId, WorkName, WorkType, Priority, DueDate, DueTime, Completed
    FROM job_work
    WHERE JobId = :jobId
    ORDER BY DueDate ASC, DueTime ASC, Priority';

 $statement = $conn->prepare($query);
 $statement->bindValue(':jobId', $jobId);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 }
 $records   = $statement->fetchAll();
 $job_works = [];
 if ($records != null) {
  foreach ($records as $r) {
   $job_work    = new JobWork($r['Id'], $r['WorkName'], $r['WorkType'], $r['Priority'], $r['DueDate'], $r['DueTime'], $r['Completed']);
   $job_works[] = $job_work;
  }
  return $job_works;
 } else {
  return null;
 }
}

function selectEventsByAccountId($accountId)
{
 global $conn;

 $query =
  'SELECT Id, EventName, LocationId, Date, StartTime, EndTime, Completed
    FROM events
    WHERE AccountId = :accountId
    ORDER BY Date';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $accountId);

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

function selectMeetingsByAccountId($accountId)
{
 global $conn;

 $query =
  'SELECT Id, MeetingName, LocationId, Date, StartTime, EndTime, Completed
    FROM meetings
    WHERE AccountId = :accountId
    ORDER BY Date';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $accountId);

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

function selectTasksByAccountId($accountId)
{
 global $conn;

 $query =
  'SELECT Id, TaskName, Priority
    FROM tasks
    WHERE AccountId = :accountId
    ORDER BY Priority';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $accountId);

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
