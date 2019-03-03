function showLogin() {
  $("#section-signup").slideUp(500);
  $("#section-login").slideDown(500);
  $("#section-login-admin").slideUp(500);
  $("#show-login-admin").hide();
  $("#loginEmail").focus();
}

function showLoginAdmin() {
  $("#section-signup").slideUp(500);
  $("#section-login").slideUp(500);
  $("#section-login-admin").slideDown(500);
  $("#show-login-admin").hide();
  $("#loginEmail").focus();
}

function showSignup() {
  $("#section-login").slideUp(500);
  $("#section-signup").slideDown(500);
  $("#section-login-admin").slideUp(500);
  $("#show-login-admin").hide();
  $("#signupFirstName").focus();
}

$("#show-login").click(function () {
  showLogin();
});

$("#show-login-admin").click(function () {
  showLoginAdmin();
});

$("#hide-login-admin").click(function () {
  showLogin();
});

$("#show-signup").click(function () {
  showSignup();
});

$("#loginFooter").hover(function() {
  $("#show-login-admin").show();
});