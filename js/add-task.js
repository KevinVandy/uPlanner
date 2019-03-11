const addTaskButton = document.getElementById('addTaskButton');
const addTaskArea = document.getElementById('add-task-popup');

(function () {
  addTaskArea.innerHTML = generateAddTaskForm();
})();

$("#addTaskCloseButton").click(function () {
  $("#add-task-popup").slideUp(500);
});

function generateAddTaskForm() {
  return /*html*/ `
    <button id="addTaskCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-task">
      <table>
        <tr>
          <th>
            <label>Task Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="taskName" maxlength="100">
          </td>
        </tr>
        <tr>
          <th>
            <label>Priority</label>
          </th>
        </tr>
        <tr>
          <td>
          <select name="priority">
            <option value="Low" selected>Low</option>
            <option value="High">High</option>
          </select>
          </td>
        </tr>
        <tr>
          <th colspan="2">
            <input type="submit" value="Save Task">
          </th>
        </tr>
      </table>
    </form>
  `;
}