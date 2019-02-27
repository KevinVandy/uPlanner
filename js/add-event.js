const addEventButton = document.getElementById('addEventButton');
const addEventArea = document.getElementById('add-event-popup');

(function () {
  addEventArea.innerHTML = generateAddEventForm();
})();

$("#addEventCloseButton").click(function () {
  $("#add-event-popup").slideUp(500);
});

function generateAddEventForm() {
  return /*html*/ `
    <button id="addEventCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-event">
      <table>
        <tr>
          <th>
            <label>Event Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="eventName">
          </td>
        </tr>
        <tr>
          <th>
            <label>Location</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="location">
          </td>
        </tr>
        <tr>
          <th>
            <label>Date</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="date" name="date">
          </td>
        </tr>
        <tr>
          <th>
            <label>Start Time</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="time" name="startTime">
          </td>
        </tr>
        <tr>
          <th>
            <label>End Time</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="time" name="endTime">
          </td>
        </tr>
        <tr>
          <th>
            <label>Completed</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="checkbox" name="completed" value="1">
          </td>
        </tr>
        <tr>
          <th colspan="2">
            <input type="submit" value="Save Event">
          </th>
        </tr>
      </table>
    </form>
  `;
}