
<?php
require_once dirname(__FILE__).'/config.php';

//przekierowanie przeglądarki klienta (redirect)
//header("Location: "._APP_URL."/apP1calc.php");

//przekazanie żądania do następnego dokumentu ("forward")
include _ROOT_PATH.'/apP1calc.php';

?>

