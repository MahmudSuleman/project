<?php
/**
 * Created by PhpStorm.
 * User: Mahmud Suleman Sheikh Wunnam
 * Date: 12/25/2019
 * Time: 11:03 AM
 */
session_start();
ob_start(); // turn on output buffering

// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/includes');


$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

function url_for($script_path){
    if($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT.$script_path;
}
//
//echo $public_end;
//die();

function u($string=""){return urlencode($string);}

function raw_u($string=""){return rawurlwncode($string);}

function h($string=""){return htmlspecialchars($string);}

function redirect_to($location){
    return header('Location: '.$location);
}


//include_once 'classes/User.php';
//include_once 'classes/Database.php';
function classes($class){
    include 'classes/' . $class . ".php";
}
spl_autoload_register('classes');

$errors = [];

$current_trimester = 2;

$dsn = [
    "host"=>"localhost",
    "username"=>"root",
    "password"=>"",
    "dbname"=>"project"

];
$pdoHelper = new PDOHelper($dsn);
$db = new PdoWrapper($dsn);



