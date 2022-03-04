<?php

define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'pwpb');

$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME) or die("Mysqli Error : " . mysqli_connect_errno());

?>