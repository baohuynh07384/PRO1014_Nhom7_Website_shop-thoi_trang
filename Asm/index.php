<?php
session_start();

require_once "vendor\autoload.php";

define("ROOT_URL", "http://duan1.local/");
define('UPLOAD_URL', __DIR__.'/public/uploads/');
define('PUBLIC_URL', ROOT_URL.'/public/uploads/');
use App\Models\UserModel;
use App\Core\Route;
use App\Core\Sessions;

new Route;
$user = new UserModel();


$session = new Sessions;

