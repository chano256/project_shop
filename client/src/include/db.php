<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "project_shop";
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_error($db)) {
    die("Failed to connect to db: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
}
?>