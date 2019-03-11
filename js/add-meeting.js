const addMeetingButton = document.getElementById('addMeetingButton');
const addMeetingArea = document.getElementById('add-meeting-popup');

(function () {
  addMeetingArea.innerHTML = generateAddMeetingForm();
})();

$("#addMeetingCloseButton").click(function () {
  $("#add-meeting-popup").slideUp(500);
});

function generateAddMeetingForm() {
  return /*html*/ `
    <button id="addMeetingCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-meeting">
      <input type="hidden" name="meetingId" id="meetingId">
      <table>
        <tr>
          <th>
            <label>Meeting Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="meetingName" maxlength="50" required>
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
        </tr> -->
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
            <label>Start Time</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="time" name="startTime" id="meetingStartTime" value="00:00">
          </td>
        </tr>
        <tr>
          <th>
            <label>End Time</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="time" name="endTime" id="meetingEndTime" value="00:00">
          </td>
        </tr>
        <tr>
          <th>
            <label>Completed</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="completed" id="meetingCompleted" value="1">
          </td>
        </tr>
        <tr>
          <th colspan="2">
            <input type="submit" value="Save Meeting">
          </th>
        </tr>
      </table>
    </form>
  `;
}