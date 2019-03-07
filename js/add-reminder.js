const addReminderButton = document.getElementById('addReminderButton');
const addReminderArea = document.getElementById('add-reminder-popup');

(function () {
  addReminderArea.innerHTML = generateAddReminderForm();
})();

$("#addReminderCloseButton").click(function () {
  $("#add-reminder-popup").slideUp(500);
});

function generateAddReminderForm() {
  return /*html*/ `
    <button id="addReminderCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-reminder">
      <table>
        <tr>
          <th>
            <label>Reminder Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="reminderName" required>
          </td>
        </tr>
        <!--<tr>
          <th>
            <label>Location</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="location">
          </td>
        </tr>-->
        <tr>
          <th>
            <label>Date</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="date" name="date" required>
          </td>
        </tr>
        <tr>
          <th>
            <label>Time</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="time" name="remindTime" value="00:00">
          </td>
        </tr>
        <tr>
          <th colspan="2">
            <input type="submit" value="Set reminder">
          </th>
        </tr>
      </table>
    </form>
  `;
}