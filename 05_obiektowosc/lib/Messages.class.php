//Pierwszy moduł w naszym frameworku

<?php
class Messages {
	//ta klasa zawiera prywatne tablice errors i number (num), czyli liczbę komunikatów w sumie
        private $errors = [];
        private $num = 0;

    public function addError($message) {
      $this->errors[] = $message;
      $this->num++; //zwiększa liczbę komunikatów
    }

    public function isEmpty() {
      return $this->num == 0; //jeżeli 0 to zwróci true
    }

    public function isError() {
      return count($this->errors) > 0;
    }

    public function getErrors() { //zwraca tablicę błędów
      return $this->errors;
    }

    public function clear() { //po prostu czyści te tablice 
      $this->errors = [];
      $this->num = 0;
    }
  }
?>