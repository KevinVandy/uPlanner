const addWorkButton = document.getElementById('addWorkButton');
const addWorkArea = document.getElementById('add-work-popup');

(function () {
  addWorkArea.innerHTML = generateAddWorkForm();
})();

$("#addWorkCloseButton").click(function () {
  $("#add-work-popup").slideUp(500);
});

function generateAddWorkForm() {
  return /*html*/ `
    <button id="addWorkCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-work">
      <table>
        <tr>
          <th>
            <label>Work Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="workName">
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
            <input type="submit" value="Save Work">
          </th>
        </tr>
      </table>
    </form>
  `;
}