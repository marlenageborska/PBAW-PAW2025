<?php
//Skrypt uruchamiający akcję wykonania obliczeń kalkulatora
// - należy zwrócić uwagę jak znacząco jego rola uległa zmianie
//   po wstawieniu funkcjonalności do klasy kontrolera
//wszystkie etapy, które tu były - znajdują się teraz w klasie kontrolera

//zadanie tego skryptu to załadowanie konfiguracji, a potem kontrolera ctrl
require_once dirname(__FILE__).'/../config.php';

//załaduj kontroler
require_once $conf->root_path.'/app/CalcCtrl.class.php';

//utwórz obiekt i użyj (teraz kontroler to obiekt klasy)
$ctrl = new CalcCtrl();
//inicjuje metoda process, czyli ona jest kluczowa
$ctrl->process();
