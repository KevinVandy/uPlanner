<?php session_start();

include './models/imports.php';

$action = filter_input(INPUT_POST, 'action');

switch ($action) {

    case 'login':

        $email    = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $_SESSION['errorMsgs'] = validateLogin($email, $password);

        if ($_SESSION['errorMsgs'] == null) {
            $account = selectAccountByEmail($email);
            login($user->getUsername());
        } else {
            logout();
        }

        break;

    case 'signup':

        $firstName       = filter_input(INPUT_POST, 'firstName');
        $email           = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password        = filter_input(INPUT_POST, 'password');
        $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm');

        $_SESSION['errorMsgs'] = validateSignUp($firstName, $email, $password, $passwordConfirm);

        if ($_SESSION['errorMsgs'] == null) {
            $account = new Account(null, $email, $firstName, 'default', 'default', false, null);
            $account->set_id(insertAccount($account));
            login($account->get_id());
            header('Location: ./home.php');
        } else {
            header('Location: ./index.php');
        }

        break;

}
