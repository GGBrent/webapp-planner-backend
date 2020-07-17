<?php
include 'includes/header.inc.php';

$sessionsView = new SessionsView();

$result = $sessionsView->getAllSessions();

echo json_encode($result);
