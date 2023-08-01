<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    // $userRole = "user";
    include "database.php";

    $checkEmailQuery = "SELECT * FROM `user` WHERE `email`= '$userEmail' LIMIT 1";
    $ExistEmail = mysqli_query($connect, $checkEmailQuery);

$row = mysqli_fetch_array($ExistEmail);
        echo "<pre>";
        print_r($row);
        echo "</pre>";
        if ($row['password'] === $userPassword && $row['role'] === "user") {
            echo "<script>window.alert('welcome');location.href='home.html'</script>";
        } else{
            echo "<script>window.alert('Password Invalid');location.href='login.html'</script>";
        }

    // if(mysqli_num_rows($ExistEmail)>0 && mysqli_num_rows($ExistPassword)>0 && mysqli_num_rows($ExistUser)>0){
    //     header("location:home.html");
    // }
    // else{
    //     echo "<script>window.alert('Email al ready Exist');location.href='login.html'</script>";
    // }
    // echo $userImage["uploaded_file"];
    // if(!$uploadImage){
    //     echo"<script>window.alert('ImageError Try Again');location.href='signup.html'</script>";
    // }else{
    //     echo"<script>window.alert('sucessful');location.href='signup.html'</script>";
    // }
}
?>
<!-- <script>window.alert('ImageError Try Again');location.href="signup.html"</script> -->