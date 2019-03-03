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
            <label>task Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="taskName">
          </td>
        </tr>
        <tr>
          <th>
            <label>Priority</label>
          </th>
        </tr>
        <tr>
          <td>
          <select name="theme">
            <option value="Low">Low</option>
            <option value="Medium" selected>Medium</option>
            <option value="High">Default</option>
          </select>
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
            <input type="submit" value="Save Task">
          </th>
        </tr>
      </table>
    </form>
  `;
}