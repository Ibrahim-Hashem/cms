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
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>   
    
       
    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" class="form-control" name="user_username">
    </div>
       
<!--
    <div class="form-group">
        <label for="post_status">Post status</label>
        <select name="post_status" class="form-control" style="width:200px;" id="">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
            
        </select>
    </div>
-->
       
<!--
    <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" class="form-contol"  name="post_image">
    </div>
-->
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="text" class="form-control" name="user_password">
    </div>
       
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
    </div>
</form>