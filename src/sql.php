<?php
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

require_once __DIR__ . "/DBconnector.php";
require_once __DIR__ . "/SimpleCityFactory.php";
require_once __DIR__ . "/SimpleUserFactory.php";

function validateData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST)) {
    $name = validateData($_POST['name']);
    $nick = validateData($_POST['nick']);
    $city = validateData($_POST['city']);
    $date = validateData($_POST['data']);
    $email = validateData($_POST['email']);
    $header = 'http://testproject.local/';

    $CityFactory = new SimpleCityFactory;
    if ($CityFactory->createCity()->issetCity($city) === false) {
        $cityID = $CityFactory->createCity()->insert($city);
    }
    $cityID = $CityFactory->createCity()->select($city);
    $UserStorage = new SimpleUserFactory;
    $UserStorage->createUser()->insert($name, $nick, $cityID['id'], $date, $email);
    header("Refresh: 5, url=$header");
    echo "Регистрация прошла успешно";
}
