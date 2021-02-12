<?php include "includes/admin_header.php"?>
<?php include "includes/admin_navigation.php"?>  
 
<?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connect, $query);
        
        while($row = mysqli_fetch_assoc($select_user_profile_query)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
//            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            
        }
        

    }
?>


<?php
if(isset($_POST['edit_profile'])){
    $user_firstname_edit = $_POST['user_firstname'];
    $user_lastname_edit = $_POST['user_lastname'];
    $user_username_edit = $_POST['user_username'];
    $user_role_edit = $_POST['user_role'];

    $user_image_edit = $_FILES['user_image']['name'];
    $user_image_temp_edit = $_FILES['user_image']['tmp_name'];

    $user_email_edit = $_POST['user_email'];
    $user_password_edit = $_POST['user_password'];
//        $post_date = date('d-m-y');
//        $post_comment_count = 4;

    move_uploaded_file($user_image_temp,"../images/$user_image");

   
    $query_update = "UPDATE users SET username='{$user_username_edit}', user_password='{$user_password_edit}',user_firstname='{$user_firstname_edit}', user_lastname ='{$user_lastname_edit}',`user_email`='{$user_email_edit}', user_image='{$user_image_edit}',user_role='{$user_role_edit}', randSalt = '' WHERE username = '{$username}' ";
    

    $edit_user_query = mysqli_query($connect,$query_update);

    confirm($edit_user_query);
    header("Location: profile.php");
    

}
?>   


<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profile</h1>
            </div> 
        </div>
        <!-- /.row -->
        
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">First name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo "$user_firstname"; ?>">
    </div>
    
    <div class="form-group">
        <label for="user_lastname">Last name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo "$user_lastname"; ?>">
    </div>   
    
       
    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" class="form-control" name="user_username" value="<?php echo "$username"; ?>">
    </div>
        
    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" class="form-control" style="width:200px;" id="" value="<?php echo "$user_role"; ?>">
            <option value="subscriber"><?php echo "$user_role"; ?></option>
            <?php 
                if($user_role =='admin'){
                    echo "<option value='subscriber'>subscriber</option>";
                    
                }else{
                    echo "<option value='admin'>admin</option>";
                }
            ?>
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
        <input class="btn btn-primary" type="submit" name="edit_profile" value="update profile">
    </div>
</form>
        
        
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>