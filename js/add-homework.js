const addHomeworkButton = document.getElementById('addHomeworkButton');
const addHomeworkArea = document.getElementById('add-homework-popup');

(function () {
  addHomeworkArea.innerHTML = generateAddHomeworkForm();
})();

$("#addHomeworkCloseButton").click(function () {
  $("#add-homework-popup").slideUp(500);
});

function generateAddHomeworkForm() {
  let html = '';/*html*/ 
  html += //html
  `
    <button id="addHomeworkCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-homework">
      <table>
        <tr>
          <th>
            <label>Class</label>
          </th>
        </tr>
        <tr>
          <td>
            <select name="courseId">
    `;
    Array.from(account.courses).forEach(function (courseItem) {
      html += //html
      `
        <option value="${courseItem.id}">${courseItem.courseName}</option>
      `;
    });
    html += //html
    `
            </select>
          </td>
        </tr>
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
        <tr>
          <th>
            <label>Homework Type</label>
          </th>
        </tr>
        <tr>
          <td>
            <select name="homeworkType">
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
            <input type="submit" value="Save Homework">
          </th>
        </tr>
      </table>
    </form>
  `;
  return html;
}