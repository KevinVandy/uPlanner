<?php include './models/imports.php';

if (!isset($_SESSION['account'])) {
 $_SESSION['account'] = null;
}

if (!isLoggedIn()) {
 header('Location: ./index.php');
 exit();
} else {
 ?>
<!DOCTYPE html>
<html lang="en"></html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>µPlanner</title>

  <link rel="shortcut icon" href="favicon.ico">
  <link rel="manifest" href="manifest.webmanifest">

  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/main.min.css">
  <link rel="stylesheet" href="css/navbar.min.css">
  <link rel="stylesheet" href="css/calendar.min.css">
  <link rel="stylesheet" href="css/items.min.css">
  <link rel="stylesheet" href="css/popupform.min.css">

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="app.min.js" defer></script>

  <?php include 'js/info.php'?>

</head>

<body>
  <nav id="navbar-top" class="navbar-top">
    <script src="js/navbar-top.min.js" defer></script>
  </nav>
  <nav id="navbar-hidden" class="navbar-hidden">
    <script src="js/navbar-hidden.min.js" defer></script>
  </nav>
  <main>
    <section id="calendar" class="calendar">
      <script src="js/calendar.min.js" defer></script>
    </section>
    <section id="items" class="items">
      <div class="itemsSection" id="eventItems">
      </div>
      <div class="itemsSection" id="meetingItems">
      </div>
      <div class="itemsSection" id="homeworkItems">
      </div>
      <div class="itemsSection" id="workItems">
      </div>
      <div class="todoList" id="taskItems">
      </div>
      <script src="js/items.js" defer></script>
    </section>
    <section id="add-job-popup" class="popupform">
      <script src="js/add-job.min.js" defer></script>
    </section>
    <section id="add-course-popup" class="popupform">
      <script src="js/add-course.min.js" defer></script>
    </section>
    <section id="settings-popup" class="popupform">
      <script src="js/settings.min.js" defer></script>
    </section>
    <section id="add-event-popup" class="popupform">
      <script src="js/add-event.min.js" defer></script>
    </section>
    <section id="add-meeting-popup" class="popupform">
      <script src="js/add-meeting.min.js" defer></script>
    </section>
    <section id="add-task-popup" class="popupform">
      <script src="js/add-task.min.js" defer></script>
    </section>
    <section id="add-reminder-popup" class="popupform">
      <script src="js/add-reminder.min.js" defer></script>
    </section>
    <section id="add-homework-popup" class="popupform">
      <script src="js/add-homework.min.js" defer></script>
    </section>
    <section id="add-work-popup" class="popupform">
      <script src="js/add-work.min.js" defer></script>
    </section>
  </main>
  <nav id="navbar-bottom" class="navbar-bottom">
    <script src="js/navbar-bottom.min.js" defer></script>
  </nav>
  <footer>
    
  </footer>
</body>

</html>
<?php
}
?>