<?php

//echo 'http://www.fashionshop.local';
/*
$string = '21-11-2015';

$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';

$replacement = 'Month: $2, Day: $1, Year: $3';

echo preg_replace($pattern, $replacement, $string);
echo '<br>';*/



ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));

//require_once (ROOT.'/config/function.php');

require_once (ROOT.'/components/Autoload.php');
/*
require_once (ROOT.'/components/Router.php');
require_once (ROOT.'/components/Db.php');
*/

// Вызов Router
$router = new Router();
$router->run();