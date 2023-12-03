<?php require_once("../resources/config.php") ?>
<?php if(isset($_GET["add"])){
    $product_id = escape_string($_GET["add"]);
    $query = query("SELECT * FROM products where product_id=$product_id");
    while($row = mysqli_fetch_array($query)) {
        $product_quantity = $row["product_quantity"];
        $product_name = $row["product_title"];
        if($product_quantity != $_SESSION["product_".$_GET["add"]]) {
            $_SESSION["product_".$_GET["add"]] +=1;
            redirect("checkout.php?add=$product_id");
        }
        else {
            set_msg("We only have $product_quantity $product_name left");
            redirect("checkout.php?add=$product_id");
        }
    }
    // $_SESSION["product_".$_GET["add"]] +=1;

    // redirect("index.php");

}


if(isset($_GET["remove"])){

    if($_SESSION["product_".$_GET["remove"]]<=0) {
        $_SESSION["product_".$_GET["remove"]]==0;
        redirect("checkout.php");
    }
    else {
        $_SESSION["product_".$_GET["remove"]] --;
        redirect("checkout.php");
    }

}


if(isset($_GET["delete"])){
    $_SESSION["product_".$_GET["delete"]] =0;
    redirect("checkout.php");
}

