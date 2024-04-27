<?php

session_start();

// Connection for server and database 
$db = "mysql:host=localhost;dbname=bs";
$username = "root";
$password = "";

try {
    $conn = new PDO($db, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$contactKey = htmlspecialchars($_POST['key']);
$contactToken = hash_hmac('sha256', 'this is for contact', $key);

try {
    $data = $conn->prepare("SELECT * FROM contact WHERE email = :email");
    $data->bindParam(":email", $email);
    $data->execute();

    $row = $data->fetch(PDO::FETCH_ASSOC);

    if (hash_equals($contactToken, $_POST['token'])) {
        $_SESSION['id'] = $row['user_id'];

        // if ($row['admin'] == 1) {
        //     echo "admin";
        // } else if ($row['deleted'] == 1) {
        //     echo "deleted";
        // } else {
        //     echo "valid";
        // }
    } else {
        echo "nocsrf";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
