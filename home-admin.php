<?php include './models/imports.php';

if (!isset($_SESSION['admin'])) {
 $_SESSION['admin'] = null;
}

if (!isLoggedInAdmin()) {
 header('Location ./index.php');
} else { //load data for tables

  $numAdmins = selectCountAdmins();
  $numAccounts = selectCountAccounts();
  $numEvents = selectCountEvents();
  $numMeetings = selectCountMeetings();
  $numTasks = selectCountTasks();
  $numCourses = selectCountCourses();
  $numHomework = selectCountCourseWork();
  $numJobs = selectCountJobs();
  $numJobWork = selectCountJobWork();

  $allAdmins = selectAllAdmins();
  $allAccounts = selectAllAccounts();
  $allAccountSettings = selectAllAccountsSettings();
  $allCourses = selectAllCourses();
  $allCourseWork = selectAllCourseWork();
  $allJobs = selectAllJobs();
  $allJobWork = selectAllJobWork();
  $allEvents = selectAllEvents();
  $allMeetings = selectAllMeetings();
  $allTasks = selectAllTasks();

 ?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>µPlanner - Admin Portal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/navbar.min.css">
    <link rel="stylesheet" href="css/popupform.min.css">
    <link rel="stylesheet" href="css/admin.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <nav class="navbar-top">
      <ul class="left-item">
        <li>
          <a>Hello <?php echo ($_SESSION['admin']->get_username()); ?></a>
        </li>
      </ul>
      <ul >
        <li >
          <a>µPlanner</a>
        </li>
      </ul>
      <ul class="right-item">
        <li >
          <a href="./controller-admin.php?action=logout">Log Out</a>
        </li>
      </ul>
    </nav>
    <main>
      <p class="errorMsg">
        <?php if (isset($_SESSION['errorMsgs']['admin']['username'])) {echo htmlspecialchars($_SESSION['errorMsgs']['admin']['username']);}?>
        <?php if (isset($_SESSION['errorMsgs']['admin']['password'])) {echo htmlspecialchars($_SESSION['errorMsgs']['admin']['password']);}?>
      </p>
      <section class="dataTableContainer">
        <h3>App Statistics</h3>
        <table>
          <tr>
            <th>
              Number of Admins
            </th>
            <td>
              <?php echo htmlspecialchars($numAdmins); ?>
            </td>
          </tr>
          <tr>
            <th>
              Number of Accounts
            </th>
            <td>
              <?php echo htmlspecialchars($numAccounts); ?>
            </td>
          </tr>
        </table>
        <table>
          <tr>
            <th>
              Number of Events
            </th>
            <td>
              <?php echo htmlspecialchars($numEvents); ?>
            </td>
          </tr>
          <tr>
            <th>
              Number of Meetings
            </th>
            <td>
              <?php echo htmlspecialchars($numMeetings); ?>
            </td>
          </tr>
          <tr>
            <th>
              Number of Tasks
            </th>
            <td>
              <?php echo htmlspecialchars($numTasks); ?>
            </td>
          </tr>
          <tr>
            <th>
              Number of Courses
            </th>
            <td>
              <?php echo htmlspecialchars($numCourses); ?>
            </td>
          </tr>
          <tr>
            <th>
              Number of Homework Assignments
            </th>
            <td>
              <?php echo htmlspecialchars($numHomework); ?>
            </td>
          </tr>
          <tr>
            <th>
              Number of Jobs
            </th>
            <td>
              <?php echo htmlspecialchars($numJobs); ?>
            </td>
          </tr>
          <tr>
            <th>
              Number of Work Assignments
            </th>
            <td>
              <?php echo htmlspecialchars($numJobWork); ?>
            </td>
          </tr>
        </table>
      </section>
      <section class="dataTableContainer">
        <h3>Admins Table</h3>
        <button id="createAdminAccountButton" onclick='$("#create-admin-account-popup").show(500);'>
          Create New Admin Account
        </button>
          <div class="popupform" id="create-admin-account-popup">
            <button id="createAdminAccountCloseButton" class="close-button" onclick='$("#create-admin-account-popup").hide(500);'>X</button>
            <form method="post" action = "./controller-admin.php">
              <input type="hidden" name="action" value="create-admin-account">
              <table>
                <tr>
                  <th>
                    <label>
                      Username
                    </label>
                  </th>
                </tr>
                <tr>
                  <td>
                    <input type="text" name="username">
                  </td>
                </tr>
                <tr>
                <tr>
                  <th>
                    <label>
                      Password
                    </label>
                  </th>
                </tr>
                <tr>
                  <td>
                    <input type="password" name="password">
                  </td>
                </tr>
                <tr>
                  <th>
                    <label>
                      Confirm Password
                    </label>
                  </th>
                </tr>
                <tr>
                  <td>
                    <input type="password" name="passwordConfirm">
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="submit" value="Create Admin">
                  </td>
                </tr>
              </table>
            </form>
          </div>
        <table id="adminsTable">
          <tr>
            <th>Ban</th>
            <th>Change Password</th>
            <th>Id</th>
            <th>Username</th>
          </tr>
        <?php 
          if($allAdmins != null) {
            for($i = 0; $i < count($allAdmins); $i++) { ?>
              <tr>
                <td>
                  <form method="post" action="./controller-admin.php" onsubmit="return confirm('Are you sure that you want to delete <?php echo htmlspecialchars($allAdmins[$i]->get_username()); ?>?')">
                    <input type="hidden" name="action" value="ban-admin">
                    <input type="hidden" name="adminId" value="<?php echo htmlspecialchars($allAdmins[$i]->get_id()); ?>">
                    <input type="submit" value="Ban">
                  </form>
                </td>
                <td>
                  <button id="changeAdminPasswordButton<?php echo $i ?>" onclick='$("#change-admin-password-popup<?php echo $i ?>").show(500);'>
                    Change Password
                  </button>
                  <div class="popupform" id="change-admin-password-popup<?php echo $i ?>">
                    <button id="changeAdminPasswordCloseButton<?php echo $i ?>" class="close-button" onclick='$("#change-admin-password-popup<?php echo $i ?>").hide(500);'>X</button>
                    <form method="post" action = "./controller-admin.php">
                      <input type="hidden" name="action" value="change-admin-password">
                      <input type="hidden" name="adminId" value="<?php echo htmlspecialchars($allAdmins[$i]->get_id()); ?>">
                      <table>
                        <tr>
                          <th>
                            <label>
                              New Password
                            </label>
                          </th>
                        </tr>
                        <tr>
                          <td>
                            <input type="password" name="newPassword">
                          </td>
                        </tr>
                        <tr>
                          <th>
                            <label>
                              Confirm New Password
                            </label>
                          </th>
                        </tr>
                        <tr>
                          <td>
                            <input type="password" name="newPasswordConfirm">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <input type="submit" value="Change Password">
                          </td>
                        </tr>
                      </table>
                    </form>
                  </div>
                </td>
                <td>
                  <?php echo htmlspecialchars($allAdmins[$i]->get_id()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allAdmins[$i]->get_username()); ?>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
      <section class="dataTableContainer">
        <h3>Accounts Table</h3>
        <table id="accountsTable">
          <tr>
            <th>Ban</th>
            <th>Id</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Account Creation Date</th>
          </tr>
        <?php 
          if($allAccounts != null) {
            for($i = 0; $i < count($allAccounts); $i++) { ?>
              <tr>
                <td>
                  <form method="post" action="./controller-admin.php" onsubmit="return confirm('Are you sure that you want to ban <?php echo htmlspecialchars($allAccounts[$i]->get_firstName()); ?>?')">
                  <input type="hidden" name="action" value="ban-account">
                    <input type="hidden" name="accountId" value="<?php echo htmlspecialchars($allAccounts[$i]->get_id()); ?>">
                    <input type="submit" value="Ban">
                  </form>                  
                </td>
                <td>
                  <?php echo htmlspecialchars($allAccounts[$i]->get_id()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allAccounts[$i]->get_email()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allAccounts[$i]->get_firstName()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allAccounts[$i]->get_creationTime()); ?>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
      <h1>Anonymous Data</h1>
      <section class="dataTableContainer">
        <h3>Account Settings Table</h3>
        <table id="accountSettingsTable">
          <tr>
            <th>Default View</th>
            <th>Theme</th>
            <th>Last Updated Time</th>
          </tr>
        <?php 
          if($allAccountSettings != null) {
            for($i = 0; $i < count($allAccountSettings); $i++) { ?>
              <tr>
                <td>
                  <?php echo htmlspecialchars($allAccountSettings[$i]->get_defaultView()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allAccountSettings[$i]->get_theme()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allAccountSettings[$i]->get_creationTime()); ?>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
      <section class="dataTableContainer">
        <h3>Courses Table</h3>
        <table id="coursesTable">
          <tr>
            <th>Course Name</th>
            <th>Teacher</th>
            <th>Start Date</th>
            <th>End Date</th>
          </tr>
        <?php 
          if($allCourses != null) {
            for($i = 0; $i < count($allCourses); $i++) { ?>
              <tr>
                <td>
                  <?php echo htmlspecialchars($allCourses[$i]->get_courseName()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allCourses[$i]->get_teacher()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allCourses[$i]->get_startDate()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allCourses[$i]->get_endDate()); ?>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
      <section class="dataTableContainer">
        <h3>Course Work Table</h3>
        <table id="courseWorkTable">
          <tr>
            <th>Homework Name</th>
            <th>Type</th>
            <th>Priority</th>
            <th>Due Date</th>
            <th>Due Time</th>
            <th>Completed</th>
          </tr>
        <?php 
          if($allCourseWork != null) {
            for($i = 0; $i < count($allCourseWork); $i++) { ?>
              <tr>
                <td>
                  <?php echo htmlspecialchars($allCourseWork[$i]->get_workName()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allCourseWork[$i]->get_workType()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allCourseWork[$i]->get_Priority()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allCourseWork[$i]->get_dueDate()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allCourseWork[$i]->get_dueTime()); ?>
                </td>
                <td>
                  <?php if($allCourseWork[$i]->get_completed() == 1) { echo htmlspecialchars("Yes");} else{echo htmlspecialchars("No");} ?>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
      <section class="dataTableContainer">
        <h3>Jobs Table</h3>
        <table id="jobsTable">
          <tr>
            <th>Job Name</th>
          </tr>
        <?php 
          if($allJobs != null) {
            for($i = 0; $i < count($allJobs); $i++) { ?>
              <tr>
                <td>
                  <?php echo htmlspecialchars($allJobs[$i]->get_jobName()); ?>
                </td>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
      <section class="dataTableContainer">
        <h3>Job Work Table</h3>
        <table id="jobWorkTable">
          <tr>
            <th>Job Work Name</th>
            <th>Type</th>
            <th>Priority</th>
            <th>Due Date</th>
            <th>Due Time</th>
            <th>Completed</th>
          </tr>
        <?php 
          if($allJobWork != null) {
            for($i = 0; $i < count($allJobWork); $i++) { ?>
              <tr>
                <td>
                  <?php echo htmlspecialchars($allJobWork[$i]->get_workName()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allJobWork[$i]->get_workType()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allJobWork[$i]->get_Priority()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allJobWork[$i]->get_dueDate()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allJobWork[$i]->get_dueTime()); ?>
                </td>
                <td>
                  <?php if($allJobWork[$i]->get_completed() == 1) { echo htmlspecialchars("Yes");} else{echo htmlspecialchars("No");} ?>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
      <section class="dataTableContainer">
        <h3>Events Table</h3>
        <table id="eventsTable">
          <tr>
            <th>Event Name</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Completed</th>
          </tr>
        <?php 
          if($allEvents != null) {
            for($i = 0; $i < count($allEvents); $i++) { ?>
              <tr>
                <td>
                  <?php echo htmlspecialchars($allEvents[$i]->get_eventName()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allEvents[$i]->get_date()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allEvents[$i]->get_startTime()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allEvents[$i]->get_endTime()); ?>
                </td>
                <td>
                  <?php if($allEvents[$i]->get_completed() == 1) { echo htmlspecialchars("Yes");} else{echo htmlspecialchars("No");} ?>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
      <section class="dataTableContainer">
        <h3>Meetings Table</h3>
        <table id="meetingsTable">
          <tr>
            <th>Meeting Name</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Completed</th>
          </tr>
        <?php 
          if($allMeetings != null) {
            for($i = 0; $i < count($allMeetings); $i++) { ?>
              <tr>
                <td>
                  <?php echo htmlspecialchars($allMeetings[$i]->get_meetingName()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allMeetings[$i]->get_date()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allMeetings[$i]->get_startTime()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allMeetings[$i]->get_endTime()); ?>
                </td>
                <td>
                  <?php if($allMeetings[$i]->get_completed() == 1) { echo htmlspecialchars("Yes");} else{echo htmlspecialchars("No");} ?>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
      <section class="dataTableContainer">
        <h3>Tasks Table</h3>
        <table id="tasksTable">
          <tr>
            <th>Task Name</th>
            <th>Priority</th>
          </tr>
        <?php 
          if($allTasks != null) {
            for($i = 0; $i < count($allTasks); $i++) { ?>
              <tr>
                <td>
                  <?php echo htmlspecialchars($allTasks[$i]->get_taskName()); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($allTasks[$i]->get_priority()); ?>
                </td>
              </tr>
            <?php 
            }
          }
        ?>
        </table>
      </section>
    </main>
  </body>
</html>

 <?php }?>