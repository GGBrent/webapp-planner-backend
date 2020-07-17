<?php
include 'includes/header.inc.php';

if ($_POST) {
    define("INCORRECT_EMAIL_FORMAT", "invalid email");
    define("PASSWORDS_NO_MATCH",     "passwords do not match");
    define("EMAIL_IN_USE",           "email in use");

    $errorMessages  = array();

    $isValidEmail = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    if (!$isValidEmail) {
        array_push($errorMessages, INCORRECT_EMAIL_FORMAT);
    }

    if ($_POST["password"] !== $_POST["passwordConfirm"]) {
        array_push($errorMessages, PASSWORDS_NO_MATCH);
    }

    $controller = new AccountsController();
    $view = new AccountsView();

    $emailAlreadyRegistered = $view->getUser($_POST["email"]);
    if ($emailAlreadyRegistered) {
        array_push($errorMessages, EMAIL_IN_USE);
    }

    if (count($errorMessages) > 0) {
        echo json_encode($errorMessages);
        exit();
    }

    $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $controller->createUser($_POST["firstName"], $_POST["lastName"], $_POST["email"], $hashedPassword);
    $result = $view->getUser($_POST["email"]);

    session_start();
    $_SESSION["user"] = $_POST["email"];
    $_SESSION["user_id"] = $result["user_id"];

    $result += ["status" => "success"];
    echo json_encode($result);
}
