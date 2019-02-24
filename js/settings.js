const settingsButton = document.getElementById('settingsButton');
const settingsArea = document.getElementById('settings-popup');

(function () {
  settingsArea.innerHTML = generateSettingsForm();
})();

$("#settingsCloseButton").click(function () {
  $("#settings-popup").slideUp(500);
});

function generateSettingsForm() {
  return /*html*/ `
    <button id="settingsCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="changeSettings">
      <table>
        <tr>
          <th>
            <label>Email Address</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="email" name="emailAddress">
          </td>
        </tr>
        <tr>
          <th>
            <label>First Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="teacher">
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
              <option value="Day">Day</option>
              <option value="Week">Week</option>
              <option value="Month" selected>Month</option>
              <option value="Year">Year</option>
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
              <option value="Default">Default</option>
              <option value="Light">Light</option>
              <option value="Dark">Dark</option>
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
  `;
}