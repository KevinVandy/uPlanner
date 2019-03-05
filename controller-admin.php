<?php

include './models/imports.php';

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

 case 'loginAdmin':

  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');

  $_SESSION['errorMsgs']['login'] = validateLoginAdmin($username, $password);

  if ($_SESSION['errorMsgs']['login'] == null) {
   $admin = selectAdminByUsername($username);
   loginAdmin($admin);
   header('Location: ./home-admin.php');
   die();
  } else {
   header('Location: ./index.php');
   die();
  }

  break;

 case 'logout':

  logout();
  header('Location: ./index.php');

  break;

 case 'create-admin-account':

  if (isLoggedInAdmin()) {
   $username        = filter_input(INPUT_POST, 'username');
   $password        = filter_input(INPUT_POST, 'password');
   $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm');

   $_SESSION['errorMsgs']['admin'] = validateSignupAdmin($username, $password, $passwordConfirm);

   if (isArrayNull($_SESSION['errorMsgs']['admin'])) {
    $admin = new Admin($null, $username);
    $admin->set_id(insertAdmin($admin, $password));
   }
  }

  header('Location: ./home-admin.php');

  break;

 case 'change-admin-password':

  if (isLoggedInAdmin()) {

   $adminId            = filter_input(INPUT_POST, 'adminId');
   $newPassword        = filter_input(INPUT_POST, 'newPassword');
   $newPasswordConfirm = filter_input(INPUT_POST, 'newPasswordConfirm');

   $_SESSION['errorMsgs']['admin'] = validatePassword($newPassword, $newPasswordConfirm);

   if ($_SESSION['errorMsgs']['admin'] == null) {
    updateAdminPassword($adminId, $newPassword);
   }
  }
  header('Location: ./home-admin.php');

  break;

 case 'ban-admin':

  if (isLoggedInAdmin()) {
   $adminId = filter_input(INPUT_POST, 'adminId');
   deleteAdmin($adminId);
  }

  header('Location: ./home-admin.php');

  break;

 case 'ban-account':

  if (isLoggedInAdmin()) {
   $accountId = filter_input(INPUT_POST, 'accountId');
   deleteAccount($accountId);
  }

  header('Location: ./home-admin.php');

  break;

 default:

  header('Location: ./index.php');

  break;

}
