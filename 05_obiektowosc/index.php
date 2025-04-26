<?php
require_once dirname(__FILE__).'/config.php';

//przekierowanie przeglądarki klienta (redirect) - ustawiam nagłówek odpowiedzi nazwany Location, są dwie transmisje więcej bo z a do b, zatem przeglądarka mówi ok idę do b i to b mi odpowiada
//header("Location: "._APP_URL."/app/calc.php");
//redirect nie wywoła żadnego skryptu, jedynie wygeneruje pustą odpowiedź z nagłówkiem gdzie przegladrka ma się zwrócić (też jest używane, np. przekierowanie na stronie logowania)

//przekazanie/przekierowanie żądania do następnego dokumentu ("forward"), np. z a do b, include wywoła skrypt, czyli wejdzie do niego i będzie go interpretował
//będzie zmiana w konfiguracji 
include $conf->root_path.'/app/calc.php';