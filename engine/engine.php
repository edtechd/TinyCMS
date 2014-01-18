<?

require_once("enginec.php");
require_once("db.php");
require_once("templating.php");
require_once("updater.php");

function myHandlerForMinorErrors($errno, $errstr, $errfile, $errline)
{
}

set_error_handler('myHandlerForMinorErrors', E_NOTICE | E_STRICT);

?>