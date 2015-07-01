<?php

$session = (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true);
$cookie = (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true);

if ($session || $cookie) {
    header("Location: http://www.google.com");
    exit();
}

?>

