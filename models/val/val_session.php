<?php

function login($account)
{
    $_SESSION['account'] = $account;
}

function logout()
{
    session_destroy();
}

function isLoggedIn()
{
    if (isset($_SESSION['account']) && $_SESSION['account']->get_id() != null) {
        return true;
    } else {
        return false;
    }
}

function validateLogin($email, $password)
{
    if (findEmail($email) && password_verify(selectPasswordHashByEmail($email), $password)) {
        return true;
    } else {
        return false;
    }
}
