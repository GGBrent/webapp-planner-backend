<?php
include 'includes/header.inc.php';

if ($_POST) {
    $sessionsController = new SessionsController();

    if (isset($_POST["submitType"])) {

        $submitType = $_POST["submitType"];
        $userID = $_POST["user_id"];
        $sessionID = $_POST["session_id"];

        switch ($submitType) {
            case "attend":
                $sessionsController->addUser($userID, $sessionID);
                break;
            case "leave":
                $sessionsController->removeUser($userID, $sessionID);
                break;
            case "delete":
                $sessionsController->deleteSession($sessionID);
        }

        if ($submitType != "delete") {
            $sessionsView = new SessionsView();
            $result = $sessionsView->getSessionByID($sessionID);
            echo json_encode($result);
        } else {
            echo "deleted";
        }
    } else if (isset($_POST["method"])) {

        $author = $_POST["author"];
        $authorID = $_POST["authorID"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $fromDate = $_POST["fromDate"];
        $toDate = $_POST["toDate"];
        $sessionID = $_POST["session_id"];

        if ($_POST["method"] == "create") {
            $sessionsController->setSession($author, intval($authorID), $title, $description, $fromDate, $toDate);
        } else {
            $sessionsController->updateSession($title, $description, $fromDate, $toDate, $sessionID);
        }

        echo json_encode($_POST);
    }
}
