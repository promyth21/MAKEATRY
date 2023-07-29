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
    $userImageWithExtension= $userEmail.".".(string)pathinfo($userImage['name'],PATHINFO_EXTENSION);
    echo $userImageWithExtension;
    $imageCurrentPath= $userImage["tmp_name"];
    $imageTargetPath="assets/userImage/".$userImageWithExtension;
    $uploadImage= move_uploaded_file($imageCurrentPath,$imageTargetPath);
    include "database.php";
    $insertQuery="INSERT INTO `user`(`name`, `email`, `password`, `mobile`, `adress`, `gender`, `image`, `role`) VALUES ('$userName','$userEmail','$userPassword','$userMobile','$userAdress','$userGender','$imageTargetPath','$userRole')";
    mysqli_query($connect,$insertQuery);
    // echo $userImage["uploaded_file"];
    // if(!$uploadImage){
    //     echo"<script>window.alert('ImageError Try Again');location.href='signup.html'</script>";
    // }else{
    //     echo"<script>window.alert('sucessful');location.href='signup.html'</script>";
    // }
}
?>
<!-- <script>window.alert('ImageError Try Again');location.href="signup.html"</script> -->