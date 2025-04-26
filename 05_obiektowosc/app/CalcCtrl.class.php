<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/libs/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl {

    private $msgs;   //wiadomości dla widoku
    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku
    private $hide_intro; //zmienna informująca o tym czy schować intro

    /**
     * Konstruktor - inicjalizacja właściwości
     */
    public function __construct() {
        $this->msgs = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    // Pobranie parametrów
    public function getParams() {
        $this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
        $this->form->czas = isset($_REQUEST['czas']) ? $_REQUEST['czas'] : null;
        $this->form->oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
    }

    // Walidacja parametrów
    public function validate() {
        // Sprawdzenie, czy parametry zostały przekazane
        if (!(isset($this->form->kwota) && isset($this->form->czas) && isset($this->form->oprocentowanie))) {
            return false;
        }
else { 
			$this->hide_intro = true; //przyszły pola formularza, więc - schowaj wstęp
		}
        // Sprawdzenie, czy potrzebne wartości zostały przekazane
        if ($this->form->kwota == "") {
            $this->msgs->addError("Nie podano kwoty kredytu!");
        }
        if ($this->form->czas == "") {
            $this->msgs->addError("Nie podano liczby lat!");
        }
        if ($this->form->oprocentowanie == "") {
            $this->msgs->addError("Nie podano wartości oprocentowania!");
        }

        if ($this->msgs->isError()) return false;

        // Sprawdzenie, czy nasze zmienne są liczbami i to liczbami dodatnimi
        if (!is_numeric($this->form->kwota) || $this->form->kwota < 0) {
            $this->msgs->addError("Kwota kredytu musi być liczbą dodatnią.");
        }
        if (!is_numeric($this->form->czas) || $this->form->czas < 0) {
            $this->msgs->addError("Liczba lat musi być liczbą dodatnią.");
        }
        if (!is_numeric($this->form->oprocentowanie) || $this->form->oprocentowanie < 0) {
            $this->msgs->addError("Oprocentowanie musi być liczbą dodatnią.");
        }

        return !$this->msgs->isError();
        
    }

    public function process() {
        $this->getParams();

        if ($this->validate()) {
            $this->form->kwota = floatval($this->form->kwota);
            $this->form->czas = intval($this->form->czas);
            $this->form->oprocentowanie = floatval($this->form->oprocentowanie);
            $this->result->result = ($this->form->kwota / ($this->form->czas * 12)) + ($this->form->kwota * (($this->form->oprocentowanie / 100) / 12));
            $this->result->result = number_format($this->result->result, 2);
        }
        $this->generateView();
    }

    public function generateView() {
        global $conf, $smarty; // zmiennych globalnych należy unikać, ale tutaj wyjątkowo użyte
        $smarty->assign('form', $this->form);
        $smarty->assign('msgs', $this->msgs);
        $smarty->assign('res', $this->result);
        $smarty->assign('page_description', 'Profesjonalne szablonowanie oparte na bibliotece Smarty');
        $smarty->assign('app_url', $conf->app_url);
        $smarty->assign('root_path', $conf->root_path);
        $smarty->assign('page_title', 'Kalkulator kredytowy');
        $smarty->assign('page_header', 'Szablony Smarty');
        $smarty->assign('hide_intro',$this->hide_intro);
        $smarty->display($conf->root_path.'/app/CalcView.html');
    }
}
?>

