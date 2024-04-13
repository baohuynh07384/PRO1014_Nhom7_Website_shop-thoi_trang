<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();

require_once "vendor\autoload.php";

define("ROOT_URL", "http://duan1.local/");
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
define("UPLOAD_PATH", ROOT_PATH . "public/uploads/");

define('UPLOAD_URL',ROOT_URL.'/public/uploads/');
define('PUBLIC_URL', ROOT_URL.'/public/uploads/');
use App\Models\UserModel;
use App\Core\Route;
use App\Core\Sessions;
new Route;

$user = new UserModel();
$session = new Sessions;

