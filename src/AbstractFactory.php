<?php 

require_once __DIR__."/SQLStorage.php";
require_once __DIR__."/DBconnector.php";

class AbstractFactory implements SQLStorage
{
    protected $CityStorage;
    protected $UserStorage;

    public function __construct()
    {
        $this->CityStorage = new SQLCityStorage(DBconnector::getConnection());
        $this->UserStorage = new SQLUserStorage(DBconnector::getConnection());
    }

    public function createCity(string $city) : int
    {
        $this->CityStorage->issetCity($city);
        if ($this->CityStorage->issetCity($city) === false) {
            $this->CityStorage->insert($city);
        }
        return $this->CityStorage->select($city);
        
    }
    

    public function createUser(
        string $name,
        string $nick,
        int $city_id,
        string $date,
        string $email
    ) {
        return $this->UserStorage->insert(
            $name,
            $nick,
            $city_id,
            $date,
            $email
        )
    }
}