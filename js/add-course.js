const addCourseButton = document.getElementById('addCourseButton');
const addCourseArea = document.getElementById('add-course-popup');

(function () {
  addCourseArea.innerHTML = generateAddCourseForm();
})();

$("#addCourseCloseButton").click(function () {
  $("#add-course-popup").slideUp(1000);
});

function generateAddCourseForm() {
  return /*html*/ `
    <button id="addCourseCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-course">
      <table>
        <tr>
          <th>
            <label>Course Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="courseName">
          </td>
        </tr>
        <tr>
          <th>
            <label>Teacher</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="teacher">
          </td>
        </tr>
        <tr>
          <th>
            <label>Start Date</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="date" name="startDate">
          </td>
        </tr>
        <tr>
          <th>
            <label>End Date</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="date" name="endDate">
          </td>
        </tr>
        <tr>
          <th colspan="2">
            <input type="submit" value="Add Course">
          </th>
        </tr>
      </table>
    </form>
  `;
}