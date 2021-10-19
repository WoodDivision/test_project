<?php

require_once __DIR__."/SQLUserStorage.php";

class SimpleUserFactory
{
    public function createUser(): SQLUserStorage
    {
        return new SQLUserStorage(DBconnector::getConnection());
    }
}