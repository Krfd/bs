<?php

session_start();

$db = "mysql:host=localhost;dbname=bs";
$username = "root";
$password = "";

try {
    $conn = new PDO($db, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($conn) {
        echo "Connected";
    } else {
        echo "Not connected";
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
