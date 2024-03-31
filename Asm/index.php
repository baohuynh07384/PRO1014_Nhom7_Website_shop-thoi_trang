<?php
session_start();

require_once "vendor\autoload.php";

define("ROOT_URL", "http://127.0.0.1:5000");
define('UPLOAD_URL', __DIR__.'/public/uploads/');
define('PUBLIC_URL', ROOT_URL.'/public/uploads/');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
use App\Models\UserModel;
use App\Core\Route;
use App\Core\Sessions;

new Route;


