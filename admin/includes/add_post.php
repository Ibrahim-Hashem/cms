<?php
    if(isset($_POST['create_post'])){
        $post_title = $_POST['title'];
        $post_cat_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
//        $post_comment_count = 4;
        
        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count ,post_status) ";
        $query .= "VALUES({$post_cat_id},'{$post_title}', '{$post_author}', now(), '{$post_image}','{$post_content}', '{$post_tags}',0, '{$post_status}')";
        
        $create_post_query = mysqli_query($connect,$query);
        
        confirm($create_post_query);
        header("Location: post.php");

    }
 ?> 

<form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
       
    <div class="form-group">
        <label for="post_categories">Post Category Id</label><br>
        <select name="post_category_id" id="">
           <?php 
            $query = "SELECT * FROM categories ";
            $query_connect = mysqli_query($connect,$query);

            while($row = mysqli_fetch_assoc($query_connect)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }

            ?>

        </select>
    </div>
       
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
       
    <div class="form-group">
        <label for="post_status">Post status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
       
    <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" class="form-contol" name="post_image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
       
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea name="post_content" class = "form-control" id="" cols="30" rows="10"></textarea>
    </div>
       
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="publish post">
    </div>
</form>