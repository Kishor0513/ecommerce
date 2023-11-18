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
    <title>Weavers | Cart Page</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="./assets/style.css">
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
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

                    </ul>

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
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    
                    <tbody>
                        <!-- php code to display dynamic data -->
                        <?php
                        global $conn;
                        $ip = getIPAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart_details` where ip_address='$ip'";
                        $result_query = mysqli_query($conn, $cart_query);
                        $result_count=mysqli_num_rows($result_query);
                        if($result_count>0){
                            echo"<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price:</th>
                            <th>Remove </th>
                            <th colspan='2'>Operation</th>
                        </tr>
                    </thead>";
                        
                        while ($row = mysqli_fetch_array($result_query)) {
                            $product_id = $row['product_id'];
                            $select_query = "Select * from `products` where product_id='$product_id'";
                            $result_products = mysqli_query($conn, $select_query);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total_price += $product_values;

                        ?>
                                <tr>
                                    <td><?php echo $product_title ?></td>
                                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                    <td><input type="text" name="quantity" id="" class="form-input w-50"></td>
                                    <?php
                                    global $conn;
                                    $ip = getIPAddress();
                                    if (isset($_POST['update_cart'])) {
                                        $quantities = $_POST['quantity'];
                                        $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$ip'";
                                        $result_products_quantity = mysqli_query($conn, $update_cart);
                                        $total_price = $total_price * $quantities;
                                    }
                                    ?>
                                    <td>Rs: <?php echo $price_table ?>/-</td>
                                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                                    <td>
                                        <!-- <button class="bg-info px-3 py-2 mx-3 border-0">Update</button> -->
                                        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 mx-3 border-0" name="update_cart">
                                        <!-- <button class="bg-danger px-3 py-2 mx-3 border-0">Remove</button> -->
                                        <input type="submit" value="Remove Cart" class="bg-danger px-3 py-2 mx-3 border-0" name="remove_cart">
                                    </td>
                                </tr>
                            <?php   }}
                        }else{
                            echo"<h2 class='text-center text-danger'>Cart is Empty</h2>";
                        }?>
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex  mb-3">
                    <?php
                    global $conn;
                    $ip = getIPAddress();
                    $cart_query = "Select * from `cart_details` where ip_address='$ip'";
                    $result_query = mysqli_query($conn, $cart_query);
                    $result_count = mysqli_num_rows($result_query);
                    if ($result_count > 0) {
                        echo"<h4 class='px-3'>Subtotal: <strong class='text-info'>Rs: $total_price /-</strong></h4>
                    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0' name='continue_shopping'>
                    <a href='#'><button class='bg-secondary px-3 py-2 border-0 text-light'>Checkout</button></a>";
                    }else{
                        echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0' name='continue_shopping'>";
                    }

                    if(isset($_POST['continue_shopping'])){
                        echo"<script>window.open('index.php','_self')</script>";
                    }
                    ?>
                    
                </div>
            </form>
        </div>
    </div>
    <!-- functon to remove item -->
    <?php
    function remove_cart_item(){
        global $conn;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query="delete from `cart_details` where product_id=$remove_id";
                $run_delete=mysqli_query($conn,$delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_item=remove_cart_item();
    ?>
    <!-- last child  -->
    <!-- footer -->
    <?php
    include("./includes/footer.php");
    ?>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>