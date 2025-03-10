
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body background='tlo.jpg'>


<form action="<?php print(_APP_URL);?>/apP1calc.php" method="post">
	<label for="id_kwota">Kwota kredytu </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php if(isset($kwota)) print($kwota); ?>" /><br />
	
	<label for="id_czas">Liczba lat </label>
	<input id="id_czas" type="text" name="czas" value="<?php if(isset($czas)) print($czas); ?>" /><br />
	
	<label for="id_oprocentowanie">Oprocentowanie roczne % </label>
	<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php if(isset($oprocentowanie)) print($oprocentowanie); ?>" /><br />
	
	<input type="submit" value="Oblicz ratę kredytu" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 30px; padding: 20px 20px 20px 40px; border-radius: 5px; background-color: #ff00ff; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</body>
</html>