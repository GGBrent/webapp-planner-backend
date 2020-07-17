<?php

class Sessions extends Database
{
    public function __construct()
    {
        parent::__construct("sessions");
    }

    protected function getSessionsList()
    {
        $sql = "SELECT * FROM sessiontable ORDER BY session_id DESC";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function setSession($author, $authorID, $title, $description, $fromDate, $toDate)
    {
        $sql = "INSERT INTO sessiontable(author, author_id, title, description, start_datetime, end_datetime) VALUES(?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$author, $authorID, $title, $description, $fromDate, $toDate]);
    }

    protected function getSession($sessionID)
    {
        $sql = "SELECT * FROM sessiontable WHERE session_id={$sessionID}";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function updateSession($title, $description, $fromDate, $toDate, $sessionID)
    {
        $sql = "UPDATE sessiontable SET title=?, description=?, start_datetime=?, end_datetime=? WHERE session_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $description, $fromDate, $toDate, $sessionID]);
    }

    protected function updateAttendees($sessionID, $attendees)
    {
        $sql = "UPDATE sessiontable SET attendees=? WHERE session_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$attendees, $sessionID]);
    }

    protected function deleteSession($sessionID)
    {
        $sql = "DELETE FROM sessiontable WHERE session_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sessionID]);
    }
}
