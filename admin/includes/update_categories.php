<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php 
            if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
                $edit_category_query = mysqli_query($connect, $query);
                while($row = mysqli_fetch_assoc($edit_category_query)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    ?>

                    <input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">

                <?php } ?>
        <?php } ?>

        <?php
            if(isset($_POST['update_category'])){
                $the_update_title = $_POST['cat_title'];
                $edit_query = "UPDATE categories SET cat_title = '{$the_update_title}' WHERE cat_id = '{$cat_id}' ";
                $update_query_connect = mysqli_query($connect, $edit_query); 
                header("Location: categories.php");
            }    


        ?>

    </div>
    <div class="form-group">

        <input type="submit" class="btn btn-primary" name="update_category" value="Edit Category">
    </div>
</form>