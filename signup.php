<?php
session_start();
require 'configure/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.'); history.back();</script>";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare insert query
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, is_verified) VALUES (?, ?, ?, 1)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Please log in.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Email already registered or error occurred.'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>