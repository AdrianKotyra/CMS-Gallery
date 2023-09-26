<script><?php include "./js/custom.js"?> </script>

<form action="" method="POST">

    <table class="table table-bordered table-hover">
        <div id="bulkOptionContainer"class="select_container col-xs-3">
            <select class="form-control" name="select_post" id="select_post">
                <option value="">Select options</option>
                <option value="delete_post">Delete</option>
                <option value="publish_post">Publish</option>
                <option value="unpublish_post">Unpublish</option>
            </select>



        </div>

        <thead>


            <div class= "col-xs-3">
                <input class = "btn btn-primary applyButton" value="apply">
                <a class="btn btn-primary" href="post.php?source=add_posts">Add New</a>
                <input value="apply" name= "submit" type="submit"  class = "btn btn-primary applyButton2" value="apply">

            </div>

            <tr>
                <th><input type='checkbox' id='all_posts' name='all_posts' value='all_posts'></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comment content</th>
                <th>Comment counts</th>
                <th>Date</th>
                <th>Edit</th>

                <th>view</th>
            </tr>
        </thead>
        <tbody>

            <?php select_and_display_categories_posts();?>








            <?php delete_post_by_selection();?>

            <?php publish_post_by_selection();?>
            <?php unpublish_post_by_selection();?>

        </tbody>
    </table>


</form>



<script>
    actionItemsBySelection()

</script>

