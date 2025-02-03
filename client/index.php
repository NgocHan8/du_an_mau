<?php
require_once './configs/env.php';
require_once './configs/function.php';
require_once './configs/helper.php';
// require_once PATH_CONTROLLER_CLIENT . 'HomeController.php';
// require_once PATH_CONTROLLER_CLIENT . 'TestController.php';

$action = $_GET['action'] ?? '/';

match ($action)
{
    '/' => (new HomeController)->index(),
    'show' => (new TestController)->show(),
};