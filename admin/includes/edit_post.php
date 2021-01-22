<?php
    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
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
    
    if(isset($_POST['edit_post'])){

        $post_author = $_POST['post_author'];
        $post_title = $_POST['title'];
        $post_category_id = $_POST['cat'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        
        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        if(empty($post_image)){
          $query= "SELECT * FROM posts WHERE post_id = $the_post_id ";
          $select_image_connect = mysqli_query($connect,$query);
          while($row = mysqli_fetch_assoc($select_image_connect)){
            $post_image = $row['post_image'];  
          };    
        };
            
            
        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_category_id = {$post_category_id}, ";     
        $query .= "post_date = now(), ";     
        $query .= "post_author = '{$post_title}', ";     
        $query .= "post_status = '{$post_status}', ";     
        $query .= "post_tags = '{$post_tags}', ";     
        $query .= "post_content = '{$post_content}', ";     
        $query .= "post_image = '{$post_image}' ";
        $query .= "WHERE post_id = {$post_id}";     
        
        $query_edit_connect = mysqli_query($connect,$query);
        
    }

 ?> 
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo "$post_title"; ?>" class="form-control" name="title">
    </div>
       
    <div class="form-group">
        <label for="post_categories">Post Category Id</label><br>
        <select name="cat" id="">
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
        <input type="text" class="form-control" value="<?php echo "$post_author"; ?>" name="post_author">
    </div>
       
    <div class="form-group">
        <label for="post_status">Post status</label>
        <input type="text" class="form-control" value="<?php echo "$post_status"; ?>" name="post_status">
    </div>
       
    <div class="form-group">
        <label for="post_image">Image</label> <br>
        <img width="200" src="../images/<?php echo $post_image ?>" alt="">
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