<?php

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
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }

    $record = $statement->fetch();
    
    $account = new Account($record['Id'], $record['Email'], $record['FirstName'], $record['DefaultView'], $record['Theme'], $record['HideHints'], $record['CreateTime']);

    return $account;
}

function selectAccountByEmail($email)
{
    global $conn;

    $query = 
        'SELECT a.Id, a.Email, a.FirstName, a.CreateTime, a_s.DefaultView, a_s.Theme, a_s.HideCompleted, a_s.HideHints 
         FROM accounts AS a INNER JOIN account_settings AS a_s on a.Id = a_c.AccountId 
         WHERE a.Email = :email';

    $statement = $conn->prepare($query);
    $statement->bindValue(':email', $email);

    try 
    {
        $statement->execute();
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }

    $record = $statement->fetch();
    
    $account = new Account($record['Id'], $record['Email'], $record['FirstName'], $record['DefaultView'], $record['Theme'], $record['HideHints'], $record['CreateTime']);

    return $account;
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
    }
    catch (PDOException $ex)
    {
        echo $ex->getMessage();
        return NULL;
    }

    $record = $statement->fetch();

    $passwordHash = $record['PasswordHash'];

    return $passwordHash;
}

?>