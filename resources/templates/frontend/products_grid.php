
<div class="row">
    <?php
    if(isset($_GET["category"])) {
        $cat_id = $_GET["category"];
        get_product_by_category($cat_id);

    }
    else {
        get_product();
    }

    ?>



</div>