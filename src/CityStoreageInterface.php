<?php

interface CityStorageInteface
{
    public function insert(string $city): int;
    public function issetCity(string $city): bool;
    public function select (string $city): int;
}