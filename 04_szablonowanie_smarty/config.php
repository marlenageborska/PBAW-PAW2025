<?php
define('_SERVER_NAME', 'localhost:80');
define('_SERVER_URL', 'http://'._SERVER_NAME);
define('_APP_ROOT', '/PBAW-PAW2025/04_szablonowanie_smarty');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));

//gdy korzysta się z bibliotek szablonowania funkcja out(&$param) nie jest już potrzebna

// Konfiguracja Smarty (zamiast w calc.php), najpierw załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';
$smarty = new Smarty\Smarty();
$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator kredytowy');
$smarty->assign('page_description', 'W tym miejscu możesz obliczyć miesięczną ratę swojego kredytu');
?>