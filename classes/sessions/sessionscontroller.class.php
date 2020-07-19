<?php

class SessionsController extends Sessions
{
    public function setSession($author, $authorID, $title, $description, $fromDate, $toDate)
    {
        parent::setSession($author, $authorID, $title, $description, $fromDate, $toDate);
    }

    public function updateSession($title, $description, $fromDate, $toDate, $sessionID)
    {
        parent::updateSession($title, $description, $fromDate, $toDate, $sessionID);
    }

    public function deleteSession($sessionID)
    {
        parent::deleteSession($sessionID);
    }

    public function addUser($userID, $sessionID)
    {
        $session = $this->getSession($sessionID);

        $userInSession = strpos($session["attendees"], $userID);

        $attendees = $session["attendees"];
        if (!$attendees) {
            $attendees = $userID;
        } else {
            $attendees = explode(",", $session["attendees"]);
            if (in_array($userID, $attendees)) {
                return;
            }
            array_push($attendees, $userID);
            $attendees = implode(",", $attendees);
        }
        $this->updateAttendees($sessionID, $attendees);
    }

    public function removeUser($userID, $sessionID)
    {
        $session = $this->getSession($sessionID);

        $attendees = $session["attendees"];
        if (!$attendees) {
            return;
        }
        $attendees = explode(",", $session["attendees"]);

        unset($attendees[array_search($userID, $attendees)]);

        $attendees = implode(",", $attendees);
        if ($attendees == "") $attendees = null;
        $this->updateAttendees($sessionID, $attendees);
    }
}
