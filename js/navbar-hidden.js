const navbarHidden = document.getElementById("navbar-hidden");

(function () {

})();

function createHiddenNavBar(type) {

  if (type == "add") {
    return /*html*/ `
      <table class="add-items">
        <tr>
          <td><a href="#">Event</a></td>
          <td><a>Meeting</a></td>
          <td><a>Task</a></td>
          <td><a>Reminder</a></td>
          <td><a>Homework</a></td>
          <td><a>Work</a></td>
        </tr>
      </table>
    `;
  } else if (type == "account") {
    return /*html*/ `
      <table class="account-items">
        <tr>
          <td><a href="#" id="addJobButton" onclick='$("#add-job-popup").slideDown(1000);'>Add Job</a></td>
          <td><a href="#" id="addCourseButton" onclick='$("#add-course-popup").slideDown(1000);'>Add Course</a></td>
          <td><a href="#" id="settingsButton" onclick='$("#settings-popup").slideDown(1000);'>Settings</a></td>
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