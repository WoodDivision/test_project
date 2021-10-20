<?php

interface CityStorageInterface
{
    public function select(string $city): int;
    public function issetCity(string $city): bool;
    public function insert(string $city):int;
}