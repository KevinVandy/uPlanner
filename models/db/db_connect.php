<?php

//local
$dsn        = "mysql:host=localhost;dbname=uplanner";
$usernameDB = "root";
$passwordDB = "";

//remote
// $dsn        = "mysql:host=kevinvandytech.domaincommysql.com;port=3306;dbname=uplanner";
// $usernameDB = "kevinvandytech";
// $passwordDB = "helloThere";

try {

 $conn = new PDO($dsn, $usernameDB, $passwordDB, null);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $ex) {
 exit("Could not connect to Database<br>" . $ex->getMessage());
}
