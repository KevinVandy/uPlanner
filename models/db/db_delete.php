<?php

function deleteAdmin($id)
{
 global $conn;
 $query =
  'DELETE FROM admins
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

function deleteAccount($id)
{
 global $conn;
 $query =
  'DELETE FROM accounts
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

function deleteTask($id)
{
 global $conn;
 $query =
  'DELETE FROM tasks
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
