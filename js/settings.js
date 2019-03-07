const settingsButton = document.getElementById('settingsButton');
const settingsArea = document.getElementById('settings-popup');

(function () {
  settingsArea.innerHTML = generateSettingsForm();
  addSettingsInfo();
})();

$("#settingsCloseButton").click(function () {
  $("#settings-popup").slideUp(500);
});

function generateSettingsForm() {
  return /*html*/ `
    <button id="settingsCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="change-settings">
      <table>
        <tr>
          <th>
            <label>Email Address</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="email" name="emailAddress" id="settingsEmailAddress">
          </td>
        </tr>
        <tr>
          <th>
            <label>First Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="firstName" id="settingsFirstName">
          </td>
        </tr>
        <tr>
          <th>
            <label>Default View</label>
          </th>
        </tr>
        <tr>
          <td>
            <select name="defaultView">
              <option value="day" id="dayOption">Day</option>
              <option value="week" id="weekOption">Week</option>
              <option value="month" id="monthOption">Month</option>
              <option value="year" id="yearOption">Year</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>
            <label>Theme</label>
          </th>
        </tr>
        <tr>
          <td>
            <select name="theme">
              <option value="default" id="defaultThemeOption">Default</option>
              <option value="light" id="lightThemeOption">Light</option>
              <option value="dark" id="darkThemeOption">Dark</option>
            </select>
          </td>
        </tr>
        <tr>
          <th colspan="2">
            <input type="submit" value="Save Settings">
          </th>
        </tr>
      </table>
    </form>
    <button onclick='$("#change-password-popup").show(500);'>Change Password</button>
    <div class="popupform" id="change-password-popup">
      <button class="close-button" id="changeAccountPasswordCloseButton" onclick='$("#change-password-popup").slideUp(500);'>X</button>
      <form action="./controller.php" method="post">
        <input type="hidden" name="action" value="change-password">
        <table>
          <tr>
            <th>
              <label>
                Old Password
              </label>
            </th>
          </tr>
          <tr>
            <td>
              <input type="password" name="oldPassword">
            </td>
          </tr>
          <tr>
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
  `;
}

function addSettingsInfo(){

  document.getElementById("settingsEmailAddress").value = account.email;
  document.getElementById("settingsFirstName").value = account.firstName;

  if(account.settings.defaultView == "day"){
    $('#dayOption').attr('selected', 'selected');
  } else if(account.settings.defaultView == "week"){
    $('#weekOption').attr('selected', 'selected');
  } else if(account.settings.defaultView == "month"){
    $('#monthOption').attr('selected', 'selected');
  } else if(account.settings.defaultView == "year"){
    $('#yearOption').attr('selected', 'selected');
  }
  
  if(account.settings.theme == "default"){
    $('#defaultThemeOption').attr('selected', 'selected');
  } else if(account.settings.theme == "light"){
    $('#lightThemeOption').attr('selected', 'selected');
  } else if(account.settings.theme == "dark"){
    $('#darkThemeOption').attr('selected', 'selected');
  }

}