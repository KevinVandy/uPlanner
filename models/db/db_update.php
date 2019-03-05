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
  return null;
 } finally {
  $statement->closeCursor();
 }
}

function updateAccountPassword($id, $newPasswordHash)
{
 global $conn;
 $query =
  'UPDATE accounts
   SET PasswordHash = :newPasswordHash
   WHERE Id = :id';

 $statement = $conn->prepare($query);
 $statement->bindValue(':newPasswordHash', $newPasswordHash);
 $statement->bindValue(':id', $id);
 
 try
 {
  $statement->execute();
 } catch (PDOException $ex) {
  echo $ex->getMessage();
  return null;
 } finally {
  $statement->closeCursor();
 }
}