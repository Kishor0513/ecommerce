<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <div class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../assets/image/logo1.png" alt="" class="logo">
                <div class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-3">
                    <a href="#"><img src="../assets/image/logo.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="m-1"><a href="insert_product.php" class="nav-link text-light bg-success my-1">Insert Products</a></button>
                    <button class="m-1"><a href="" class="nav-link text-light bg-success my-1">View Products</a></button>
                    <button class="m-1"><a href="index.php?insert_category" class="nav-link text-light bg-success my-1">Insert Categories</a></button>
                    <button class="m-1"><a href="p" class="nav-link text-light bg-success my-1">View Categories</a></button>
                    <button class="m-1"><a href="index.php?insert_brand" class="nav-link text-light bg-success my-1">Insert Brands</a></button>
                    <button class="m-1"><a href="" class="nav-link text-light bg-success my-1">View Brands</a></button>
                    <button class="m-1"><a href="" class="nav-link text-light bg-success my-1">All Orders</a></button>
                    <button class="m-1"><a href="" class="nav-link text-light bg-success my-1">All Payments</a></button>
                    <button class="m-1"><a href="" class="nav-link text-light bg-success my-1">List Users</a></button>
                    <button class="m-1"><a href="" class="nav-link text-light bg-success my-1">Log Out</a></button>
                </div>
            </div>
        </div>
        <!-- fourth child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            ?>
        </div>
        <!-- last child  -->
        <footer>
            <div class="bg-info p-3 text-center footer">
                <p>All rights reserved @ - Designed by Weavers</p>
            </div>
        </footer>
        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>