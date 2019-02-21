const navbarBottom = document.getElementById("navbar-bottom");

(function () {

  navbarBottom.innerHTML = createBottomNavBar();

})();

function createBottomNavBar() {
  return /*html*/ `
    <ul>
      <li>
        <a href="#" onclick="currentView = 'year'; showView(); return false;">Year</a>
      </li>
      <li>
        <a href="#" onclick="currentView = 'month'; showView(); return false;">Month</a>
      </li>
      <li>
        <a href="#" onclick="currentView = 'week'; showView(); return false;">Week</a>
      </li>
      <li>
        <a href="#" onclick="currentView = 'day'; showView(); return false;">Day</a>
      </li>
    </ul>
  `;
}