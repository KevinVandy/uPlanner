<?php

function findEmail($email)
{
    global $conn;
    $query = 'SELECT COUNT(*) FROM accounts WHERE Email = :email';
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
    $count = $statement->fetch();
    if($count[0] > 0) return TRUE;
    else return FALSE;
}

?>