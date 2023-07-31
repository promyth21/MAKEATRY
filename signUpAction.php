<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
   $userName= $_POST['userName'];
   $userEmail= $_POST['userEmail'];
   $userPassword= $_POST['userPassword'];
   $userConfirmPassword= $_POST['userConfirmPassword'];
   $userMobile= $_POST['userMobile'];
   $userAdress= $_POST['userAdress'];
   $userGender= $_POST['userGender'];
   $userImage= $_FILES['userImage'];
    $userRole= "user";
    // $userImageWithExtension= $userEmail.".".(string)pathinfo($userImage['name'],PATHINFO_EXTENSION);
    // echo $userImageWithExtension;
    $imageCurrentPath= $userImage["tmp_name"];
    $imageTargetPath="assets/userImage/".$userEmail.$userImage['name'];
    $uploadImage= move_uploaded_file($imageCurrentPath,$imageTargetPath);
    include "database.php";
    $checkEmailQuery="SELECT `email` FROM `user` WHERE `email`= '$userEmail' LIMIT 1";
    $emailExist=mysqli_query($connect,$checkEmailQuery);
    if(mysqli_num_rows($emailExist)==0){
        $insertQuery="INSERT INTO `user`(`name`, `email`, `password`, `mobile`, `adress`, `gender`, `image`, `role`, `verificationStatus`) VALUES ('$userName','$userEmail','$userPassword','$userMobile','$userAdress','$userGender','$imageTargetPath','$userRole','false')";
        mysqli_query($connect,$insertQuery);

    }
    else{
        echo "<script>window.alert('Email al ready Exist');location.href='login.html'</script>";
    }
    // echo $userImage["uploaded_file"];
    // if(!$uploadImage){
    //     echo"<script>window.alert('ImageError Try Again');location.href='signup.html'</script>";
    // }else{
    //     echo"<script>window.alert('sucessful');location.href='signup.html'</script>";
    // }
}
?>
<!-- <script>window.alert('ImageError Try Again');location.href="signup.html"</script> -->