const navbarTop = document.getElementById("navbar-top");

(function () {

    navbarTop.innerHTML = createTopNavBar();

})();

function createTopNavBar() {
    return /*html*/ `
        <ul class="left-item">
            <li>
                <a id="toggle-navbar-hidden-add" class="toggle-navbar-hidden">+</a>
            </li>
        </ul>
        <ul class="center-item">
            <li>
                <a>µPlanner</a>
            </li>
        </ul>
        <ul class="right-item">
            <li>
                <a id="toggle-navbar-hidden-account" class="toggle-navbar-hidden"><img src="images/profile.jpg"></a>
            </li>
        </ul>
    `;
}