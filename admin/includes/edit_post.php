<?php
    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }
        $query = "SELECT * FROM posts";
        $query_connect = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($query_connect)){
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comments = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
        
    }

 ?> 
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo "$post_title"; ?>" class="form-control" name="title">
    </div>
       
    <div class="form-group">
        <label for="post_categories">Post Category Id</label>
        <input type="text" value="<?php echo "$post_category_id"; ?>" class="form-control" name="post_category_id">
    </div>
       
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" value="<?php echo "$post_author"; ?>" name="post_author">
    </div>
       
    <div class="form-group">
        <label for="post_status">Post status</label>
        <input type="text" class="form-control" value="<?php echo "$post_status"; ?>" name="post_status">
    </div>
       
    <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" class="form-contol" value="" name="post_image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input type="text" class="form-control" value="<?php echo "$post_tags"; ?>" name="post_tags">
    </div>
       
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea name="post_content" class = "form-control" id="" cols="30" rows="10"> <?php echo "$post_content"; ?>
        </textarea>
    </div>
       
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_post" value="Update post">
    </div>
</form>