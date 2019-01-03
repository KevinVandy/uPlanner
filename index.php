<?php session_start();

include './models/imports.php';

if (!isset($_SESSION['account'])) {
    $_SESSION['account'] = null;
}

if (!isset($_SESSION['errorMsgs'])){
    $_SESSION['errorMsgs'] = [];
}

$errorMsgs = $_SESSION['errorMsgs'];

if (isLoggedIn()) {
    header('Location: ./home.php');
    exit();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>µPlanner - Log in</title>

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.min.css">

    <script src="app.min.js"></script>

</head>
<body>
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
                        <th>Email: </th>
                        <td>
                            <input type="text" name="usernameOrEmail" value="<?php if (isset($email)) {echo htmlspecialchars($email);}?>" required autofocus>
                        </td>
                    </tr>
                    <tr>
                        <th>Password: </th>
                        <td>
                            <input type="password" name="password" minlength="6" maxlength="60" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if (isset($errorMsgs['login'])) {echo htmlspecialchars($errorMsgs['login']);}?>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Login">
            </form>
        </section>
        <section id="section-signup">
            <form action="./controller.php" method="post">
                <input type="hidden" name="action" value="signup">
                <table>
                    <tr>
                        <th><label>First Name:</label></th>
                        <td>
                            <input type="text" name="firstName" value="<?php if (isset($firstName)) {echo htmlspecialchars($firstName);}?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if (isset($errorMsgs['firstName'])) {echo htmlspecialchars($errorMsgs['firstName']);}?>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Email:</label></th>
                        <td>
                            <input type="email" name="email" value="<?php if (isset($email)) {echo htmlspecialchars($email);}?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if (isset($errorMsgs['email'])) {echo htmlspecialchars($errorMsgs['email']);}?>
                        </td>
                    </tr>
                    <tr>
                        <th><label>Password:</label></th>
                        <td>
                            <input type="password" name="password" minlength="8" maxlength="60" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if (isset($errorMsgs['password'])) {echo htmlspecialchars($errorMsgs['password']);}?>
                        </td>
                    </tr>
                    <tr>
                        <th>Confirm Password: </th>
                        <td><input type="password" name="passwordConfirm" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="errorMsg">
                            <?php if (isset($errorMsgs['passwordConfirm'])) {echo htmlspecialchars($errorMsgs['passwordConfirm']);}?>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Sign Up!">
            </form>
        </section>
    </main>
</body>
</html>

<?php
}
?>