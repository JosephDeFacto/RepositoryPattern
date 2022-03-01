<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

require 'app/bootstrap.php';

use App\Database\DatabaseConnection;

$database = new DatabaseConnection();
$db = $database->getConnection();

$userRepository = new \App\UserRepository($database);

$controller = new \App\UserController($userRepository);

$controller->addUser();


//$id = 1; // hardcoded
// or
$id = array_key_exists('id', $_GET) ?? [];

$userObject = $controller->getUser($id);






