<?php

function login($account)
{
    $_SESSION['account'] = $account;
}

function isLoggedIn()
{
    if(isset($_SESSION['account']) && $_SESSION['account']->get_id() != NULL )
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    } 
}

function validateLogin($email, $passwordHash)
{
    if(findEmail($email) && password_verify(selectPasswordHashByEmail($email), $passwordHash))
    {
        return true;
    }
    else
    {
        return false;
    }
}

?>