<?php
    if(isset($_POST['create_user'])){
       echo  $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $user_username = $_POST['user_username'];
        
//        $post_image = $_FILES['post_image']['name'];
//        $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
//        $post_date = date('d-m-y');
//        $post_comment_count = 4;
        
//        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) ";
        $query .= "VALUES({$user_username},'{$user_password}', '{$user_firstname}', '{$user_lastname}','{$user_email}', '{$user_role}')";
        
        $create_user_query = mysqli_query($connect,$query);
        
        confirm($create_user_query);
        header("Location: users.php");

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
       
    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" class="form-control" style="width:200px;" id="">
            <option value="subscriber">Select option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
       
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