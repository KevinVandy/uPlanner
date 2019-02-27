<?php

$account  = $_SESSION['account'];
$courses  = selectCoursesByAccountId($_SESSION['account']->get_id());
$jobs     = selectJobsByAccountId($_SESSION['account']->get_id());
$events   = selectEventsByAccountId($_SESSION['account']->get_id());
$meetings = selectMeetingsByAccountId($_SESSION['account']->get_id());
$tasks    = selectTasksByAccountId($_SESSION['account']->get_id());

?>

<script>

  let account = {};
  account.id = "<?php echo htmlspecialchars($account->get_id()); ?>";
  account.email = "<?php echo htmlspecialchars($account->get_email()); ?>";
  account.firstName = "<?php echo htmlspecialchars($account->get_firstName()); ?>";

  account.settings = {};
  account.settings.defaultView = "<?php echo htmlspecialchars($account->get_defaultView()); ?>";
  account.settings.theme = "<?php echo htmlspecialchars($account->get_theme()); ?>";
  account.settings.hideCompleted = <?php echo htmlspecialchars($account->get_hideCompleted()); ?>;
  account.settings.hideHints = <?php echo htmlspecialchars($account->get_hideHints()); ?>;
  account.settings.creationTime = "<?php echo htmlspecialchars($account->get_creationTime()); ?>";

  let numCourses = <?php echo htmlspecialchars(count($courses)) ?>;
  account.courses = [];
  <?php for ($i = 0; $i < count($courses); $i++) {?>
    account.courses[<?php echo htmlspecialchars($i); ?>] = {};
    account.courses[<?php echo htmlspecialchars($i); ?>].courseName = "<?php echo htmlspecialchars($courses[$i]->get_courseName()) ?>";
    account.courses[<?php echo htmlspecialchars($i); ?>].teacher = "<?php echo htmlspecialchars($courses[$i]->get_teacher()) ?>";
    account.courses[<?php echo htmlspecialchars($i); ?>].startDate = "<?php echo htmlspecialchars($courses[$i]->get_startDate()) ?>";
    account.courses[<?php echo htmlspecialchars($i); ?>].endDate = "<?php echo htmlspecialchars($courses[$i]->get_endDate()) ?>";
  <?php }?>

</script>
