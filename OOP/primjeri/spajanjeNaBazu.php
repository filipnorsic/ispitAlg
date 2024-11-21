<?php

// MYSQLI

$host = "localhost";    // Database host
$user = "username";     // Database user
$pass = "password";     // Database password
$dbname = "database";   // Database name

// povezivanje na bazu

$conn = mysqli_connect($host, $user, $pass, $dbname);

// provjera konekcije

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/**************************************************/

// PDO

$host = "localhost";    // Database host
$dbname = "studenti";   // Database name
$charset = "utf8mb4";      // Database charset
$username = "root";
$password = "mypassword";

$dsn = "mysql: host=$host;dbname=$dbname;charset=$charset";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
