const addHomeworkButton = document.getElementById('addHomeworkButton');
const addHomeworkArea = document.getElementById('add-homework-popup');

(function () {
  addHomeworkArea.innerHTML = generateAddHomeworkForm();
})();

$("#addHomeworkCloseButton").click(function () {
  $("#add-homework-popup").slideUp(500);
});

function generateAddHomeworkForm() {
  return /*html*/ `
    <button id="addHomeworkCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-homework">
      <table>
        <tr>
          <th>
            <label>Homework Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="homeworkName">
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
            <input type="submit" value="Save Homework">
          </th>
        </tr>
      </table>
    </form>
  `;
}