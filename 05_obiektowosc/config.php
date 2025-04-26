<?php
require_once 'Config.class.php'; //ładuję prostą klasę config ze wszystkimi potrzebnymi danymi
require_once 'lib/smarty/libs/Smarty.class.php';

//Trzeba wywołać config.php aby coś si zmieniło (a nie samo config)
// Już nie deklaracja stałych programowych np.root_path - globalna konfiguracja już z obiektem, po wywołaniu config mamy obiekt o nazwie config
//Conf jest klasą Configu więc tworzę obiekt klasy conf i wypełniam go danymi
$conf = new Config();
$conf->server_name = 'localhost';
$conf->server_url = 'http://'.$conf->server_name;
$conf->app_root = '/PBAW-PAW2025/05_obiektowosc';
$conf->app_url = $conf->server_url.$conf->app_root;
$conf->root_path = dirname(__FILE__);

// Wstepna konfiguracja Smarty
$smarty = new Smarty\Smarty();
$smarty->assign('conf', $conf);
$smarty->assign('app_url', $conf->app_url);
$smarty->assign('root_path', $conf->root_path);
$smarty->assign('page_title', 'Kalkulator kredytowy');
$smarty->assign('page_description', 'W tym miejscu możesz obliczyć miesięczną ratę swojego kredytu');
$smarty->assign('default_page_title', 'Kalkulator kredytowy');
$smarty->assign('default_page_description', 'Prosty kalkulator kredytowy');
?>
