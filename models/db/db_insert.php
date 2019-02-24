<?php

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
  return null;
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
  return null;
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
 $statement->bindValue(':locationId', $course->get_locationId());
 $statement->bindValue(':teacher', $course->get_teacher());
 $statement->bindValue(':startDate', $course->get_startDate());
 $statement->bindValue(':endDate', $course->get_endDate());

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  return null;
 } finally {
  $statement->closeCursor();
 }
 return $conn->lastInsertId();
}
