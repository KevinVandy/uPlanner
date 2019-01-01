<?php session_start();

//import classes
require_once('classes/account.php');
require_once('classes/course.php');
require_once('classes/coursetime.php');
require_once('classes/coursework.php');
require_once('classes/event.php');
require_once('classes/job.php');
require_once('classes/jobtime.php');
require_once('classes/jobwork.php');
require_once('classes/meeting.php');
require_once('classes/reminder.php');
require_once('classes/task.php');

//import db functions
require_once('models/db_connect.php');
require_once('models/db_find.php');
require_once('models/db_select.php');
require_once('models/db_insert.php');
require_once('models/db_update.php');
require_once('models/db_delete.php');

//import val functions
require_once('models/val_session.php');

$action = filter_input()


?>