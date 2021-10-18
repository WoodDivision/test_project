<?php 


interface UserStorageInteface
{
    public function insert(
        string $name,
        string $nick,
        int $city_id,
        string $date,
        string $email
    );
}