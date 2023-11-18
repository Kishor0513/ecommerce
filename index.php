<!-- connect file -->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weavers </title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="./assets/style.css">
    <!-- favicon link -->
    <link rel="shortcut icon" href="./assets/image/logo.png" type="image/x-icon">
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="./assets/image/logo1.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item(); ?></sup></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

    </div>
    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <!-- second child -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="" class="nav-link">Welcome Guest</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Login</a>
            </li>
        </ul>
    </nav>

    <!-- third child -->
    <div class="bg-light">
        <h3 class="text-center">
            Weavers Store
        </h3>
        <p class="text-center">Communication is the heart of e-commerce and community</p>
    </div>

    <!-- fourth child -->
    <div class="row">
        <div class="col-md-2 bg-secondary p-0">
            <!-- sidenav -->
            <!-- brands to be displayed -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light text-center">
                        <h4>Delivery Brands</h4>
                    </a>
                </li>
                <?php
                getbrand();

                ?>

            </ul>
            <!-- categories to be displayed -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light text-center">
                        <h4>Catogories</h4>
                    </a>
                </li>
                <?php
                getcategory();

                ?>

            </ul>
        </div>
        <div class="col-md-10">
            <!-- products -->
            <div class="row px-1">
                <!-- fetching products -->
                <?php
                // calling function
                getproducts();
                get_unique_category();
                get_unique_brands();
                getIPAddress();
                ?>

                <!-- row end -->
            </div>
        </div>
    </div>
    <!-- last child  -->
    <!-- footer -->
    <?php
    include("./includes/footer.php");
    ?>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>