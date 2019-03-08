<?php

//import classes
require_once 'classes/account.php';
require_once 'classes/admin.php';
require_once 'classes/course.php';
require_once 'classes/coursetime.php';
require_once 'classes/coursework.php';
require_once 'classes/event.php';
require_once 'classes/job.php';
require_once 'classes/jobtime.php';
require_once 'classes/jobwork.php';
require_once 'classes/meeting.php';
require_once 'classes/reminder.php';
require_once 'classes/task.php';

//import db functions
require_once 'db/db_connect.php';
require_once 'db/db_count.php';
require_once 'db/db_find.php';
require_once 'db/db_select_all.php';
require_once 'db/db_select.php';
require_once 'db/db_insert.php';
require_once 'db/db_update.php';
require_once 'db/db_delete.php';

//import val functions
require_once 'val/val_action.php';
require_once 'val/val_data.php';
require_once 'val/val_session.php';
require_once 'val/val_input.php';

session_start();