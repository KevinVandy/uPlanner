<?php

function insertAdmin($admin, $passwordHash)
{
 global $conn;

 $query =
  'INSERT INTO admins(UserName, PasswordHash )
          VALUES(:username, :passwordHash)';

 $statement = $conn->prepare($query);
 $statement->bindValue(':username', $admin->get_username());
 $statement->bindValue(':passwordHash', $passwordHash);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
 return $conn->lastInsertId();
}

function insertAccount($account, $passwordHash)
{
 global $conn;

 //insert into account
 $query =
  'INSERT INTO accounts(Email, FirstName, PasswordHash)
         VALUES(:email, :firstName, :passwordHash)';

 $statement = $conn->prepare($query);
 $statement->bindValue(':email', $account->get_email());
 $statement->bindValue(':firstName', $account->get_firstName());
 $statement->bindValue(':passwordHash', $passwordHash);

 try {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }

 $account->set_id($conn->lastInsertId()); //get account id for next statement

 //insert into account_settings
 $query =
  'INSERT INTO account_settings(AccountId, DefaultView, Theme, HideCompleted, HideHints)
          VALUES(:accountId, :defaultView, :theme, :hideCompleted, :hideHints)';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $account->get_id());
 $statement->bindValue(':defaultView', $account->get_defaultView());
 $statement->bindValue(':theme', $account->get_theme());
 $statement->bindValue(':hideCompleted', $account->get_hideCompleted());
 $statement->bindValue(':hideHints', $account->get_hideHints());

 try {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }

 return $account->get_id(); //return new accountId to indicate success
}

function insertCourse($course)
{
 global $conn;

 $query =
  'INSERT INTO courses(AccountId, CourseName, LocationId, Teacher, StartDate, EndDate)
          VALUES(:accountId, :courseName, :locationId, :teacher, :startDate, :endDate)';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $_SESSION['account']->get_id());
 $statement->bindValue(':courseName', $course->get_courseName());
 $statement->bindValue(':locationId', $course->get_location());
 $statement->bindValue(':teacher', $course->get_teacher());
 $statement->bindValue(':startDate', $course->get_startDate());
 $statement->bindValue(':endDate', $course->get_endDate());

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
 return $conn->lastInsertId();
}

function insertCourseWork($courseWork, $courseId)
{
 global $conn;

 $query =
  'INSERT INTO course_work(CourseId, WorkName, WorkType, Priority, DueDate, DueTime, Completed)
          VALUES(:courseId, :workName, :workType, :priority, :dueDate, :dueTime, :completed)';

 $statement = $conn->prepare($query);
 $statement->bindValue(':courseId', $courseId);
 $statement->bindValue(':workName', $courseWork->get_workName());
 $statement->bindValue(':workType', $courseWork->get_workType());
 $statement->bindValue(':priority', $courseWork->get_priority());
 $statement->bindValue(':dueDate', $courseWork->get_dueDate());
 $statement->bindValue(':dueTime', $courseWork->get_dueTime());
 $statement->bindValue(':completed', $courseWork->get_completed());

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage(); die();
  die();
 } finally {
  $statement->closeCursor();
 }
 return $conn->lastInsertId();
}

function insertJob($job)
{
 global $conn;

 $query =
  'INSERT INTO jobs(AccountId, JobName, LocationId)
          VALUES(:accountId, :jobName, :locationId)';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $_SESSION['account']->get_id());
 $statement->bindValue(':jobName', $job->get_jobName());
 $statement->bindValue(':locationId', $job->get_location());
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
 return $conn->lastInsertId();
}

function insertEvent($event)
{
 global $conn;

 $query =
  'INSERT INTO events(AccountId, EventName, LocationId, Date, StartTime, EndTime, Completed)
          VALUES(:accountId, :eventName, :locationId, :date, :startTime, :endTime, :completed)';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $_SESSION['account']->get_id());
 $statement->bindValue(':eventName', $event->get_eventName());
 $statement->bindValue(':locationId', $event->get_location());
 $statement->bindValue(':date', $event->get_date());
 $statement->bindValue(':startTime', $event->get_startTime());
 $statement->bindValue(':endTime', $event->get_endTime());
 $statement->bindValue(':completed', $event->get_completed());

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage(); die();
  die();
 } finally {
  $statement->closeCursor();
 }
 return $conn->lastInsertId();
}

function insertMeeting($meeting)
{
 global $conn;

 $query =
  'INSERT INTO meetings(AccountId, MeetingName, LocationId, Date, StartTime, EndTime, Completed)
          VALUES(:accountId, :meetingName, :locationId, :date, :startTime, :endTime, :completed)';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $_SESSION['account']->get_id());
 $statement->bindValue(':meetingName', $meeting->get_meetingName());
 $statement->bindValue(':locationId', $meeting->get_location());
 $statement->bindValue(':date', $meeting->get_date());
 $statement->bindValue(':startTime', $meeting->get_startTime());
 $statement->bindValue(':endTime', $meeting->get_endTime());
 $statement->bindValue(':completed', $meeting->get_completed());

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
 return $conn->lastInsertId();
}

function insertTask($task)
{
 global $conn;

 $query =
  'INSERT INTO tasks(AccountId, TaskName, Priority)
          VALUES(:accountId, :taskName, :priority)';

 $statement = $conn->prepare($query);
 $statement->bindValue(':accountId', $_SESSION['account']->get_id());
 $statement->bindValue(':taskName', $task->get_taskName());
 $statement->bindValue(':priority', $task->get_priority());

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
 return $conn->lastInsertId();
}
