function showLogin() {
  $("#section-signup").slideUp(500);
  $("#section-login").slideDown(500);
  $("#loginEmail").focus();
}

function showSignup() {
  $("#section-login").slideUp(500);
  $("#section-signup").slideDown(500);
  $("#signupFirstName").focus();
}

$("#show-login").click(function () {
  showLogin();
});

$("#show-signup").click(function () {
  showSignup();
});