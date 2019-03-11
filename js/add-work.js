const addWorkButton = document.getElementById('addWorkButton');
const addWorkArea = document.getElementById('add-work-popup');

(function () {
  addWorkArea.innerHTML = generateAddJobWorkForm();
})();

$("#addWorkCloseButton").click(function () {
  $("#add-work-popup").slideUp(300);
});

function generateAddJobWorkForm() {
  let html = '';/*html*/ 
  html += //html
  `
    <button id="addJobWorkCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-work">
      <table>
        <tr>
          <th>
            <label>Job</label>
          </th>
        </tr>
        <tr>
          <td>
            <select name="jobId">
    `;
    Array.from(account.jobs).forEach(function (jobItem) {
      html += //html
      `
        <option value="${jobItem.id}">${jobItem.jobName}</option>
      `;
    });
    html += //html
    `
            </select>
          </td>
        </tr>
        <tr>
          <th>
            <label>Work Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="jobWorkName" maxlength="50">
          </td>
        </tr>
        <tr>
        <tr>
          <th>
            <label>Work Type</label>
          </th>
        </tr>
        <tr>
          <td>
            <select name="jobWorkType">
              <option value="Reading">Reading</option>
              <option value="Study">Study</option>
              <option value="Homework" selected>Homework</option>
              <option value="Project">Project</option>
              <option value="Presentation">Presentation</option>
              <option value="Quiz">Quiz</option>
              <option value="Test">Test</option>
              <option value="Midterm">Midterm</option>
              <option value="Final">Final</option>
            </select>
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
          <th>
            <label>Due Date</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="date" name="dueDate">
          </td>
        </tr>
        <tr>
          <th>
            <label>Due Time</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="time" name="dueTime" value="00:00">
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
  return html;
}