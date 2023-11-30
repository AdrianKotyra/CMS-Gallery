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
                <input type="submit" class="btn btn-primary" value="ADD TO CART">
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
                    <a class="btn btn-primary"href="">Add to cart</a>
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