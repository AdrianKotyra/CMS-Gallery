<?php require_once("../resources/config.php"); ?>
<?php include("../resources/templates/frontend/header.php")?>
<?php


?>
<body>



    <!-- Page Content -->
    <div class="container">


<!-- /.row -->
<h1 class="text-center"> <?php display_msg();?> </h1>
<div class="row">

      <h1>Checkout</h1>

<form action="">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>


          </tr>
        </thead>
        <tbody>
            <tr>
                <?php if(isset($_GET["add"])){
                    $_SESSION["product_cart"] = $_GET["add"];

                }
                ?>
                <?php
                    $prod_id_cart = $_SESSION["product_cart"];
                    $quantity =  $_SESSION["product_".$prod_id_cart];
                    $query = query("SELECT * from products WHERE product_id=$prod_id_cart");
                    while($row = mysqli_fetch_array($query)) {
                    $product_title = $row["product_title"];
                    $product_price = $row["product_price"];
                    }

                ?>
                <td><?php echo $product_title?></td>
                <td><?php echo $product_price?></td>
                <td> <?php  echo $quantity;?></td>
                <!-- <td>2</td> -->
                <td><a href="cart.php?add=<?php echo $_SESSION["product_cart"]?>">add</a></td>
                <td><a href="cart.php?remove=<?php echo $_SESSION["product_cart"]?>">remove</a></td>
                <td><a href="cart.php?delete=<?php echo $_SESSION["product_cart"]?>">delete</a></td>

            </tr>
        </tbody>
    </table>
</form>



<!--  ***********CART TOTALS*************-->

<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">4</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">$3444</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->





 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php include("../resources/templates/frontend/footer.php")?>
</html>
