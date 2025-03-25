<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__) . '/../config.php';
// załaduj Smarty
require_once _ROOT_PATH . '/lib/smarty/libs/Smarty.class.php';

// pobranie parametrów
function getParams(&$form) {
    $form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $form['czas'] = isset($_REQUEST['czas']) ? $_REQUEST['czas'] : null;
    $form['oprocentowanie'] = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
}

// walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form, &$infos, &$msgs, &$hide_intro) {
    if (!isset($form['kwota'], $form['czas'], $form['oprocentowanie'])) {
        return false;
    }

    $hide_intro = true;

    $infos[] = 'Przekazano parametry.';

    if ($form['kwota'] === "") {
        $msgs[] = 'Nie podano kwoty kredytu.';
    }
    if ($form['czas'] === "") {
        $msgs[] = 'Nie podano liczby lat.';
    }
    if ($form['oprocentowanie'] === "") {
        $msgs[] = 'Nie podano wartości oprocentowania.';
    }

    if (count($msgs) > 0) {
        return false;
    }

    if (!is_numeric($form['kwota']) || $form['kwota'] < 0) {
        $msgs[] = 'Kwota kredytu musi być liczbą dodatnią.';
    }
    if (!is_numeric($form['czas']) || $form['czas'] < 0) {
        $msgs[] = 'Liczba lat musi być liczbą dodatnią.';
    }
    if (!is_numeric($form['oprocentowanie']) || $form['oprocentowanie'] < 0) {
        $msgs[] = 'Oprocentowanie musi być liczbą dodatnią.';
    }

    return count($msgs) === 0;
}


// wykonaj obliczenia
function process(&$form, &$infos, &$msgs, &$result) {
    $infos[] = 'Parametry poprawne. Wykonuję obliczenia.';

    $form['kwota'] = floatval($form['kwota']);
    $form['czas'] = intval($form['czas']);
    $form['oprocentowanie'] = floatval($form['oprocentowanie']);

    $result = ($form['kwota'] / ($form['czas'] * 12)) + ($form['kwota'] * (($form['oprocentowanie'] / 100) / 12));
    $result = number_format($result, 2);
}

// inicjacja zmiennych
$form = null;
$infos = [];
$msgs = [];
$result = null;
$hide_intro = false;

getParams($form);
if (validate($form, $infos, $msgs, $hide_intro)) {
    process($form, $infos, $msgs, $result);
}

// przygotowanie danych dla szablonu
$smarty = new Smarty\Smarty();

$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator kredytowy');
$smarty->assign('page_description', 'Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header', 'Szablony Smarty');

$smarty->assign('hide_intro', $hide_intro);

$smarty->assign('form', $form);
$smarty->assign('result', $result);
$smarty->assign('messages', $msgs);
$smarty->assign('infos', $infos);

// wywołanie szablonu
$smarty->display(_ROOT_PATH . '/app/calc.html');
