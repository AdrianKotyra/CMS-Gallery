<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACKEND . "/header.php"); ?>
        <?php if(!isset($_SESSION["username_login"])) {
            redirect("../../public");
        }?>
        <div id="page-wrapper">

            <?php if($_SERVER["REQUEST_URI"] == "/public/admin/" || $_SERVER["REQUEST_URI"] == "/public/admin/index.php"){
                 include(TEMPLATE_BACKEND . "/admin_content.php");
            }?>
            <?php if(isset($_GET["orders"])) {
                include(TEMPLATE_BACKEND . "/orders.php");
            }
            ?>
            <?php if(isset($_GET["products"])) {
                include(TEMPLATE_BACKEND . "/products.php");
            }
            ?>
            <?php if(isset($_GET["add_products"])) {
                include(TEMPLATE_BACKEND . "/add_product.php");
            }
            ?>
            <?php if(isset($_GET["edit_product"])) {
                include(TEMPLATE_BACKEND . "/edit_product.php");
            }
            ?>
            <?php if(isset($_GET["users"])) {
                include(TEMPLATE_BACKEND . "/users.php");
            }
            ?>
             <?php if(isset($_GET["categories"])) {
                include(TEMPLATE_BACKEND . "/categories.php");
            }
            ?>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include(TEMPLATE_BACKEND . "/footer.php")?>