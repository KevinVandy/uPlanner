<?php session_start();

//import classes
require_once('models/classes/account.php');
require_once('models/classes/course.php');
require_once('models/classes/coursetime.php');
require_once('models/classes/coursework.php');
require_once('models/classes/event.php');
require_once('models/classes/job.php');
require_once('models/classes/jobtime.php');
require_once('models/classes/jobwork.php');
require_once('models/classes/meeting.php');
require_once('models/classes/reminder.php');
require_once('models/classes/task.php');

//import db functions
require_once('models/db/db_connect.php');
require_once('models/db/db_find.php');
require_once('models/db/db_select.php');
require_once('models/db/db_insert.php');
require_once('models/db/db_update.php');
require_once('models/db/db_delete.php');

//import val functions
require_once('models/val/val_session.php');


if(isLoggedIn()) //go to the calendar page if user is already logged in
{
    header("./calendar.php");
}
else //show the login/signup page
{
    if (!isset($_SESSION['account'])) $_SESSION['account'] = NULL;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>µPlanner - Log in</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="app.js"></script>
    
</head>
<body>
    <header>
        <h1 class="head1">µPlanner</h1>
        <h1 class="head2">Micro-Manage Your Life!</h1>
    </header>
    <main>
        
    </main>
</body>
</html>