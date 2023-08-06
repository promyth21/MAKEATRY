<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,20}$/';
    if (empty($userEmail) || empty($userPassword)) {
        echo "<script>window.alert('Please provide both email and password');location.href='home.html'</script>";
        exit();
    } elseif (!preg_match($emailPattern, $userEmail)) {
        echo "<script>window.alert('Invalid Email format');location.href='home.html'</script>";
        exit();
    } elseif (!preg_match($passwordPattern, $userPassword)) {
        echo "<script>window.alert('Password must be at least 8 characters long and contain at least one letter and one number');location.href='home.html'</script>";
        exit();
    }
    // $userRole = "user";
    include "database.php";
    $checkEmailQuery = "SELECT * FROM `user` WHERE `email`= '$userEmail' LIMIT 1";
    $ExistEmail = mysqli_query($connect, $checkEmailQuery);
    $row = mysqli_fetch_array($ExistEmail);
    echo "<pre>";
    print_r($row);
    echo "</pre>";
    if ($row['password'] === $userPassword && $row['role'] === "admin") {
        session_start();
        $_SESSION['admin'] = $userEmail;
        echo "<script>window.alert('welcome');location.href='adminDashboard.php'</script>";
    } 
    else if($row['password'] === $userPassword && $row['role'] === "user") {
        session_start();
        $_SESSION['user'] = $userEmail;
        echo "<script>window.alert('welcome');location.href='home.html'</script>";
    } else {
        echo "<script>window.alert('Password Invalid');location.href='home.html'</script>";
    }
}