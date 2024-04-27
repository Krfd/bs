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

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$key = htmlspecialchars($_POST['key']);
$token = hash_hmac('sha256', 'this is for account', $key);

try {
    $data = $conn->prepare("SELECT * FROM user WHERE email = :email");
    $data->bindParam(":email", $email);
    $data->execute();

    $row = $data->fetch(PDO::FETCH_ASSOC);

    if (hash_equals($token, $_POST['token'])) {
        if ($data->rowCount() == 1) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['id'] = $row['user_id'];

                if ($row['admin'] == 1) {
                    echo "admin";
                } else if ($row['deleted'] == 1) {
                    echo "deleted";
                } else {
                    echo "valid";
                }
            } else {
                echo "unknown";
            }
        } else {
            echo "notfound";
        }
    } else {
        echo "nocsrf";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
