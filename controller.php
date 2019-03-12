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
   die();
  } else {
   $_SESSION['email'] = $email; //preserve typed in email on fail login
   header('Location: ./index.php');
   die();
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
   $account = new Account(null, $email, $firstName, 'month', 'purple', false, false, null);
   $account->set_id(insertAccount($account, hashPassword($password)));
   login($account);
   header('Location: ./home.php');
   exit();
  } else {
   header('Location: ./index.php');
   exit();
  }

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

 case 'add-homework':

  $courseId     = filter_input(INPUT_POST, 'courseId');
  $homeworkName = filter_input(INPUT_POST, 'homeworkName');
  $homeworkType = filter_input(INPUT_POST, 'homeworkType');
  $priority     = filter_input(INPUT_POST, 'priority');
  $dueDate      = filter_input(INPUT_POST, 'dueDate');
  $dueTime      = filter_input(INPUT_POST, 'dueTime');
  $completed    = filter_input(INPUT_POST, 'completed');

  if ($completed == null) {
   $completed = false;
  }

  $newCourseWork = new CourseWork(null, $homeworkName, $homeworkType, $priority, $dueDate, $dueTime, $completed);

  $newCourseWork->set_id(insertCourseWork($newCourseWork, $courseId));

  header('Location: ./home.php');

  break;

 case 'add-job':

  $jobName  = filter_input(INPUT_POST, 'jobName');
  $location = null;

  $newJob = new Job(null, $jobName, null, null, null);

  $newJob->set_id(insertJob($newJob));

  header('Location: ./home.php');

  break;

  case 'add-work':

  $jobId     = filter_input(INPUT_POST, 'jobId');
  $jobWorkName = filter_input(INPUT_POST, 'jobWorkName');
  $jobWorkType = filter_input(INPUT_POST, 'jobWorkType');
  $priority     = filter_input(INPUT_POST, 'priority');
  $dueDate      = filter_input(INPUT_POST, 'dueDate');
  $dueTime      = filter_input(INPUT_POST, 'dueTime');
  $completed    = filter_input(INPUT_POST, 'completed');

  if ($completed == null) {
   $completed = false;
  }

  $newJobWork = new JobWork(null, $jobWorkName, $jobWorkType, $priority, $dueDate, $dueTime, $completed);

  $newJobWork->set_id(insertJobWork($newJobWork, $jobId));

  header('Location: ./home.php');

  break;

 case 'change-settings':

  $emailAddress = filter_input(INPUT_POST, 'emailAddress');
  $firstName    = filter_input(INPUT_POST, 'firstName');
  $defaultView  = filter_input(INPUT_POST, 'defaultView');
  $theme        = filter_input(INPUT_POST, 'theme');

  $account = $_SESSION['account'];
  $account->set_email($emailAddress);
  $account->set_firstName($firstName);
  $account->set_defaultView($defaultView);
  $account->set_theme($theme);

  updateAccountSettings($account);

  header('Location: ./home.php');

  break;

 case 'change-password':

  $oldPassword        = filter_input(INPUT_POST, 'oldPassword');
  $newPassword        = filter_input(INPUT_POST, 'newPassword');
  $newPasswordConfirm = filter_input(INPUT_POST, 'newPasswordConfirm');

  $errorMsgs['oldpassword'] = validateLogin($_SESSION['account']->get_email(), $oldPassword);
  $errorMsgs['newpassword'] = validatePassword($newPassword, $newPasswordConfirm);

  if ($errorMsgs['oldpassword'] === null && $errorMsgs['newpassword'] === null) {
   updateAccountPassword(hashPassword($newPassword));
   $confirmMsgs['password'] = 'Your Password Was Succesfully Changed';
  }

  header('Location: ./home.php');

  break;

 case 'add-event':

  $eventId   = filter_input(INPUT_POST, 'eventId');
  $eventName = filter_input(INPUT_POST, 'eventName');
  $date      = filter_input(INPUT_POST, 'date');
  $startTime = filter_input(INPUT_POST, 'startTime');
  $endTime   = filter_input(INPUT_POST, 'endTime');
  $completed = filter_input(INPUT_POST, 'completed');
  $location  = null;

  if ($completed == null) {
   $completed = false;
  }

  $newEvent = new Event($eventId, $eventName, $location, $date, $startTime, $endTime, $completed);

  if ($eventId == null) {
   $newEvent->set_id(insertEvent($newEvent));
  } else {
   updateEvent($newEvent);
  }

  header('Location: ./home.php');

  break;

 case 'add-meeting':

  $meetingId   = filter_input(INPUT_POST, 'meetingId');
  $meetingName = filter_input(INPUT_POST, 'meetingName');
  $date        = filter_input(INPUT_POST, 'date');
  $startTime   = filter_input(INPUT_POST, 'startTime');
  $endTime     = filter_input(INPUT_POST, 'endTime');
  $completed   = filter_input(INPUT_POST, 'completed');
  $location    = null;

  if ($completed == null) {
   $completed = false;
  }

  $newMeeting = new Meeting($meetingId, $meetingName, $location, $date, $startTime, $endTime, $completed);

  $newMeeting->set_id(insertMeeting($newMeeting));

  header('Location: ./home.php');

  break;

 case 'add-task':

  $taskName = filter_input(INPUT_POST, 'taskName');
  $priority = filter_input(INPUT_POST, 'priority');

  $newTask = new Task(null, $taskName, $priority, false);

  $newTask->set_id(insertTask($newTask));

  header('Location: ./home.php');

  break;

 case 'complete-event':

  $eventId = filter_input(INPUT_POST, 'eventId');
  updateEventComplete($eventId);

  header('Location: ./home.php');

  break;

 case 'complete-meeting':

  $meetingId = filter_input(INPUT_POST, 'meetingId');
  updateMeetingComplete($meetingId);

  header('Location: ./home.php');

  break;

 case 'complete-task':

  $taskId = filter_input(INPUT_POST, 'taskId');
  deleteTask($taskId);

  header('Location: ./home.php');

  break;

 case 'complete-homework':

  $homeworkId = filter_input(INPUT_POST, 'homeworkId');
  updateCourseWorkComplete($homeworkId);

  header('Location: ./home.php');

  break;

  case 'complete-jobWork':

  $jobWorkId = filter_input(INPUT_POST, 'jobWorkId');
  updateJobWorkComplete($jobWorkId);

  header('Location: ./home.php');

  break;

 default:

  //header('Location: ./index.php');

  break;

}

include('./offline.html');