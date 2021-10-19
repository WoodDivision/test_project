<?php 

require_once __DIR__."/SQLCityStorage.php";

class SimpleCityFactory
{

    public function createCity():SQLCityStorage
    {
        return new SQLCityStorage(DBconnector::getConnection());
    }

}