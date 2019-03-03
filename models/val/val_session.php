<?php

function loginAdmin($admin)
{
 $_SESSION['admin'] = $admin;
}

function login($account)
{
 $_SESSION['account'] = $account;
}

function logout()
{
 session_destroy();
}

function isLoggedInAdmin()
{
 if (isset($_SESSION['admin']) && $_SESSION['admin'] != null) {
  return true;
 } else {
  return false;
 }
}

function isLoggedIn()
{
 if (isset($_SESSION['account']) && $_SESSION['account'] != null) {
  return true;
 } else {
  return false;
 }
}

function validateLoginAdmin($username, $password)
{
 if (selectAdminPassword($username) == $password) {
  return null;
 } else {
  return 'Login Error';
 }
}

function validateLogin($email, $password)
{
 if (findEmail($email) && password_verify($password, selectPasswordHashByEmail($email))) {
  return null;
 } else {
  return 'Login Error';
 }
}

function hashPassword($passwordPlainText)
{
 $options      = ['cost' => 13];
 $passwordHash = password_hash($passwordPlainText, PASSWORD_BCRYPT, $options);
 return $passwordHash;
}
