<?php 

if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];
    
    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $query_users = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($query_users)){
        $user_id = $row['user_id'];
        $user_password = $row['user_password'];
        $user_username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}

?>

<?php
if(isset($_POST['edit_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_username = $_POST['user_username'];
    $user_role = $_POST['user_role'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
//        $post_date = date('d-m-y');
//        $post_comment_count = 4;

    move_uploaded_file($user_image_temp,"../images/$user_image");

   
    $query_update = "UPDATE users SET username='{$user_username}', user_password='{$user_password}',user_firstname='{$user_firstname}', user_lastname ='{$user_lastname}',`user_email`='{$user_email}', user_image='{$user_image}',user_role='{$user_role}', randSalt = '' WHERE user_id={$user_id}";
    

    $edit_user_query = mysqli_query($connect,$query_update);

    confirm($edit_user_query);
    header("Location: users.php");
    

}
?> 

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo "$user_firstname" ; ?>">
    </div>
    
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo "$user_lastname"; ?>">
    </div>   
    
       
    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" class="form-control" name="user_username" value="<?php echo "$user_username"; ?>">
    </div>
       
    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" class="form-control" style="width:200px;" id="" value="<?php echo "$user_role"; ?>">
            <option value="subscriber">Select option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
       
    <div class="form-group">
        <label for="user_image">Image</label>
        <img width="200" src="../images/<?php echo $user_image ?>" alt="">
        <input type="file" class="form-contol"  name="user_image">
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email" value="<?php echo "$user_email"; ?>">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo "$user_password"; ?>">
    </div>
       
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="update user">
    </div>
</form>