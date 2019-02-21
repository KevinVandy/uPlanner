<?php

//local
$dsn        = "mysql:host=localhost;dbname=uplanner";
$usernameDB = "root";
$passwordDB = "";

//production
// $dsn = "mysql:host=kevinvandytech.domaincommysql.com;port=3306;dbname=uplanner";
// $usernameDB = "kevinvandytech";
// $passwordDB = "helloThere";

try {
 $conn = new PDO($dsn, $usernameDB, $passwordDB);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
 exit("Could not connect to Database<br>" . $ex->getMessage());
}
