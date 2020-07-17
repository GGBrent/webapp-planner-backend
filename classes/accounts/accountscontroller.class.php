<?php

class AccountsController extends Accounts
{
    public function createUser($firstname, $lastname, $email, $password)
    {
        $this->setUser($firstname, $lastname, $email, $password);
    }
}
