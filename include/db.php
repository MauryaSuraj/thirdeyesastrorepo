<?php
// Database Connection here
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'thirdeyesastro';

//SET DATA SOURCE Name
$dsn = 'mysql:host='.$host . ';dbname='.$dbname;

//CREATE PDO INSTANCE

$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);



 ?>
