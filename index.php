<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

require 'app/bootstrap.php';

use App\Database\DatabaseConnection;
use App\UserController;
use App\UserRepository;

$database = new DatabaseConnection();
$db = $database->getConnection();

$userRepository = new UserRepository($database);

$controller = new UserController($userRepository);

$controller->addUser();


//$id = 1; // hardcoded
// or
$id = array_key_exists('id', $_GET) ?? [];

$userObject = $controller->getUser($id);




