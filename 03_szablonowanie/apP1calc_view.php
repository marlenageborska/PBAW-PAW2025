<?php //góra strony z szablonu 
require_once dirname(__FILE__) .'/config.php';
include _ROOT_PATH.'/templates/top.php'; 
?>

<div class="logout">
	<a href="<?php print(_APP_ROOT); ?>/inna_chroniona_www.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<h4>Oblicz ratę swojego kredytu</h4>
    
<form action="<?php print(_APP_URL);?>/apP1calc.php" method="post"  method="post" class="pure-form pure-form-stacked">
	<legend>Kalkulator</legend>
	<fieldset>	
        <label for="id_kwota">Kwota kredytu </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php if(isset($kwota)) print($kwota); ?>" /><br />
	
	<label for="id_czas">Liczba lat </label>
	<input id="id_czas" type="text" name="czas" value="<?php if(isset($czas)) print($czas); ?>" /><br />
	
	<label for="id_oprocentowanie">Oprocentowanie roczne % </label>
	<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php if(isset($oprocentowanie)) print($oprocentowanie); ?>" /><br />
	</fieldset>
	<input type="submit" value="Oblicz ratę kredytu" class="pure-button pure-button-primary" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #ff00ff; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
	<h4>Miesięczna rata:</h4>
	<p class="res">
<?php echo "$result zł"; ?>
</div></p>
<?php } ?>



<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>