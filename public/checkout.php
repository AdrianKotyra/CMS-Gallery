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
           <th>Subtotal</th>


          </tr>
        </thead>
        <tbody>
            <tr>
                <?php display_products_checkout();?>


            </tr>
        </tbody>
    </table>
</form>



<!--  ***********CART TOTALS*************-->

    <?php  cart_totals();?>


 </div><!--Main Content-->





 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php include("../resources/templates/frontend/footer.php")?>
</html>
