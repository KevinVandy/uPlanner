const addJobButton = document.getElementById('addJobButton');
const addJobArea = document.getElementById('add-job-popup');

(function () {
  addJobArea.innerHTML = generateAddJobForm();
})();

$("#addJobCloseButton").click(function () {
  $("#add-job-popup").slideUp(500);
});

function generateAddJobForm() {
  return /*html*/ `
    <button id="addJobCloseButton" class="close-button">X</button>
    <form action="./controller.php" method="post">
      <input type="hidden" name="action" value="add-job">
      <table>
        <tr>
          <th>
            <label>Job Name</label>
          </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="jobName" required>
          </td>
        </tr>
        <tr>
          <th colspan="2">
            <input type="submit" value="Save Job">
          </th>
        </tr>
      </table>
    </form>
  `;
}