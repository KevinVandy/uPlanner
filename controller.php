<?php 

include './models/imports.php';

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

 case 'login':

  $email    = filter_input(INPUT_POST, 'email');
  $password = filter_input(INPUT_POST, 'password');

  $_SESSION['errorMsgs']['login'] = validateLogin($email, $password);

  if ($_SESSION['errorMsgs']['login'] == null) {
   $account = selectAccountByEmail($email);
   login($account);
   header('Location: ./home.php');
   exit();
  } else {
   $_SESSION['email'] = $email; //preserve typed in email on fail login
   header('Location: ./index.php');
   exit();
  }

  break;

 case 'logout':

  logout();
  header('Location: ./index.php');
  exit();

 case 'signup':

  $firstName       = filter_input(INPUT_POST, 'firstName');
  $email           = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password        = filter_input(INPUT_POST, 'password');
  $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm');

  $_SESSION['errorMsgs'] = validateSignUp($firstName, $email, $password, $passwordConfirm);

  if (isArrayNull($_SESSION['errorMsgs'])) {
   $account = new Account(null, $email, $firstName, 'default', 'default', false, false, null);
   $account->set_id(insertAccount($account, hashPassword($password)));
   login($account->get_id());
   header('Location: ./home.php');
   exit();
  } else {
   header('Location: ./index.php');
   exit();
  }

  break;

 default:

  header('Location: ./index.php');

  break;

 case 'add-course':

  $courseName = filter_input(INPUT_POST, 'courseName');
  $teacher    = filter_input(INPUT_POST, 'teacher');
  $startDate  = filter_input(INPUT_POST, 'startDate');
  $endDate    = filter_input(INPUT_POST, 'endDate');
  $location   = null;

  $newCourse = new Course(null, $courseName, $location, $teacher, $startDate, $endDate, null, null);

  $newCourse->set_id(insertCourse($newCourse));

  header('Location: ./home.php');

  break;

}
