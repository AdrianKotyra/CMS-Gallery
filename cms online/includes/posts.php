<script><?php include "./js/custom.js"?> </script>

<?php   include("posts_component.php");?>
<?php



if(isset($_POST['submit'])){

$search = $_POST['search'];
$_SESSION['search_result']= $search;


$query = "SELECT * FROM posts WHERE post_title LIKE '%$search%' ";
$search_query = mysqli_query($connection, $query);

if(!$search_query) {

    die("QUERY FAILED" . mysqli_error($connection));

}

$count = mysqli_num_rows($search_query);

if($count == 0) {

    echo '
    <script>
        submitWindowTimed("No Results")

    </script>';


} else {
    header("Location:./search.php");
}
}

?>
