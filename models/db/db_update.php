<?php

function updateAdminPassword($id, $newPassword)
{
 global $conn;
 $query =
  'UPDATE admins
   SET PasswordHash = :newPassword
   WHERE Id = :id';

 $statement = $conn->prepare($query);
 $statement->bindValue(':newPassword', $newPassword);
 $statement->bindValue(':id', $id);

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
}

function updateAccountPassword($newPasswordHash)
{
 global $conn;
 $query =
  'UPDATE accounts
   SET PasswordHash = :newPasswordHash
   WHERE Id = :id';

 $statement = $conn->prepare($query);
 $statement->bindValue(':newPasswordHash', $newPasswordHash);
 $statement->bindValue(':id', $_SESSION['account']->get_id());

 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
}

function updateAccountSettings($account)
{
 global $conn;
 $query =
  'UPDATE accounts
   SET Email = :newEmail,
   FirstName = :newFirstName
   WHERE Id = :id';

 $statement = $conn->prepare($query);
 $statement->bindValue(':newEmail', $account->get_email());
 $statement->bindValue(':newFirstName', $account->get_firstName());
 $statement->bindValue(':id', $_SESSION['account']->get_id());
 
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }

 $query =
  'UPDATE account_settings
   SET DefaultView = :newDefaultView,
   Theme = :newTheme
   WHERE Id = :id';

 $statement = $conn->prepare($query);
 $statement->bindValue(':newDefaultView', $account->get_defaultView());
 $statement->bindValue(':newTheme', $account->get_theme());
 $statement->bindValue(':id', $_SESSION['account']->get_id());
 
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
}

function updateEventComplete($id)
{
 global $conn;
 $query =
  'UPDATE events
   SET Completed = 1
   WHERE Id = :id';

 $statement = $conn->prepare($query);
 $statement->bindValue(':id', $id);
 
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
}

function updateMeetingComplete($id)
{
 global $conn;
 $query =
  'UPDATE meetings
   SET Completed = 1
   WHERE Id = :id';

 $statement = $conn->prepare($query);
 $statement->bindValue(':id', $id);
 
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
}

function updateCourseWorkComplete($id)
{
 global $conn;
 $query =
  'UPDATE course_work
   SET Completed = 1
   WHERE Id = :id';

 $statement = $conn->prepare($query);
 $statement->bindValue(':id', $id);
 
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
}

function updateJobWorkComplete($id)
{
 global $conn;
 $query =
  'UPDATE job_work
   SET Completed = 1
   WHERE Id = :id';

 $statement = $conn->prepare($query);
 $statement->bindValue(':id', $id);
 
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  die();
 } finally {
  $statement->closeCursor();
 }
}