<?php
// ---HELPER FUNCTIONS---
function redirect($location) {
    header("location: $location");
}

function query($sql) {

    global $connection;


    return mysqli_query($connection, $sql);
}


function escape_string($string) {
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}


function fetch_array($result) {
    return mysqli_fetch_array($result);
}

function get_product_by_id($product_id_arg) {
    $query = query("SELECT * FROM products where product_id=$product_id_arg");




    while ($row = mysqli_fetch_array($query)) {
        $product_list = [];
        $product_id=  $row["product_id"];
        $product_price=  $row["product_price"];
        $product_title = $row["product_title"];
        $product_description = $row["product_description"];
        $product_image = $row["product_image"];
        $product_short_description = $row["product_short_description"];

        $product = <<<DELIMETER
        <div class="row">

        <div class="col-md-7">
           <img class="img-responsive" src="$product_image" alt="">

        </div>

        <div class="col-md-5">

            <div class="thumbnail">


        <div class="caption-full">
            <h4><a href="#"> $product_title</a> </h4>
            <hr>
            <h4 class=""> $product_price</h4>

        <div class="ratings">

            <p>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                4.0 stars
            </p>
        </div>

        <p>$product_short_description</p>


        <form action="">
            <div class="form-group">
                <a href="cart.php?add=$product_id"class="btn btn-primary">ADD TO CART</a>
            </div>
        </form>

        </div>

        </div>

        </div>


        </div><!--Row For Image and Short Description-->


            <hr>


        <!--Row for Tab Panel-->

        <div class="row">

        <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">

        <p></p>

            <p>$product_description</p>



            </div>

        DELIMETER;
        echo $product;
    }


}

function get_product() {
    $query = query("SELECT * FROM products");




    while ($row = mysqli_fetch_array($query)) {
        $product_id=  $row["product_id"];
        $product_price=  $row["product_price"];
        $product_title = $row["product_title"];
        $product_description = $row["product_description"];
        $product_image = $row["product_image"];


        $product = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <a href="item.php?product=$product_id">  <img src="$product_image" alt=""></a>

                <div class="caption">
                    <h4 class="pull-right">$$product_price</h4>
                    <h4><a href="item.php?product=$product_id">$product_title</a>
                    </h4>
                    <p>$product_description</p>
                    <a class="btn btn-primary"href="cart.php?add=$product_id">Add to cart</a>
                </div>


                <!-- <div class="ratings">
                    <p class="pull-right">15 reviews</p>
                    <p>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </p>
                </div> -->
            </div>
        </div>

        DELIMETER;
        echo $product;
    }


}
function get_categories() {

    global $connection;
    $query = query("SELECT * FROM categories");
    while($row = mysqli_fetch_array($query)){
        $cat_title = $row["cat_title"];
        $cat_id = $row["cat_id"];

        echo "<a href='/public/category.php?category=$cat_id' class='list-group-item'>$cat_title</a>";

    }
}


function get_product_by_category($category) {
    $query = query("SELECT * FROM products where product_category_id=$category");




    while ($row = mysqli_fetch_array($query)) {
        $product_id=  $row["product_id"];
        $product_price=  $row["product_price"];
        $product_title = $row["product_title"];
        $product_description = $row["product_description"];
        $product_image = $row["product_image"];


        $product = <<<DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <a href="item.php?product=$product_id"> <img src="$product_image" alt=""></a>
            <div class="caption">
                <h3>$product_title</h3>
                <p>$product_description</p>
                <p>
                    <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?product=$product_id" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
        </div>
        DELIMETER;
        echo $product;
    }


}
function cart_totals(){
    if(isset($_GET["add"])){
        $_SESSION["product_cart"] = $_GET["add"];
    }
    $prod_id_cart = $_SESSION["product_cart"];
    $quantity =  $_SESSION["product_".$prod_id_cart];
    $query = query("SELECT * from products WHERE product_id=$prod_id_cart");
    while($row = mysqli_fetch_array($query)) {
    $product_title = $row["product_title"];
    $product_price = $row["product_price"];
    }
    $total_product_price = $product_price*$quantity;
    $cart_totals = <<<DELIMETER
    "<div class="col-xs-4 pull-right ">
    <h2>Cart Totals</h2>

    <table class="table table-bordered" cellspacing="0">

    <tr class="cart-subtotal">
    <th>Items:$product_title</th>
    <td><span class="amount">$quantity</span></td>
    </tr>
    <tr class="shipping">
    <th>Shipping and Handling</th>
    <td>Free Shipping</td>
    </tr>

    <tr class="order-total">
    <th>Order Total</th>
    <td><strong><span class="amount">$total_product_price</span></strong> </td>
    </tr>


    </tbody>

    </table>
    <a href="#" class="btn btn-primary">Buy Now!</a>
    </div>"
    DELIMETER;

    echo $cart_totals;
}
function display_products_checkout() {

    if(isset($_GET["add"])){
        $_SESSION["product_cart"] = $_GET["add"];
    }
    $prod_id_cart = $_SESSION["product_cart"];
    $quantity =  $_SESSION["product_".$prod_id_cart];
    $query = query("SELECT * from products WHERE product_id=$prod_id_cart");
    while($row = mysqli_fetch_array($query)) {
    $product_title = $row["product_title"];
    $product_price = $row["product_price"];
    }
    $product_subtotal = $quantity*$product_price;
    $products_table =<<<DELIMETER
    <td>$product_title</td>
    <td>$product_price</td>
    <td> $quantity</td>
    <td> $product_subtotal</td>
    <td>
    <a class= "btn btn-success" href="cart.php?add={$_SESSION["product_cart"]}"><span class="glyphicon glyphicon-plus"> </span> </a>
    <a class= "btn btn-warning" href="cart.php?remove={$_SESSION["product_cart"]}"><span class="glyphicon glyphicon-minus"> </span></a>
    <a class= "btn btn-warning"  href="cart.php?delete={$_SESSION["product_cart"]}"><span class="glyphicon glyphicon-remove"> </span></a>
    </td>

    DELIMETER;
    echo $products_table;




}
function set_msg($msg) {
    if(!empty($msg)) {
        $_SESSION["msg"] = $msg;

    }
    else {
        $msg = "";
    }
}

function display_msg() {
    if(isset($_SESSION["msg"])) {
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }

}
function contact_form(){
    if(isset($_POST['submit'])) {
        $to = "adriankotyra@yahoo.com";
        $username =   $_POST['username'];
        $email =  $_POST['email'];
        $subject =  $_POST['subject'];
        $msg = $_POST['msg'];
        $header = "From: {$username}, $email";
        $result = mail($to, $subject,  $msg, $header);
        if(!$result) {
            set_msg("Error");
        }
        else {
            set_msg("Message has been sent");
        }

    }
}
function login_user() {
    if(isset($_POST['submit'])) {
        $username =escape_string($_POST["username"]);
        $password =escape_string($_POST["password"]);


        $query = query("SELECT * FROM users where user_namee = '{$username}' AND user_password = '{$password}'");

        $user_count = mysqli_num_rows($query);
        if($user_count==0) {
            set_msg("Wrong password or Login");
            redirect("login.php");

        }
        else {
            $_SESSION["username_login"] = $username;
            set_msg("Welcome to Admin $username");

            redirect("admin");
        }
        }
}
function get_products_shopping() {
    $query = query("SELECT * FROM products");




    while ($row = mysqli_fetch_array($query)) {
        $product_id=  $row["product_id"];
        $product_price=  $row["product_price"];
        $product_title = $row["product_title"];
        $product_description = $row["product_description"];
        $product_image = $row["product_image"];


        $product = <<<DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <a href="item.php?product=$product_id"> <img src="$product_image" alt=""></a>
            <div class="caption">
                <h3>$product_title</h3>
                <p>$product_description</p>
                <p>
                    <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?product=$product_id" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
        </div>
        DELIMETER;
        echo $product;
    }


}


















?>