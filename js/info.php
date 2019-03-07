<?php

// select all account info from the database
try {
 $account  = selectAccountByEmail($_SESSION['account']->get_email());
 $courses  = selectCoursesByAccountId($_SESSION['account']->get_id());
 $jobs     = selectJobsByAccountId($_SESSION['account']->get_id());
 $events   = selectEventsByAccountId($_SESSION['account']->get_id());
 $meetings = selectMeetingsByAccountId($_SESSION['account']->get_id());
 $tasks    = selectTasksByAccountId($_SESSION['account']->get_id());
} catch (Exception $ex) {
 echo ("Could not load user data");die();
}

// then put all of that info into an 'account' javascript object
?>

<script>

let account = {};
  account.id = <?php echo htmlspecialchars($account->get_id()); ?>;
  account.email = "<?php echo htmlspecialchars($account->get_email()); ?>";
  account.firstName = "<?php echo htmlspecialchars($account->get_firstName()); ?>";

  account.settings = {};
    account.settings.defaultView = "<?php echo htmlspecialchars($account->get_defaultView()); ?>";
    account.settings.theme = "<?php echo htmlspecialchars($account->get_theme()); ?>";
    account.settings.hideCompleted = <?php echo htmlspecialchars($account->get_hideCompleted()); ?>;
    account.settings.hideHints = <?php echo htmlspecialchars($account->get_hideHints()); ?>;
    account.settings.creationTime = "<?php echo htmlspecialchars($account->get_creationTime()); ?>";

  account.courses = [];

  <?php
if ($courses != null) {
 for ($i = 0; $i < count($courses); $i++) {
  ?>

    account.courses[<?php echo htmlspecialchars($i); ?>] = {};

      account.courses[<?php echo htmlspecialchars($i); ?>].id = <?php echo htmlspecialchars($courses[$i]->get_id()) ?>;
      account.courses[<?php echo htmlspecialchars($i); ?>].courseName = "<?php echo htmlspecialchars($courses[$i]->get_courseName()) ?>";
      account.courses[<?php echo htmlspecialchars($i); ?>].teacher = "<?php echo htmlspecialchars($courses[$i]->get_teacher()) ?>";
      account.courses[<?php echo htmlspecialchars($i); ?>].startDate = "<?php echo htmlspecialchars($courses[$i]->get_startDate()) ?>";
      account.courses[<?php echo htmlspecialchars($i); ?>].endDate = "<?php echo htmlspecialchars($courses[$i]->get_endDate()) ?>";

      account.courses[<?php echo htmlspecialchars($i); ?>].courseTimes = [];

      account.courses[<?php echo htmlspecialchars($i); ?>].courseWork = [];

      <?php
if ($courses[$i]->get_courseWork() != null) {
   for ($j = 0; $j < count($courses[$i]->get_courseWork()); $j++) {
    ?>
  account.courses[<?php echo htmlspecialchars($i); ?>].courseWork[<?php echo htmlspecialchars($j); ?>] = {};

          account.courses[<?php echo htmlspecialchars($i); ?>].courseWork[<?php echo htmlspecialchars($j); ?>].id = <?php echo htmlspecialchars($courses[$i]->get_courseWork()[$j]->get_id()); ?>;
          account.courses[<?php echo htmlspecialchars($i); ?>].courseWork[<?php echo htmlspecialchars($j); ?>].workName = "<?php echo htmlspecialchars($courses[$i]->get_courseWork()[$j]->get_workName()); ?>";
          account.courses[<?php echo htmlspecialchars($i); ?>].courseWork[<?php echo htmlspecialchars($j); ?>].workType = "<?php echo htmlspecialchars($courses[$i]->get_courseWork()[$j]->get_workType()); ?>";
          account.courses[<?php echo htmlspecialchars($i); ?>].courseWork[<?php echo htmlspecialchars($j); ?>].priority = "<?php echo htmlspecialchars($courses[$i]->get_courseWork()[$j]->get_priority()); ?>";
          account.courses[<?php echo htmlspecialchars($i); ?>].courseWork[<?php echo htmlspecialchars($j); ?>].dueDate = new Date("<?php echo htmlspecialchars($courses[$i]->get_courseWork()[$j]->get_dueDate()); ?>");
          account.courses[<?php echo htmlspecialchars($i); ?>].courseWork[<?php echo htmlspecialchars($j); ?>].dueTime = moment("<?php echo htmlspecialchars($courses[$i]->get_courseWork()[$j]->get_dueTime()); ?>", "HH:mm:ss");
          account.courses[<?php echo htmlspecialchars($i); ?>].courseWork[<?php echo htmlspecialchars($j); ?>].completed = <?php echo htmlspecialchars($courses[$i]->get_courseWork()[$j]->get_completed()); ?>;


      <?php
}
  }
  ?>
  <?php
}
}
?>

  account.jobs = [];

  <?php
if ($jobs != null) {
 for ($i = 0; $i < count($jobs); $i++) {
  ?>

    account.jobs[<?php echo htmlspecialchars($i); ?>] = {};

      account.jobs[<?php echo htmlspecialchars($i); ?>].id = <?php echo htmlspecialchars($jobs[$i]->get_id()) ?>;
      account.jobs[<?php echo htmlspecialchars($i); ?>].jobName = "<?php echo htmlspecialchars($jobs[$i]->get_jobName()) ?>";

      account.jobs[<?php echo htmlspecialchars($i); ?>].jobTimes = [];

      account.jobs[<?php echo htmlspecialchars($i); ?>].jobWork = [];

  <?php
}
}
?>

  account.events = [];

  <?php
if ($events != null) {
 for ($i = 0; $i < count($events); $i++) {
  ?>

    account.events[<?php echo htmlspecialchars($i); ?>] = {};

      account.events[<?php echo htmlspecialchars($i); ?>].id = <?php echo htmlspecialchars($events[$i]->get_id()) ?>;
      account.events[<?php echo htmlspecialchars($i); ?>].eventName = "<?php echo htmlspecialchars($events[$i]->get_eventName()) ?>";
      account.events[<?php echo htmlspecialchars($i); ?>].date = new Date("<?php echo htmlspecialchars($events[$i]->get_date()) ?>");
      account.events[<?php echo htmlspecialchars($i); ?>].startTime = moment("<?php echo htmlspecialchars($events[$i]->get_startTime()) ?>", "HH:mm:ss");
      account.events[<?php echo htmlspecialchars($i); ?>].endTime = moment("<?php echo htmlspecialchars($events[$i]->get_endTime()) ?>", "HH:mm:ss");
      account.events[<?php echo htmlspecialchars($i); ?>].completed = <?php echo htmlspecialchars($events[$i]->get_completed()) ?>;

      account.events[<?php echo htmlspecialchars($i); ?>].location = {};

  <?php
}
}
?>

  account.meetings = [];

  <?php
if ($meetings != null) {
 for ($i = 0; $i < count($meetings); $i++) {
  ?>

    account.meetings[<?php echo htmlspecialchars($i); ?>] = {};

      account.meetings[<?php echo htmlspecialchars($i); ?>].id = <?php echo htmlspecialchars($meetings[$i]->get_id()) ?>;
      account.meetings[<?php echo htmlspecialchars($i); ?>].meetingName = "<?php echo htmlspecialchars($meetings[$i]->get_meetingName()) ?>";
      account.meetings[<?php echo htmlspecialchars($i); ?>].date = new Date("<?php echo htmlspecialchars($meetings[$i]->get_date()) ?>");
      account.meetings[<?php echo htmlspecialchars($i); ?>].startTime = moment("<?php echo htmlspecialchars($meetings[$i]->get_startTime()) ?>", "HH:mm:ss");
      account.meetings[<?php echo htmlspecialchars($i); ?>].endTime = moment("<?php echo htmlspecialchars($meetings[$i]->get_endTime()) ?>", "HH:mm:ss");
      account.meetings[<?php echo htmlspecialchars($i); ?>].completed = <?php echo htmlspecialchars($meetings[$i]->get_completed()) ?>;

      account.meetings[<?php echo htmlspecialchars($i); ?>].location = {};

  <?php
}
}
?>

  account.tasks = [];

<?php
if ($tasks != null) {
 for ($i = 0; $i < count($tasks); $i++) {
  ?>

  account.tasks[<?php echo htmlspecialchars($i); ?>] = {};

    account.tasks[<?php echo htmlspecialchars($i); ?>].id = <?php echo htmlspecialchars($tasks[$i]->get_id()) ?>;
    account.tasks[<?php echo htmlspecialchars($i); ?>].taskName = "<?php echo htmlspecialchars($tasks[$i]->get_taskName()) ?>";
    account.tasks[<?php echo htmlspecialchars($i); ?>].priority = "<?php echo htmlspecialchars($tasks[$i]->get_priority()) ?>";

    account.tasks[<?php echo htmlspecialchars($i); ?>].location = {};

<?php
}
}
?>

</script>
