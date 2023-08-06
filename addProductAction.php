<?php
session_start();

if(isset($_SESSION['admin'])){

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $productName = $_POST["productName"];
        $productCategory = $_POST["productCategory"];
        $productSize = $_POST["productSize"];
        $productColor = $_POST["productColor"];
        $productStyle = $_POST["productStyle"];
        $productBrand = $_POST["productBrand"];
        $productPrice = $_POST["productPrice"];
        $productModel = $_POST["productModel"];
        $productGender = $_POST["productGender"];
        
        if ($_FILES["userImage"]["error"] === UPLOAD_ERR_OK) {
            $currentPath = $_FILES["userImage"]["tmp_name"];
            $targetPath = "assets/productImg/" . $_FILES["userImage"]["name"];
            move_uploaded_file($currentPath, $targetPath);
    }
    
    include 'database.php';
    
    $query = "INSERT INTO `product`(`name`, `catagory`, `size`, `color`, `style`, `brand`, `price`, `model`, `gender`, `productImg`) VALUES ('$productName', '$productCategory', '$productSize', '$productColor', '$productStyle', '$productBrand', '$productPrice', '$productModel', '$productGender', '$targetPath')";
    
    mysqli_query($connect, $query);
    
    header("Location: adminDashboard.php");
    exit();
}
}
else{
    header("Location: home.html");

}
?>
