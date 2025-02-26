<?php

phpinfo();
exit;

$user = 'root';
$pass = 'root';

$dsn = 'mysql:host=mysql;dbname=my_db;charset=utf8';

$pdo = new PDO($dsn, $user, $pass);
$sql = 'SELECT * FROM users';
foreach ($pdo->query($sql) as $row) {
	print $row['id'] . "\t";
	print $row['name'] . "\n";
}