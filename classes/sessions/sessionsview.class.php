<?php

class SessionsView extends Sessions
{
    public function getAllSessions()
    {
        $results = $this->getSessionsList();
        return $results;
    }

    public function getSessionByID($sessionID)
    {
        $result = $this->getSession($sessionID);
        return $result;
    }
}
