const navbarHidden = document.getElementById("navbar-hidden");

(function () {

})();

function createHiddenNavBar(type) {

    if(type == "add"){
        return /*html*/ `
            <table class="add-items">
                <tr>
                    <td><a>Event</a></td>
                    <td><a>Meeting</a></td>
                    <td><a>Task</a></td>
                    <td><a>Reminder</a></td>
                    <td><a>Homework</a></td>
                    <td><a>Work</a></td>
                </tr>
            </table>
        `;
    } else if(type == "account"){
        return /*html*/ `
            <table class="account-items">
                <tr>
                    <td><a>Add Job</a></td>
                    <td><a>Add Course</a></td>
                    <td><a href="./settings.php">Settings</a></td>
                    <td><a href="./controller.php?action=logout">Log Out</a></td>
                </tr>
            </table>
        `;
    }
}

$("#toggle-navbar-hidden-add").click(function () {
    navbarHidden.innerHTML = createHiddenNavBar("add");
    $("#navbar-hidden").slideToggle(300);
});

$("#toggle-navbar-hidden-account").click(function () {
    navbarHidden.innerHTML = createHiddenNavBar("account");
    $("#navbar-hidden").slideToggle(300);
});