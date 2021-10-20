<?php

interface SQLStorage
{
    public function createCity(string $city): int;
    public function createUser(
        string $name,
        string $nick,
        int $city_id,
        string $date,
        string $email
    ): int;
}
