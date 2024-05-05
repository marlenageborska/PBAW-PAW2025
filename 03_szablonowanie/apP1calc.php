<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/config.php';

//ochrona kontrolera (bramkarz) - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/security/check.php';

// 1. zaprojektowanie etapu pobrania parametrów

function getParams(&$form){
	$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$form['czas'] = isset($_REQUEST['czas']) ? $_REQUEST['czas'] : null;
	$form['oprocentowanie'] = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;	
}


// 2. zaprojektowanie etapu walidacji parametrów z przygotowaniem zmiennych dla widoku

function validate(&$form,&$messages){
if ( ! (isset($form['kwota']) && isset($form['czas'])&& isset($form['oprocentowanie']) )) {
	// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń (zwrócony zostanie widok)
		return false;
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $form['kwota'] == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $form['czas'] == "") {
	$messages [] = 'Nie podano liczby lat';
}
if ( $form['oprocentowanie'] == "") {
	$messages [] = 'Nie podano wartości oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (count ( $messages ) > 0) return false;
	
// sprawdzenie, czy $kwota i $czas są liczbami 
	if (! is_numeric( $form['kwota'] )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą';
	}
	
	if (! is_numeric( $form['czas'] )) {
		$messages [] = 'Druga wartość nie jest liczbą';
	}	
	
	if (! is_numeric( $form['oprocentowanie'] )) {
		$messages [] = 'Trzecia wartość nie jest liczbą';
	}

	if (count ( $messages ) > 0) return false;
	else return true;

}

// 3. działanie
function process(&$form,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na int lub float
        	
        $form['kwota'] = floatval($form['kwota']);
	$form['czas'] = intval($form['czas']);
	$form['oprocentowanie'] = floatval($form['oprocentowanie']);
        
//wykonanie operacji
	if($form['kwota'] > 10000 && $role != 'administrator') {
		$messages[] = "Wersja testowa. Nie posiadasz uprawnień do wpisywania kwot większych niż 10 tys. Jeżeli uważasz, że to błąd, to skontaktuj się z administratorem.";
		return;
	}
	
	$result = ($form['kwota'] / ($form['czas'] * 12)) + (($form['kwota'] ) * (($form['oprocentowanie'] /100)/12));
        $result = number_format($result, 2);
}


//4. definicja zmiennych kontrolera
$form = [];
$messages = [];
$monthlyPayment = null;

//5. pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($form);
if ( validate($form,$messages) ) { // gdy brak błędów
	process($form,$messages,$result);
}

//Wywołanie widoku, wcześniej ustalenie zawartości zmiennych elementów szablonu
$page_title = 'Kalkulator kredytowy';
$page_description = 'Najprostsze szablonowanie oparte na budowaniu widoku poprzez dołączanie kolejnych części HTML zdefiniowanych w różnych plikach .php';
$page_header = 'Proste szablony';
$page_footer = 'Marlena Gęborska 2024';

// 6. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$kwota,$czas,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'apP1calc_view.php';