<?php
include 'includes/header.inc.php';

session_start();

if (isset($_SESSION["user"])) {

    $accountsView = new AccountsView();
    $userEmail = $_SESSION["user"];
    $userData = $accountsView->getUser($userEmail);
    if ($userData) {
        $userData += ["status" => "logged in"];
        echo json_encode($userData);
    } else {
        echo "an error occurred checking login credentials";
    }
}
