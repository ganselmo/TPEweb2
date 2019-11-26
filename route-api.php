
<?php

require_once("Repositories/RouterApi.php");

define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

new RouterApi();

?>
