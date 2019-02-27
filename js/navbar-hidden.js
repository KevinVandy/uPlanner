const navbarHidden = document.getElementById("navbar-hidden");

(function () {

})();

function createHiddenNavBar(type) {

  if (type == "add") {
    return /*html*/ `
      <table class="add-items">
        <tr>
          <td><a href="#" onclick='$("#add-event-popup").slideDown(500);'>Event</a></td>
          <td><a href="#" onclick='$("#add-meeting-popup").slideDown(500);'>Meeting</a></td>
          <td><a href="#" onclick='$("#add-task-popup").slideDown(500);'>Task</a></td>
          <td><a href="#" onclick='$("#add-reminder-popup").slideDown(500);'>Reminder</a></td>
          <td><a href="#" onclick='$("#add-homework-popup").slideDown(500);'>Homework</a></td>
          <td><a href="#" onclick='$("#add-work-popup").slideDown(500);'>Work</a></td>
        </tr>
      </table>
    `;
  } else if (type == "account") {
    return /*html*/ `
      <table class="account-items">
        <tr>
          <td><a href="#" id="addJobButton" onclick='$("#add-job-popup").slideDown(500);'>Add Job</a></td>
          <td><a href="#" id="addCourseButton" onclick='$("#add-course-popup").slideDown(500);'>Add Course</a></td>
          <td><a href="#" id="settingsButton" onclick='$("#settings-popup").slideDown(500);'>Settings</a></td>
          <td><a href="./controller.php?action=logout">Log Out</a></td>
        </tr>
      </table>
    `;
  }
}

$("#toggle-navbar-hidden-add").click(function () {
  navbarHidden.innerHTML = createHiddenNavBar("add");
  $("#navbar-hidden").slideToggle(300);
});

$("#toggle-navbar-hidden-account").click(function () {
  navbarHidden.innerHTML = createHiddenNavBar("account");
  $("#navbar-hidden").slideToggle(300);
});