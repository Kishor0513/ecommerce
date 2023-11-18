<?php
// including connect file
include('./includes/connect.php');

// getting products
function getproducts()
{
    global $conn;
    // condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "Select * from `products` order by rand() limit 0,3";
            $result_query = mysqli_query($conn, $select_query);
            // $row=mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_category = $row['category_id'];
                $product_brand = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : Rs $product_price /-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success mx-3'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mx-3 '>View More</a>
                        </div>
                    </div>
                    <!-- col end -->
                </div>";
            }
        }
    }
}


// display all products
function get_all_products()
{
    global $conn;
    // condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "Select * from `products` order by rand()";
            $result_query = mysqli_query($conn, $select_query);
            // $row=mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_category = $row['category_id'];
                $product_brand = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : Rs $product_price /-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success mx-3'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mx-3 '>View More</a>
                        </div>
                    </div>
                    <!-- col end -->
                </div>";
            }
        }
    }
}


// getting unique category{

function get_unique_category()
{
    global $conn;
    // condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "Select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        } else {
            // $row=mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_category = $row['category_id'];
                $product_brand = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : Rs $product_price /-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success mx-3'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mx-3 '>View More</a>
                        </div>
                    </div>
                    <!-- col end -->
                </div>";
            }
        }
    }
}
// getting unique brands
function get_unique_brands()
{
    global $conn;
    // condition to check isset or not
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "Select * from `products` where brand_id='$brand_id'";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No Service for this Brand</h2>";
        } else {
            // $row=mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_category = $row['category_id'];
                $product_brand = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : Rs $product_price /-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success mx-3'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mx-3 '>View More</a>
                        </div>
                    </div>
                    <!-- col end -->
                </div>";
            }
        }
    }
}

// displaying brands in sidenav
function getbrand()
{
    global $conn;
    $select_query = "Select * from `brands`";
    $result_brands = mysqli_query($conn, $select_query);

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
                    <a href='index.php?brand=$brand_id' class='nav-link text-light text-center'>
                        $brand_title
                    </a>
                </li>";
    }
}

// displaying category in sidenav
function getcategory()
{
    global $conn;
    $select_query = "Select * from `categories`";
    $result_categories = mysqli_query($conn, $select_query);

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
                    <a href='index.php?category=$category_id' class='nav-link text-light text-center'>
                        $category_title
                    </a>
                </li>";
    }
}


// searching product
function search_product()
{
    global $conn;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "Select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
        // $row=mysqli_fetch_assoc($result_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No result match. No products found on this category!</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_brand = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : Rs $product_price /-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success mx-3'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary mx-3 '>View More</a>
                        </div>
                    </div>
                    <!-- col end -->
                </div>";
        }
    }
}


// view details function
function view_details()
{
    global $conn;
    if (isset($_GET['product_id'])) {
        // condition to check isset or not
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "Select * from `products` where product_id=$product_id";
                $result_query = mysqli_query($conn, $select_query);
                // $row=mysqli_fetch_assoc($result_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_category = $row['category_id'];
                    $product_brand = $row['brand_id'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : Rs $product_price /-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-success mx-3'>Add to cart</a>
                            <a href='index.php' class='btn btn-secondary mx-3 '>Go Home</a>
                        </div>
                    </div>
                    </div>
                    <div class='col-md-8'>
                        <!-- realted cart -->
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center mb-5'>
                                    Related Products
                                </h4>
                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image2' alt='$product_title' class='card-img-top'>
                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image3' alt='$product_title' class='card-img-top'>
                            </div>
                        </div>
                    </div>
                </div>";
                }
            }
        }
    }
}


// getting Ip address
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_ FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;

// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside cart!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$ip',0)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script>alert('Item has been added to cart!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// function to get cart item number
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $ip = getIPAddress();

        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    } else {
        global $conn;
        $ip = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    }
    echo $count_cart_item;
}

// getting price function
function total_cart_price()
{
    global $conn;
    $ip = getIPAddress();
    $total_price = 0;
    $cart_query = "Select * from `cart_details` where ip_address='$ip'";
    $result_query = mysqli_query($conn, $cart_query);
    while ($row = mysqli_fetch_array($result_query)) {
        $product_id = $row['product_id'];
        $select_query = "Select * from `products` where product_id='$product_id'";
        $result_products = mysqli_query($conn, $select_query);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}
