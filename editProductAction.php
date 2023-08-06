<?php
session_start();
if(isset($_SESSION['admin'])){

}
else{
  header("Location: home.html");
    exit();
}
$productName = $_POST["productName"];
$productID = $_POST["productID"];
$productCategory = $_POST["productCategory"];
$productSize = $_POST["productSize"];
$productColor = $_POST["productColor"];
$productStyle = $_POST["productStyle"];
$productBrand = $_POST["productBrand"];
$productPrice = $_POST["productPrice"];
$productModel = $_POST["productModel"];
$productGender = $_POST["productGender"];
include 'database.php';
    $checkImageUpdated = $_FILES['productImg'];
    if ($checkImageUpdated['name'] != null) {
        $imageCurrentPath = $checkImageUpdated["tmp_name"];
        $imageTargetPath = "assets/productImg/" .$checkImageUpdated['name'];
        $uploadImage = move_uploaded_file($imageCurrentPath, $imageTargetPath);
        $query = "UPDATE `product` SET `name`='$productName',`catagory`='$productCategory',`size`='$productSize',`color`='$productColor',`style`='$productStyle',`brand`='$productBrand',`price`='$productPrice',`model`='$productModel',`gender`='$productGender',`productImg`='$imageTargetPath' WHERE `id`='$productID'";
        mysqli_query($connect, $query);
        header("location: adminDashboard.php");
        }
    else{
        $query = "UPDATE `product` SET `name`='$productName',`catagory`='$productCategory',`size`='$productSize',`color`='$productColor',`style`='$productStyle',`brand`='$productBrand',`price`='$productPrice',`model`='$productModel',`gender`='$productGender' WHERE `id`='$productID'";
        mysqli_query($connect, $query);
        header("location: adminDashboard.php");
}
?>