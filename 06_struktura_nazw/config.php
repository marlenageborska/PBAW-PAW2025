<?php
// Konfiguracja
$conf->server_name = 'localhost';
$conf->server_url = 'http://'.$conf->server_name;
$conf->app_root = '/PBAW-PAW2025/06_struktura_nazw/';
$conf->action_root = $conf->app_root.'/ctrl.php?action=';

$conf->action_url = $conf->server_url.$conf->action_root;
$conf->app_url = $conf->server_url.$conf->app_root;
$conf->root_path = dirname(__FILE__);
?>

