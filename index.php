<?php 

include './models/imports.php';

session_start();

if (!isset($_SESSION['account'])) {
 $_SESSION['account'] = null;
}

if (!isset($_SESSION['errorMsgs'])) {
 $_SESSION['errorMsgs'] = [];
}

if (isLoggedIn()) {
 header('Location ./home.php');
 
} else { //var_dump($_SESSION['errorMsgs']);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>µPlanner - Log in</title>

  <link rel="manifest" href="manifest.json">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/main.min.css">
  <link rel="stylesheet" href="css/navbar.min.css">
  <link rel="stylesheet" href="css/login.min.css">

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="app.min.js" defer></script>
  <script src="js/login.min.js" defer></script>
</head>
<body>
  <nav class="navbar-top">
    <ul class="left-item">
      <li>
        <a onclick="showSignup();">Sign Up</a>
      </li>
    </ul>
    <ul class="center-item">
      <li>
        <a href="#information">About</a>
      </li>
    </ul>
    <ul class="right-item">
      <li>
        <a onclick="showLogin();">Log in</a>
      </li>
    </ul>
  </nav>
  <header>
    <h1>µPlanner</h1>
    <h2>Micro-Manage Your Life!</h2>
  </header>
  <main>
    <section id="section-login">
      <form action="./controller.php" method="post" autocomplete="on">
        <input type="hidden" name="action" value="login">
        <table>
          <tr>
            <th>
              <label>Email</label>
            </th>
          </tr>
          <tr>
            <td>
              <input type="email" name="email" id="loginEmail" value="<?php if (isset($_SESSION['email'])) {echo htmlspecialchars($_SESSION['email']);}?>" required autofocus>
            </td>
          </tr>
          <tr>
            <th><label>Password</label></th>
          </tr>
          <tr>
            <td>
              <input type="password" name="password" minlength="6" maxlength="60" required>
            </td>
          </tr>
          <tr>
            <td class="errorMsg">
              <?php if (isset($_SESSION['errorMsgs']['login'])) {echo htmlspecialchars($_SESSION['errorMsgs']['login']);}?>
            </td>
          </tr>
        </table>
        <input type="submit" value="Login">
        <a id="show-signup">Don't have an Account yet?<br>Sign up!</a>
      </form>
    </section>
    <section id="section-signup">
      <form action="./controller.php" method="post">
        <input type="hidden" name="action" value="signup">
        <table>
          <tr>
            <th>
              <label>First Name</label>
            </th>
          </tr>
          <tr>
            <td>
              <input type="text" name="firstName" id="signupFirstName" value="<?php if (isset($firstName)) {echo htmlspecialchars($firstName);}?>" required>
            </td>
          </tr>
          <tr>
            <td class="errorMsg">
              <?php if (isset($_SESSION['errorMsgs']['firstName'])) {echo htmlspecialchars($_SESSION['errorMsgs']['firstName']);}?>
            </td>
          </tr>
          <tr>
            <th>
              <label>Email</label>
            </th>
          </tr>
          <tr>
            <td>
              <input type="email" name="email" value="<?php if (isset($email)) {echo htmlspecialchars($email);}?>" required>
            </td>
          </tr>
          <tr>
            <td class="errorMsg">
              <?php if (isset($_SESSION['errorMsgs']['email'])) {echo htmlspecialchars($_SESSION['errorMsgs']['email']);}?>
            </td>
          </tr>
          <tr>
            <th>
              <label>Password</label>
            </th>
          </tr>
          <tr>
            <td>
              <input type="password" name="password" minlength="6" maxlength="60" required>
            </td>
          </tr>
          <tr>
            <td class="errorMsg">
              <?php if (isset($_SESSION['errorMsgs']['password'])) {echo htmlspecialchars($_SESSION['errorMsgs']['password']);}?>
            </td>
          </tr>
          <tr>
            <th>
              <label>Confirm Password</label>
            </th>
          </tr>
          <tr>
            <td>
              <input type="password" name="passwordConfirm" required>
            </td>
          </tr>
          <tr>
            <td class="errorMsg">
              <?php if (isset($_SESSION['errorMsgs']['passwordConfirm'])) {echo htmlspecialchars($_SESSION['errorMsgs']['passwordConfirm']);}?>
            </td>
          </tr>
        </table>
        <input type="submit" value="Sign Up!">
      </form>
      <a id="show-login">Already have an Account?<br>Login!</a>
    </section>
    <section id="information">

    </section>
  </main>
  <footer>

  </footer>
</body>
</html>

<?php
}
?>