<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwota = $_REQUEST ['kwota'];
$czas = $_REQUEST ['czas'];
$oprocentowanie = $_REQUEST ['oprocentowanie'];


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($czas)&& isset($oprocentowanie) )) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwota == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $czas == "") {
	$messages [] = 'Nie podano liczby lat';
}
if ( $oprocentowanie == "") {
	$messages [] = 'Nie podano wartości oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $kwota i $czas są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $czas )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
	
	if (! is_numeric( $oprocentowanie )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int lub float
	$kwota = intval($kwota);
	$czas = intval($czas);
	$oprocentowanie = floatval($oprocentowanie);
	
	//wykonanie operacji
	$result = ($kwota / ($czas * 12)) + (($kwota ) * (($oprocentowanie /100)/12));
	
	
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$kwota,$czas,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'apP1calc_view.php';