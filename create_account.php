<?php

session_start();
// Connection for server and database
$db = "mysql:host=localhost;dbname=bs";
$username = "root";
$password = "";

try {
    $conn = new PDo($db, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed " . $e->getMessage());
}

// Create account function 
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$confirm = htmlspecialchars($_POST['confirm']);
// $newDATE = date('Y F d', strtotime($date));
if ($password == $confirm) {
    // Check if the email already exists
    try {
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            echo "emailExist";
        } else {
            $create = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $conn->prepare($create);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            echo "signup";
        }
    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
    }
} else {

    echo "invalidcsrf";
}
