<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userConfirmPassword = $_POST['userConfirmPassword'];
    $userMobile = $_POST['userMobile'];
    $userAdress = $_POST['userAdress'];
    $userGender = $_POST['userGender'];
    $userImage = $_FILES['userImage'];
    $userRole = "user";
    $imageCurrentPath = $userImage["tmp_name"];
    $imageTargetPath = "assets/userImage/" . $userEmail . $userImage['name'];
    $uploadImage = move_uploaded_file($imageCurrentPath, $imageTargetPath);
    $isValid = true;
    if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $userEmail)) {
        $isValid = false;
        echo "<script>window.alert('Please enter a valid email address.');location.href='home.html'</script>";
    }
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,20}$/', $userPassword)) {
        $isValid = false;
        echo "<script>window.alert('Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character. It should be between 4 and 20 characters long.');location.href='home.html'</script>";
    }

    if ($userPassword !== $userConfirmPassword) {
        $isValid = false;
        echo "<script>window.alert('Passwords do not match.');location.href='home.html'</script>";
    }

    if (!preg_match('/^\d{11,15}$/', $userMobile)) {
        $isValid = false;
        echo "<script>window.alert('Please enter a valid mobile number (11 to 15 digits).');location.href='home.html'</script>";
    }

    // if (!preg_match('/^[a-zA-Z0-9\s\.,\-/#()\']+$/', $userAdress)) {
    //     $isValid = false;
    //     echo "<script>window.alert('Please enter a valid address.');location.href='home.html'</script>";
    // }

    if (!preg_match('/^[a-zA-Z]{3,20}$/', $userName)) {
        $isValid = false;
        echo "<script>window.alert('Please enter a valid name (3 to 20 characters, alphabetic only).');location.href='home.html'</script>";
    }

    if ($isValid) {
        include "database.php";
        $checkEmailQuery = "SELECT `email` FROM `user` WHERE `email`= '$userEmail' LIMIT 1";
        $emailExist = mysqli_query($connect, $checkEmailQuery);
        if (mysqli_num_rows($emailExist) == 0) {
            $insertQuery = "INSERT INTO `user`(`name`, `email`, `password`, `mobile`, `adress`, `gender`, `image`, `role`, `verificationStatus`) VALUES ('$userName','$userEmail','$userPassword','$userMobile','$userAdress','$userGender','$imageTargetPath','$userRole','false')";
            mysqli_query($connect, $insertQuery);
            session_start();
            $_SESSION['user'] = $userEmail;
            echo "<script>window.alert('Welcome');location.href='home.html'</script>";
        } else {
            echo "<script>window.alert('Email already exists.');location.href='home.html'</script>";
        }
    }
}
?>
