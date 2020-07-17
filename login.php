<?php
include 'includes/header.inc.php';

session_start();

if ($_POST) {
    $userEmail = $_POST["email"];
    $userPassword = $_POST["password"];

    $accountsView = new AccountsView();
    $accountsController = new AccountsController();

    $accountDoesExist = $accountsView->getUser($userEmail);
    if ($accountDoesExist) {

        $accountInfo = $accountDoesExist;

        $passwordsMatch = password_verify($userPassword, $accountInfo["user_password"]);

        if ($passwordsMatch) {
            $_SESSION["user"] = $userEmail;
            $_SESSION["user_id"] = $accountInfo["user_id"];
            $accountInfo += ["status" => "logged in"];
            echo json_encode($accountInfo);
        }
    }
}
