const navbarBottom = document.getElementById("navbar-bottom");

(function () {

  navbarBottom.innerHTML = createBottomNavBar();

})();

function createBottomNavBar() {
  return /*html*/ `
    <ul>
      <li>
        <a href="#" onclick="showYearView(); return false;">Year</a>
      </li>
      <li>
        <a href="#" onclick="showMonthView(); return false;">Month</a>
      </li>
      <li>
        <a href="#" onclick="showWeekView(); return false;">Week</a>
      </li>
      <li>
        <a href="#" onclick="showDayView(); return false;">Day</a>
      </li>
    </ul>
  `;
}