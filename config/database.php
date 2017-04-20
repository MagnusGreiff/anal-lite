<?php
/**
 * Set the error reporting.
 */
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors



/**
 * Default exception handler.
 */
set_exception_handler(function ($e) {
    echo "Uncaught exception: <p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><pre>"
        . $e->getTraceAsString()
        . "</pre>";
});


//$fileName = __DIR__ . "../../sql/setup_user.sql";
/*$session = new \Radchasay\Session\Session();
$session->start();*/
return [
    $dsn      = "mysql:host=blu-ray.student.bth.se;dbname=magp16;",
    $login    = "magp16",
    $password = "JvWM89HhdPJs",
    $options  = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
];


/*return [
    $dsn      = "mysql:host=localhost;dbname=oophp;",
    $login    = "user",
    $password = "pass",
    $options  = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
];*/


/*$session = new \Radchasay\Session\Session("login");
$session->start();*/
