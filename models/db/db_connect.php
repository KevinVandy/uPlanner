<?php

$dsn = "mysql:host=localhost;dbname=uplanner"; //local
//$dsn = "mysql:host=kevinvandytech.domaincommysql.com;port=3306;dbname=uplanner"; //remote
$usernameDB = "root";
$passwordDB = "";

try
{
    $conn = new PDO($dsn, $usernameDB, $passwordDB);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
    exit($ex->getMessage());
}

?>