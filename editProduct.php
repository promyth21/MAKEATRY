<?php 
$productID=$_GET['productID'];
$checkMale='';
$checkFemale='';
$checkOther='';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminDashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="color.css">
</head>

<body>
<header>
        <nav class="navbar navbar-light bg-light fixed-top text-white">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
              aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand m-auto" href="#">Make A try</a>
            <div class="offcanvas offcanvas-start bg-dark text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
              aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Activities</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                  aria-label="Close"></button>
              </div>
              <div class="offcanvas-body bg-white">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="adminDashboard.php">DashBoard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="addProduct.html">Add Product</a>
                  </li>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Buyer Request</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">User Cart Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Out of Stock Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">View Sales Report</a>
                  </li>
                  <hr class="dropdown-divider bg-dark">
                  <li><a class="dropdown-item" href="#">Logout <i class="fa-sharp fa-solid fa-right-from-bracket"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </header>
    <main><hr class='mt5'>
        <div class="container-xl px-4 mt-4 style= ">
            <?php
            session_start();
            if(isset($_SESSION['admin'])){

            }
            else{
              header("Location: home.html");
                exit();
            }
            include 'database.php';
            $query = "SELECT * FROM `product` WHERE `id`='$productID' LIMIT 1";
            $data = mysqli_query($connect, $query);
            if ($data) {
                while ($row = mysqli_fetch_array($data)) {
                    
                    if ($row['gender'] === 'male') {
                        $checkMale = "checked";
                    }
                    if ($row['gender'] === 'female'){
                        $checkFemale="checked";
                    }
                    if ($row['gender'] === 'both'){
                        
                        $checkOther="checked";
                    }
                    echo "<form action='editProductAction.php' method='post' enctype='multipart/form-data'>
                    <div class='row'>
                        <div class='col-xl-4'>
                            <!-- Profile picture -->
                            <div class='card mb-4 mb-xl-0'>
                                <div class='card-header'>Product Picture</div>
                                <div class='card-body text-center input-group'>
                                    <input type='file' class='form-control img-fluid' id='userImage' name='productImg' hidden
                                        accept='Image/*'>
                                    <img id='imagePreview' src='$row[productImg]' class='w-100' style='max-height: 300px; object-fit: fill;'>
                                </div>
                                <h5 class='btn btn-light container w-100' id='imageBtn'>Upload Image</h5>
                            </div>
                        </div>
                
                        <div class='col-xl-8'>
                            <div class='card mb-4'>
                                <div class='card-header'>Edit Product</div>
                                <div class='card-body'>
                                    <form>
                                        <div class='row gx-3 mb-3'>
                                            <div class='mb-3 col-md-6'>
                                                <label class='small mb-1' for='inputUsername'>Name </label>
                                                <input class='form-control' id='productName' type='text' name='productName' value='$row[name]'>
                                            </div>
                
                                            <div class='col-md-6'>
                                                <label class='small mb-1' for='inputFirstName'>Catagory</label>
                                                <input class='form-control' id='productCategory' name='productCategory' type='text' placeholder=''
                                                    value='$row[catagory]'>
                                            </div>
                
                                            <div class='col-md-6'>
                                                <label class='small mb-1' for='inputLastName'>Size</label>
                                                <input class='form-control' id='productSize' name='productSize' type='text' placeholder=''
                                                    value='$row[size]'>
                                            </div>
                
                                            <div class='col-md-6'>
                                                <label class='small mb-1' for='inputOrgName'>Color</label>
                                                <input class='form-control' id='productColor' name='productColor' type='text' value='$row[color]'>
                                            </div>
                                            <div class='col-md-6'>
                                                <label class='small mb-1' for='inputLocation'>Style</label>
                                                <input class='form-control' id='productStyle' name='productStyle' type='text' placeholder=''
                                                    value='$row[style]'>
                                            </div>
                
                                            <div class='col-md-6 mb-3'>
                                                <label class='small mb-1' for='inputEmailAddress'>Brand</label>
                                                <input class='form-control' id='productBrand' name='productBrand' type='text' placeholder=''
                                                    value='$row[brand]'>
                                            </div>
                
                                            <div class='col-md-6'>
                                                <label class='small mb-1' for='inputPhone'>Price</label>
                                                <input class='form-control' id='productPrice' name='productPrice' type='text' placeholder='' value='$row[price]'>
                                            </div>
                
                                            <div class='col-md-6'>
                                                <label class='small mb-1' for='inputgender'>Model</label>
                                                <input class='form-control' id='productModel' name='productModel' type='text' name='gender' value='$row[model]'>
                                            </div>
                                            <div class='container'>
                                                <div class='input-group flex-nowrap mt-2 mb-2'>
                                                    <span class='input-group-text userAdressLabel' id='addon-wrapping'>Gender</span>
                                                    <div class='w-100 bg-white d-flex align-items-center justify-content-evenly'>
                                                        <div class='form-check'>
                                                            <input class='form-check-input' type='radio' name='productGender'
                                                                id='exampleRadios1' value='male' $checkMale>
                                                            <label class='form-check-label' for='exampleRadios1'>
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class='form-check'>
                                                            <input class='form-check-input' type='radio' name='productGender'
                                                                id='exampleRadios2' value='female' $checkFemale>
                                                            <label class='form-check-label' for='exampleRadios2'>
                                                                Female
                                                            </label>
                                                        </div>
                                                        <div class='form-check'>
                                                            <input class='form-check-input' type='radio' name='productGender'
                                                                id='exampleRadios2' value='other' $checkOther>
                                                            <label class='form-check-label' for='exampleRadios2'>
                                                                Other
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type='hidden'
                                                                 value='$productID' name='productID'>
                                                </div>

                                                <span id='userAdressAlertText' class=''></span>
                                            </div>
                                        </div>
                                        <!-- Save changes button-->
                                        <button class='btn btn-primary' type='submit'>Upload</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                ";

                }
                }
            ?>
            
            
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script >
        let imgInput = document.getElementById('userImage');
document.getElementById('imageBtn').addEventListener('click', () => {
    imgInput.click();
});
let preview = document.getElementById('imagePreview');
imgInput.addEventListener('change', () => {
    if (imgInput.files && imgInput.files[0]) {
        preview.src = URL.createObjectURL(imgInput.files[0]);
        preview.style.display = 'inline-block';
    }
});
    </script>
</body>

</html>