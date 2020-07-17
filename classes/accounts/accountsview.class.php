<?php

class AccountsView extends Accounts
{
    public function getUser($email)
    {
        $results = $this->getUserByEmail($email);
        return $results;
    }
}
