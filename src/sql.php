<?php
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

require_once __DIR__ . "/DBconnector.php";
require_once __DIR__ . "/AbstractFactory.phpphp";

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

    $SQLFactory = new AbstractFactory;
    $cityID=$SQLFactory->createCity($city);
    $SQLFactory->createUser($name, $nick, $cityID, $date, $email);
    header("Refresh: 5, url=$header");
    echo "Регистрация прошла успешно";
}
